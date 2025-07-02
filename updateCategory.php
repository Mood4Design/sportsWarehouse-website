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
              // If the update was successful, prepare a success message
              $successMessage = "Category updated successfully, ID: $categoryIdToUpdate";
              // Include the success message template to display feedback to the user
              include_once TEMPLATES_DIR . "_success.html.php";
              // Start a session to store the success message (for display after redirect)
              session_start();
              $_SESSION['successMessage'] = $successMessage;
              // Redirect to the updateCategory.php page to prevent form resubmission and show the updated list
              header("Location: updateCategory.php");
              exit(); // Stop further script execution after redirect
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
  // If redirected after a successful update, display the success message from the session (if it exists)
  if (isset($_SESSION['successMessage'])) {
    $successMessage = $_SESSION['successMessage'];
    // Remove the message after displaying it to avoid repeat messages
    unset($_SESSION['successMessage']); 
     // Show the success message to the user
    include_once TEMPLATES_DIR . "_success.html.php"; 
  }
  // Display the list of categories
  $category = new Category();
  $categories = $category->getCategories();
  include TEMPLATES_DIR . "_displayCategories.html.php";

  // Check if a category ID is provided in the query string
  if (isset($_GET['categoryId'])) {
    $categoryIdToUpdate = $_GET['categoryId'];
    $categoryToUpdate = new Category();
    $categoryToUpdate->getCategory($categoryIdToUpdate);

    // Include the form to update an existing category, passing the category data
    include_once TEMPLATES_DIR . "_updateCategoryPage.html.php";
  } else {
    // Display the form to select a category to update
    echo "<p>Please select a category to update from the list below.</p>";
    include_once TEMPLATES_DIR . "_updateCategoryPage.html.php";
  }
}
  // Stop output buffering - store output into the $content variable
  $content = ob_get_clean();

  // Include the main layout template
  include_once TEMPLATES_DIR . "_layout.html.php";