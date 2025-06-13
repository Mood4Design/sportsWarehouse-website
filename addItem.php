<?php

/* 
  
  NOTE: When using this business object in a "real" webpage using user-supplied data:

  1. Get data from the user
  2. Validation (and sanitisation) - in the class or using FormValidator
  3. Image upload logic (if you have images)
  4. Create new object (from business object class)
  5. Assign property values, e.g. $object->setProperty("value")
  6. Insert/update into database
  7. Get new ID (if inserting) and display message to user

 */

// Common includes such as class definitions and constants
require_once "includes/common.php";

Auth::protect();
// Config
$title = "Add Item";

if (isset($_POST["submitAddItem"])) {
try
{

  // Create new object instance (using the constructor)
  $item = new Item();

  $item->setItemName($_POST["itemName"]);
  $item->setPhoto($_POST["photo"] ?? "");
  $item->setPrice($_POST["price"] ?? 0.0);
  $item->setSalePrice($_POST["salePrice"] ?? 0.0);
  $item->setDescription($_POST["description"] ?? "");
  $item->setCategoryId($_POST["categoryId"] ?? 0);
  $newItemId = $item->insertItem();

  // Display success message
  $successMessage = "Item added successfully, new ID: {$newItemId}, Name: {$item->getItemName()}, Description: {$item->getDescription()}";
  include_once TEMPLATES_DIR . "_success.html.php";

  

  /* 
   * TESTING: Updating a item
   */

  // // Get item from database, change its data, update in the database
  // $itemIdToUpdate = 11;
  // $item = new Item();
  // $item->getItem($itemIdToUpdate);
  // // $item->setItemName("Edited in PHP");
  // $item->setDescription("This is an updated description from PHP...");
  // $updateSuccess = $item->updateItem($itemIdToUpdate);

  // if ($updateSuccess) {
  //   echo <<<HTML
  //   <p>✔ Item updated successfully: {$itemIdToUpdate}</p>
  //   HTML;
  // } else {
  //   echo <<<HTML
  //   <p>☠ Item update failed: {$itemIdToUpdate}</p>
  //   HTML;
  // }


  /* 
   * TESTING: Deleting a item
   */

  // // Get item from database, change its data, update in the database
  // $itemIdToDelete = 9;
  // $item = new Item();
  // $deleteSuccess = $item->deleteItem($itemIdToDelete);

  // if ($deleteSuccess) {
  //   echo <<<HTML
  //   <p>✔ Item deleted successfully: {$itemIdToDelete}</p>
  //   HTML;
  // } else {
  //   echo <<<HTML
  //   <p>☠ Item delete failed: {$itemIdToDelete}</p>
  //   HTML;
  // }

} catch (Exception $ex) {

  // "Handle" exception
  $errorMessage = "Catastrophic error: {$ex->getMessage()}</p>";
  include_once TEMPLATES_DIR . "_error.html.php";

}

} else {
  // Display the form to add a new category
  include "templates/_addItemPage.html.php";
}

  // Stop output buffering - store output into the $content variable
  $content = ob_get_clean();

  // Include the main layout template
  include_once "templates/_layout.html.php";
