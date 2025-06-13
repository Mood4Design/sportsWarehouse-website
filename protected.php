<?php

  // References
  require_once "includes/common.php";

  // Protect this page against unauthorised access(non-logged-in users)
  // Users will be redirected if they do NoT have valid data in the PHP session
  Auth::protect();

  // Config
  $title = "Protected page";

  // Start output buffering (trap output, don't display it yet)
  ob_start();

  // Include the page-specific template
  include_once "./templates/_protectedPage.html.php";

  // Stop output buffering - store output into our $content variable
  $content = ob_get_clean();

  // Include layout template
  include_once "./templates/_layout.html.php";