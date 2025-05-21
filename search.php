<?php

// Common includes for main PHP pages (controllers)
require_once "includes/common.php";

// Config
$title = "Product Search";

// Start output buffering (trap output - don't display it yet)
ob_start();

// Check if the search query has been provided
if (isset($_GET["search"])) {

    // Sanitize and trim the search query
    $search = trim($_GET["search"]);

    // Search for items matching the query
    $sql = <<<SQL
    SELECT ItemId, ItemName, Price, SalePrice, Description, Img, Photo, category.CategoryName
            FROM item
            INNER JOIN category ON item.CategoryId = category.CategoryId
            WHERE ItemName LIKE :search OR category.CategoryName LIKE :search
    SQL;
    // Prepare the statement
    $stmt = $db->prepareStatement($sql);

    /* 
        Alternative SQL query using a different syntax
        INNER JOIN category ON item.CategoryId = category.CategoryId
        WHERE ItemName LIKE :itemName OR category.CategoryName LIKE :categoryName
        $stmt = $db->prepareStatement($sql);
        Bind values (if needed)
        $stmt->bindValue(":itemName", "%$search%", PDO::PARAM_STR);
        $stmt->bindValue(":categoryName", "%$search%", PDO::PARAM_STR);
    */

    // Bind the search parameter
    $stmt->bindValue(":search", "%$search%", PDO::PARAM_STR);

    // Execute query
    $items = $db->executeSQL($stmt);
    // Check if item does NOT exist (no rows returned)
    if (empty($search)) {

      // Display error
      $errorMessage = "Item doesn't exist.";
      include TEMPLATES_DIR . "_error.html.php";

    } else {
      
        // Extract the first and only row
        // $search = $search[0];
  
        // Include the page-specific template
        include_once TEMPLATES_DIR . "_products.html.php";
  
      }
  
    } else {
  
      // No product ID given - display error
      $errorMessage = "Invalid Item ID: 'id' parameter missing.";
      include TEMPLATES_DIR . "_error.html.php";
  
    }
  
    // Stop output buffering - store output into the $content variable
    $content = ob_get_clean();
  
    // Include the main layout template
    include_once TEMPLATES_DIR . "_layout.html.php";
  ?>