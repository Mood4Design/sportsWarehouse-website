<?php
  // User action items
  $userActionLinks = [
    "login.php" => "<i class='fas fa-lock'></i> Login",
    "cart.php" => "<i class='fas fa-shopping-cart'></i> Cart",
    "items.php" => "<span class='item-count'></span> Items",
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
    <div class="<?= $linkHref === 'login.php' ? 'login-action' : ($linkHref === 'cart.php' ? 'cart' : ($linkHref === 'items.php' ? 'item-count' : '')) ?> <?= $cssClass ?>">
      <a href="<?= $linkHref ?>"><?= $linkText ?></a>
    </div>
  <?php endforeach ?>
</div>