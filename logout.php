<?php

  // References
  require_once "includes/common.php";
  session_start();

  // LOGOUT user, redirect to login page if not
  Auth::logout();
 