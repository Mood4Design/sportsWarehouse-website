<?php

// Common includes such as class definitions and constants
require_once "includes/common.php";


  Auth::protect();

 // Config
  $title = "Add Category";

  // Start output buffering (trap output, don't display it yet)
  ob_start();

  // Check if form has been submitted
  if (isset($_POST["submitAddCategory"])) {


    try
    {

      /* 
      * TESTING: Adding a new category 
      */

      // // Create new object, add data, insert into datbase
      $category = new Category();
      $category->setCategoryName($_POST["categoryName"]);
      $newCategoryId = $category->insertCategory();
      
      // Display success message
      if ($newCategoryId){
        $successMessage = "Category added successfully, new ID: $newCategoryId";
        include_once TEMPLATES_DIR . "_success.html.php";
        session_start();
          $_SESSION['successMessage'] = $successMessage;
          header("Location: addCategory.php");
          exit();

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
  // Fetch categories from the database
  $category = new Category();
     // try {
            $categories = $category->getCategories();
          // } catch (Exception $e) {
          //   $errorMessage = "Error fetching categories: " . $e->getMessage();
          //   include_once TEMPLATES_DIR . "_error.html.php";
          //   $categories = []; // Ensure $categories is an empty array to avoid the foreach error
          // }

  //display categories
  include "templates/_displayCategories.html.php";
  // Display the form to add a new category
  include_once TEMPLATES_DIR . "_addCategoryPage.html.php";
}

  // Stop output buffering - store output into the $content variable
  $content = ob_get_clean();

  // Include the main layout template
  include_once TEMPLATES_DIR . "_layout.html.php";