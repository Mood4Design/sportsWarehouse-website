<?php
// Common includes for main PHP pages (controllers)
require_once "includes/common.php";

// Config
$title = "Category Items";

// Start output buffering (trap output - don't display it yet)
ob_start();

// Check if categoryId has been given
if (!empty($_GET["categoryId"])) {

    // Get the CategoryId (and sanitize/validate it)
    $categoryId = intval($_GET["categoryId"]);

    // Redirect if categoryId is zero or negative (invalid)
    if ($categoryId <= 0) {
        $errorMessage = "Invalid Category ID.";
        include TEMPLATES_DIR . "_error.html.php";
        exit;
    }

    // Fetch category name
    $sql = "SELECT CategoryName FROM category WHERE CategoryId = :categoryId";
    $stmt = $db->prepareStatement($sql);
    $stmt->bindValue(":categoryId", $categoryId, PDO::PARAM_INT);
    $category = $db->executeSQL($stmt);

    if (empty($category)) {
        $errorMessage = "Category doesn't exist.";
        include TEMPLATES_DIR . "_error.html.php";
        exit;
    }

    // Fetch items for the selected category
    $sql = <<<SQL
    SELECT ItemId, ItemName, Price, SalePrice, Img, Photo 
                 FROM item 
                 WHERE CategoryId = :categoryId
    SQL;
    $stmt = $db->prepareStatement($sql);
    $stmt->bindValue(":categoryId", $categoryId, PDO::PARAM_INT);
    $items = $db->executeSQL($stmt);

    // Check if any items were found
    if (empty($items)) {
        $errorMessage = "No items found in this category.";
        include TEMPLATES_DIR . "_error.html.php";
    } else {
        // Pass the items to the template
        include TEMPLATES_DIR . "_products.html.php";
    }

} else {

    // No categoryId given - display error
    $errorMessage = "Invalid Category ID: 'categoryId' parameter missing.";
    include TEMPLATES_DIR . "_error.html.php";
}

// Stop output buffering - store output into the $content variable
$content = ob_get_clean();

// Include the main layout template
include_once TEMPLATES_DIR . "_layout.html.php";