<?php

  // Common includes for main PHP pages (controllers)
  require_once "includes/common.php";


//session_start();
$title = "Checkout";

//start buffer
ob_start();
//display checkout form
include "templates/_checkoutForm.html.php";
$content = ob_get_clean();
include "templates/_layout.html.php";