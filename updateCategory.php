<?php

// Common includes such as class definitions and constants
require_once "includes/common.php";


  Auth::protect();

 // Config
  $title = "Add Category";

  // Start output buffering (trap output, don't display it yet)
  ob_start();

  // Check if form has been submitted
  if (isset($_POST["submitUpdateCategory"])) {


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
       $categoryIdToUpdate = $_POST["categoryId"];
       $category = new Category();
       $category->getCategory($categoryIdToUpdate);
       $category->setCategoryName($_POST["categoryName"]);
       $updateSuccess = $category->updateCategory($categoryIdToUpdate);

       if ($updateSuccess) {
          $successMessage = "Category updated successfully, ID: $categoryIdToUpdate";
          include_once TEMPLATES_DIR . "_success.html.php";
       } else {
          $errorMessage = "Category update failed, ID: $categoryIdToUpdate";
          include_once TEMPLATES_DIR . "_error.html.php";
       }


      /* 
      * TESTING: Deleting a category 
      */

      // // Get category from database, change its data, update in the datbase
      // $categoryIdToDelete = 9;
      // $category = new Category();
      // $deleteSuccess = $category->deleteCategory($categoryIdToDelete);

      // if ($deleteSuccess) {
      //   echo <<<HTML
      //   <p>✔ Category deleted successfully: {$categoryIdToDelete}</p>
      //   HTML;
      // } else {
      //   echo <<<HTML
      //   <p>☠ Category delete failed: {$categoryIdToDelete}</p>
      //   HTML;
      // }

    } catch (Exception $ex) {

  // "Handle" exception
  $errorMessage = "Catastrophic error: {$ex->getMessage()}</p>";
  include_once TEMPLATES_DIR . "_error.html.php";

}

} else {
  // Display the form to add a new category
  include "templates/_updateCategoryPage.html.php";
}

  // Stop output buffering - store output into the $content variable
  $content = ob_get_clean();

  // Include the main layout template
  include_once "templates/_layout.html.php";