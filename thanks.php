<?php

      // Common includes for main PHP pages (controllers)
      require_once "includes/common.php";

      $title = "Thanks";
            $pageHeading = "Order confirmation";
                  $orderId = 0;
                  //check pay button was pressed and there is a cart in the session
                        if(isset($_POST["pay"]) && isset($_SESSION["cart"]))
                              {
                                    //get all the posted data
                                    $address = $_POST["address"];
                                    $phone = $_POST["phone"];
                                    $creditcard = $_POST["creditcard"];
                                    $csv = $_POST["csv"];
                                    $email = $_POST["email"];
                                    $expiry = $_POST["expiry"];
                                    $firstName = $_POST["firstName"];
                                    $lastName = $_POST["lastName"];
                                    $nameOnCard = $_POST["nameOnCard"];

                                    // Validation
                                    $errors = [];

                                    if (empty($firstName) || strlen($firstName) < 2) {
                                        $errors['firstName'] = "Please enter a valid first name (minimum 2 characters).";
                                    }

                                    if (empty($lastName) || strlen($lastName) < 2) {
                                        $errors['lastName'] = "Please enter a valid last name (minimum 2 characters).";
                                    }

                                    if (empty($address) || strlen($address) < 5) {
                                        $errors['address'] = "Please enter a valid address (minimum 5 characters).";
                                    }

                                    if (empty($phone) || !ctype_digit($phone) || strlen($phone) != 10) {
                                        $errors['phone'] = "Please enter a valid phone number (10 digits).";
                                    }

                                    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                        $errors['email'] = "Please enter a valid email address.";
                                    }

                                    if (empty($creditcard) || !ctype_digit($creditcard) || strlen($creditcard) != 16) {
                                        $errors['creditcard'] = "Please enter a valid credit card number (16 digits).";
                                    }

                                    if (empty($nameOnCard) || strlen($nameOnCard) < 2) {
                                        $errors['nameOnCard'] = "Please enter a valid name on card (minimum 2 characters).";
                                    }

                                    if (empty($expiry) || !preg_match('/^(0[1-9]|1[0-2])\/?([0-9]{2})$/', $expiry)) {
                                        $errors['expiry'] = "Please enter a valid expiry date (MM/YY).";
                                    }

                                    if (empty($csv) || !ctype_digit($csv) || strlen($csv) != 3) {
                                        $errors['csv'] = "Please enter a valid CSV code (3 digits).";
                                    }

                                    if (!empty($errors)) {
                                        // Redirect back to checkout with errors
                                        $_SESSION['errors'] = $errors;
                                        header('Location: checkout.php');
                                        exit();
                                    }

                                    //retreive shopping cart from session
                                    $cart = $_SESSION["cart"];
                                    //save the shopping cart
                                    $orderId = $cart->saveCart($address, $phone, $creditcard, $csv, $email, $expiry, $firstName, $lastName, $nameOnCard);
                        //clear the session
      session_destroy();
      }
      //start buffer
      ob_start();
      //display order confirmation
      include "templates/_orderConfirmation.html.php";
      $content = ob_get_clean();
      include "templates/_layout.html.php";