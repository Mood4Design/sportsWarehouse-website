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

try
{

  // Create new object instance (using the constructor)
  //$item = new Item();

  // Get a item from the database by its ID (load object properties)
  //$item->getItem(3);

  // $item->setItemName("   ");

  // Print item info
  //echo <<<HTML
  //<p>Name: {$item->getItemName()}, Description: {$item->getDescription()}</p>
  //HTML;


  /* 
   * TESTING: Adding a new item
   */

  // // Create new object, add data, insert into datbase
   $item = new Item();
   $item->setItemName("Added from PHP");
   $item->setPrice(99.99);
   $item->setDescription("This is a beautiful description from PHP...");
   $item->setCategoryId(1);
   $newItemId = $item->insertItem();

   echo <<<HTML
   <p>New item added successfully: {$newItemId}</p>
   HTML;


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
  echo "<p>Catastrophic error: {$ex->getMessage()}</p>";

}