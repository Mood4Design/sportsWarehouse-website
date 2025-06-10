<?php

  // References
  require_once "includes/common.php";
  // Config
  $title = "Home";
  // Start output buffering (trap output, don't display it yet)
  ob_start();

  // Check if form has been submitted
  if (isset($_POST["submitCreateUser"])) {

    // Get data passed to this page
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    // Check if either username or password not supplied
    if ($username === "" || $password === "") {

      // Set error message
      $errorMessage = "Username and password are required.";
      
      // Re-display the form with errors
      include_once TEMPLATES_DIR . "_createUserPage.html.php";

    // Both username & password supplied
    } else {
      try {
        // Create new user
        // NoTE: createUser()is a static method, so we use class::method(), not $object->method()
        $newUserId = Auth::createUser($username,$password);
        // Set success message
        $successMessage ="New user added successfully, ID: " . $newUserId;

        } catch(Exception $ex){
          // Set error message
        $errorMessage ="Error adding new user: ". $ex->getMessage();
        }

        // Re-display create user form with messages
        include_once TEMPLATES_DIR . "_createUserPage.html.php";
      }

} else {
    // Display create user form
    include_once TEMPLATES_DIR . "_createUserPage.html.php";
  }

  // Stop output buffering - store output into our $output variable
  $output = ob_get_clean();

  // Include layout template
  include_once TEMPLATES_DIR . "_layoutAdmin.html.php";

  /**
   * Set an HTML-safe value of a form field from $_POST data.
   * @param string $fieldName The name of field to display.
   * @return string The HTML entity encoded output for the form field.
   */
  function setValue($fieldName)
  {
    return htmlspecialchars($_POST[$fieldName] ?? "");
  }