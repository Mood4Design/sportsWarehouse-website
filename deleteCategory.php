<?php

// Common includes such as class definitions and constants
require_once "includes/common.php";


  Auth::protect();

 // Config
  $title = "Add Category";

  // Start output buffering (trap output, don't display it yet)
  ob_start();

  // Check if form has been submitted
  if (isset($_POST["submitDeleteCategory"])) {


    try
    {

      /* 
      * TESTING: Adding a new category 
      */

      // // Create new object, add data, insert into datbase
      //$category = new Category();
      //$category->setCategoryName($_POST["categoryName"]);
      //$newCategoryId = $category->insertCategory();
      
      // Display success message
      //$successMessage = "Category added successfully, new ID: $newCategoryId";
      //include_once TEMPLATES_DIR . "_success.html.php";

      
      /* 
      * TESTING: Updating a category 
      */

      // // Get category from database, change its data, update in the datbase
      //// $categoryIdToUpdate = 11;
      // $category = new Category();
      // $category->getCategory($categoryIdToUpdate);
      // // $category->setCategoryName("Edited in PHP");
      // $category->setDescription("This is an updated description from PHP...");
      // $updateSuccess = $category->updateCategory($categoryIdToUpdate);

      // if ($updateSuccess) {
      //   echo <<<HTML
      //   <p>✔ Category updated successfully: {$categoryIdToUpdate}</p>
      //   HTML;
      // } else {
      //   echo <<<HTML
      //   <p>☠ Category update failed: {$categoryIdToUpdate}</p>
      //   HTML;
      // }


      /* 
      * TESTING: Deleting a category 
      */

      // // Get category from database, change its data, update in the datbase
       $categoryIdToDelete = $_POST["categoryId"];
       $category = new Category();
       $deleteSuccess = $category->deleteCategory($categoryIdToDelete);


       if ($deleteSuccess) {
       
          $successMessage = "Category deleted successfully, ID: $categoryIdToDelete";
          include_once TEMPLATES_DIR . "_success.html.php";
       } else {
          $errorMessage = "Category delete failed: {$categoryIdToDelete}";
          include_once TEMPLATES_DIR . "_error.html.php";
       }

    } catch (Exception $ex) {

  // "Handle" exception
  echo "<p>Catastrophic error: {$ex->getMessage()}</p>";
  

}

} else {
  // Display the form to delete a category
  include "templates/_deleteCategoryPage.html.php";
}

  // Stop output buffering - store output into the $content variable
  $content = ob_get_clean();

  // Include the main layout template
  include_once "templates/_layout.html.php";