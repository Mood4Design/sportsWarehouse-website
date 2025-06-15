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
      * Updating a category 
      */

      // // Get category from database, change its data, update in the datbase
       $categoryIdToUpdate = $_POST["categoryId"];
       $category = new Category();
       $category->getCategory($categoryIdToUpdate);
       $category->setCategoryName($_POST["categoryName"]);
       $updateSuccess = $category->updateCategory($categoryIdToUpdate);

       if ($updateSuccess) {
          
          //header("Location: updateCategory.php");
          $successMessage = "Category updated successfully, ID: $categoryIdToUpdate";
          include_once TEMPLATES_DIR . "_success.html.php";
          session_start();
          $_SESSION['successMessage'] = $successMessage;
          header("Location: updateCategory.php");
          exit();
       } else {
          $errorMessage = "Category update failed, ID: $categoryIdToUpdate";
          include_once TEMPLATES_DIR . "_error.html.php";
       }

    } catch (Exception $ex) {

  // "Handle" exception
  $errorMessage = "Catastrophic error: {$ex->getMessage()}</p>";
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
  
  // Display the form to add a new category
  include_once TEMPLATES_DIR . "_updateCategoryPage.html.php";
}

  // Stop output buffering - store output into the $content variable
  $content = ob_get_clean();

  // Include the main layout template
  include_once TEMPLATES_DIR . "_layout.html.php";