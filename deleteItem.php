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
$title = "Delete Item";

if (isset($_POST["submitDeleteItem"])) {

try
{

  /* 
   * Deleting a item
   */

  // // Get item from database, change its data, update in the database
  $itemIdToDelete =  $_POST["itemId"];
  $item = new Item();
  $deleteSuccess = $item->deleteItem($itemIdToDelete);

  if ($deleteSuccess) {
    $successMessage = "Item deleted successfully, ID: $itemIdToDelete";
    include_once TEMPLATES_DIR . "_success.html.php";
  } else {
    $errorMessage = "Item deletion failed, ID: $itemIdToDelete";
    include_once TEMPLATES_DIR . "_error.html.php";
  }


} catch (Exception $ex) {

  // "Handle" exception
  $errorMessage = "Catastrophic error: {$ex->getMessage()}</p>";
  include_once TEMPLATES_DIR . "_error.html.php";

}

} else {
  // Display the form to delete an existing item
  include_once TEMPLATES_DIR . "_deleteItemPage.html.php";
}

  // Stop output buffering - store output into the $content variable
  $content = ob_get_clean();

  // Include the main layout template
  include_once TEMPLATES_DIR . "_layout.html.php";
