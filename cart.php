<?php

  // Common includes for main PHP pages (controllers)
  require_once "includes/common.php";

  //create a category object
$item = new Item();

//retrieve all products so they can be listed
$productRows = $item->getItems();

//add item to shopping cart
if(isset($_POST["buy"])) {
    //check product id and qty are not empty
    if(!empty($_POST["productId"]) && !empty($_POST["qty"])) {
        $productId = $_POST["productId"];
        $qty = $_POST["qty"];
        //get the product details
        $item = new Item();
        $item->getItem($productId);
        //create a new cart item so it can be added to the shopping cart
        $cartItem = new CartItem($item->getItemName(), $qty, $item->getPrice(), $productId);
        
        //read shopping cart from session
        if(isset($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
        } else {
            $cart = new ShoppingCart();
        }
        
        //add item to shopping cart
        $cart->addItem($cartItem);
        //save shopping cart back into session
        $_SESSION["cart"] = $cart;
    } else {
        //display error message
        $errorMessage = "Please select a product and quantity.";
        include "templates/_error.html.php";
    }
}

//remove item from shopping cart
if(isset($_POST["remove"]))
    {
      //check product id was supplied and cart exists in session
      if(!empty($_POST["productId"]) && isset($_SESSION["cart"]))
          {
              $productId = $_POST["productId"];

              //the only value that is important is the product Id
              $item = new CartItem("", 0, 0, $productId);
              //read shopping cart from session
              $cart = $_SESSION["cart"];
              //remove item from shopping cart
              $cart->removeItem($item);
              //save shopping cart back into session
              $_SESSION["cart"] = $cart;
          }
          else
          {
              //display error message
              $errorMessage = "Please select a product to remove.";
              include "templates/_error.html.php";
          }
}

//create a new cart item so it can be removed from the shopping cart

  /*
    TESTING: Add items to the shopping cart 
   */

  // // Create testing CartItems
 

  // Add items to the cart
  // $cart->addItem($item1);
  // $cart->addItem($item2);
  // //$cart->addItem($item3);

  // // Save the cart back into the session (super important!)
  // $_SESSION["cart"] = $cart;

  // $cart->displayArray();
  // exit;


  // Config
  $title = "Shopping cart";

  // Start output buffering (trap output - don't display it yet)
  ob_start();

  // Fetch items
  $item = new Item();
  $productRows = $item->getItems();

  //display items
  include "templates/_displayItems.html.php";

  // Include the page-specific template
  include_once "templates/_cartPage.html.php";

  // Stop output buffering - store output into the $content variable
  $content = ob_get_clean();

  // Include the main layout template
  include_once "templates/_layout.html.php";
