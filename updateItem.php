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
$title = "Update Item";

if (isset($_POST["submitUpdateItem"])) {
try
{
  /* 
     * Photo file upload
     * Reference for the $_FILES array: https://www.php.net/manual/en/features.file-upload.post-method.php
     */

    // File upload settings
    $targetDirectory = ROOT_DIR . "image/";
    $fileUploadOptional = false;

    // Skip file upload if no file given and upload is optional
    if (!($fileUploadOptional && $_FILES["photo"]["error"] === UPLOAD_ERR_NO_FILE)) {

      // Get the filename of the uploaded file (what was it originally called?)
      $fileName = isset($_FILES["photo"]["name"]) ? basename($_FILES["photo"]["name"]) : "";

      // Make sure file is an image (using file extension)
      $validExtensions = ["jpg", "jpeg", "gif", "png"];
      $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

      if (!in_array($fileExtension, $validExtensions)) {
        $errors["photo"] = "Invalid file extension, must be: " . implode(", ", $validExtensions);
      }
      
      // Check file size (not too big) using php.ini config and MAX_FILE_SIZE set in the form
      // You can also manually check the ["size"] of the file
      if (
        isset($_FILES["photo"]["error"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_FORM_SIZE ||
        isset($_FILES["photo"]["error"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_INI_SIZE
      ) {
        $errors["photo"] = "File is too large.";
      }

      // NODO: Add other file upload validation

      // Make sure there are no file errors detected
      if (empty($errors["photo"])) {

        // OPTIONAL: Change the file name
        // $fileName = "xxxxx.$fileExtension";

        $moveFrom = $_FILES["photo"]["tmp_name"];
        $moveTo = $targetDirectory . $fileName;

        // Move uploaded file from the temp location into the target location
        if (move_uploaded_file($moveFrom, $moveTo)) {

          // Success
          $photo = $fileName;

        } else {

          // Error
          $errors["photo"] = "Uploaded file could not be moved.";

        }
      }
    }

  /* 
   *  Updating a item
   */

  
   
   // Create new object instance (using the constructor)
    $item = new Item();
    
  // Set properties using the data from the form
  // Get item from database, change its data, update in the database

    $itemIdToUpdate = ($_POST["itemId"] ?? 0);

    $item->getItem($itemIdToUpdate);

    //// If no item name given, keep the old itemName
    $item->setItemName(!empty($_POST["itemName"]) ? $_POST["itemName"] : $item->getItemName());

    // If no file upload, keep the old photo
    if (empty($photo)) {
        $photo = $item->getPhoto();
    }
    $item->setPhoto($photo ?? "");

    
    //if (empty($_POST["price"])) {
    //    $item->setPrice($item->getPrice());
    // } else {
    //   $item->setPrice($_POST["price"]);
    // }

    // If no price given, keep the old price
    $item->setPrice(!empty($_POST["price"])  ? $_POST["price"] : $item->getPrice());
    
    // If no Sale price given, keep the old sale price
    $item->setSalePrice(!empty($_POST["salePrice"]) ? $_POST["salePrice"] : $item->getSalePrice());

    // If no description given, keep the old description
    // (or set to empty string if not set)
  
     $item->setDescription(!empty($_POST["description"]) ? $_POST["description"] : $item->getDescription());

    
    // If no category ID given, keep the old categoryId
    $item->setCategoryId(!empty($_POST["categoryId"]) ? intval($_POST["categoryId"]) : $item->getCategoryId());
    

    // Update the item in the database
    // Note: The updateItem method will use the item ID from the object
    $updateSuccess = $item->updateItem($itemIdToUpdate);

   if ($updateSuccess) {
      // Display success message
      $successMessage = "Item updated successfully, new ID: $itemIdToUpdate";
      include_once TEMPLATES_DIR . "_success.html.php";
   } else {
      // Display error message
      $errorMessage = "Failed to update item.";
      include_once TEMPLATES_DIR . "_error.html.php";
   }


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
  // Display the form to update an existing item
  include_once TEMPLATES_DIR . "_updateItemPage.html.php";
}

  // Stop output buffering - store output into the $content variable
  $content = ob_get_clean();

  // Include the main layout template
  include_once TEMPLATES_DIR . "_layout.html.php";
