<?php

  // Common includes for main PHP pages (controllers)
  require_once "includes/common.php";

  // Config
  $title = "Item Details";

  // Start output buffering (trap output - don't display it yet)
  ob_start();

  // Check if item ID has been given
  if (!empty($_GET["id"])) {

    // Get the ID (and sanitise/validate it)
    $itemId = intval($_GET["id"]);

    // TODO: Redirect if item ID is zero (invalid)

    // Search for item by ID
    $sql = <<<SQL
        SELECT  ItemId, ItemName, Price, SalePrice, Description, Img, Photo, category.CategoryName
        FROM item
        INNER JOIN category ON item.CategoryId = category.CategoryId
        WHERE ItemId = :itemId
    SQL;

    // Prepare the statement
    $stmt = $db->prepareStatement($sql);

    // Bind values (if needed)
    $stmt->bindValue(":itemId", $itemId, PDO::PARAM_INT);

    // Execute query
    $item = $db->executeSQL($stmt);



    // Check if item does NOT exist (no rows returned)
    if (empty($item)) {

      // Display error
      $errorMessage = "Item doesn't exist.";
      include TEMPLATES_DIR . "_error.html.php";

    } else {
      
      // Extract the first and only row
      $item = $item[0];

      // Include the page-specific template
      include_once TEMPLATES_DIR . "_productPage.html.php";

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