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
      // // Get category from database, change its data, update in the datbase
       $categoryIdToDelete = $_POST["categoryId"];
       $category = new Category();
       $deleteSuccess = $category->deleteCategory($categoryIdToDelete);


       if ($deleteSuccess) {
          $successMessage = "Category updated successfully, ID: $categoryIdToUpdate";
          include_once TEMPLATES_DIR . "_success.html.php";
          session_start();
          $_SESSION['successMessage'] = $successMessage;
          header("Location: updateCategory.php");
          exit();
          $errorMessage = "Category delete failed: {$categoryIdToDelete}";
          include_once TEMPLATES_DIR . "_error.html.php";
       }

    } catch (Exception $ex) {

  // "Handle" exception
  $errorMessage = $ex->getMessage();
  include_once TEMPLATES_DIR . "_error.html.php";

}

} else {
  //display categories
  if (isset($_SESSION['successMessage'])) {
    $successMessage = $_SESSION['successMessage'];
    unset($_SESSION['successMessage']); // Remove the message after displaying it
    include_once TEMPLATES_DIR . "_success.html.php";
  }
  $category = new Category();
  $categories = $category->getCategories();
  include TEMPLATES_DIR . "_displayCategories.html.php";
  // Display the form to delete a category
  include "templates/_deleteCategoryPage.html.php";
}

  // Stop output buffering - store output into the $content variable
  $content = ob_get_clean();

  // Include the main layout template
  include_once "templates/_layout.html.php";