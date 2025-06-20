<?php
  // Include necessary classes
 require_once "includes/common.php";

  if(!isset($_SESSION))
  {
    session_start();
  }

  if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = new ShoppingCart();
  }


  // User action items
  $userActionLinks = [
    "login.php" => "<i class='fas fa-lock'></i> Login",
    "shoppingCart.php" => "<i class='fas fa-shopping-cart'></i> Cart",
    "indexAdmin.php" => "<i class='fas fa-user-shield'></i> Admin",
    "items.php" => "<span class='item-count'></span> Items (" . $_SESSION["cart"]->getTotalQuantity() . ")",
  ];

  // Get the currently-loaded PHP page/script
  $currentPage = basename($_SERVER["SCRIPT_NAME"]);
?>

<div class="user-actions">
  <?php foreach ($userActionLinks as $linkHref => $linkText): ?>
    <?php
      // Check if current page
      $cssClass = $linkHref === $currentPage ? "active" : "";
    ?>
    <div class="<?= $linkHref === 'login.php' ? 'login-action' : ($linkHref === 'shoppingCart.php' ? 'cart' : ($linkHref === 'shoppingCart.php' ? 'item-count' : '')) ?> <?= $cssClass ?>">
      <a href="<?= $linkHref ?>"><?= $linkText ?></a>
    </div>
  <?php endforeach ?>
</div>