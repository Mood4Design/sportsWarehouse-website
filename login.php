<?php
   require_once "includes/common.php";
  // References
 // require_once "classes/Auth.php";

  // Check if user is already logged in, redirect to protected/success page
  if(Auth::isLoggedIn()){
    // Redirect the user to the success/protected page (skip login)
    header("Location:". Auth::SUCCESS_PAGE_URL);
    exit;
  }

  // Config
  $title = "Home";

  // Start output buffering (trap output, don't display it yet)
  ob_start();

  // Check if form has been submitted
  if (isset($_POST["submitLogin"])) {

    // Get data passed to this page
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    // Check if either username or password not supplied
    if ($username === "" || $password === "") {

      // Set error message
      $errorMessage = "Username and password are required.";
      
      // Re-display the form with errors
      include_once "./templates/_loginPage.html.php";

    // Both username & password supplied
    } else {
      try {
        // Authenticate user (check if user exists and password is correct)
        // Note: User will be redirected to the protected page if successful
        // NoTE: login() is a static method, so we use class::method(), not $object->method()
        $newUserId = Auth::login($username,$password);

        // If reach here, user is not authenticated successfully (otherwise they would be redirected)
        $errorMessage = "Username and password are not correct";

        } catch(Exception $ex){
          // Set error message
        $errorMessage ="Error logging in : ". $ex->getMessage();
        }

        // Re-display login user form with messages
        include_once "./templates/_loginPage.html.php";
      }

} else {
    // Display login user form
    include_once "./templates/_loginPage.html.php";
  }

  // Stop output buffering - store output into our $output variable
  $output = ob_get_clean();

  // Include layout template
  include_once "./templates/_layoutAdmin.html.php";


  /**
   * Set an HTML-safe value of a form field from $_POST data.
   * @param string $fieldName The name of field to display.
   * @return string The HTML entity encoded output for the form field.
   */
  function setValue($fieldName)
  {
    return htmlspecialchars($_POST[$fieldName] ?? "");
  }