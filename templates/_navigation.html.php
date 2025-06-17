<?php
  // Navigation items - Remove login.php from main nav
  $navLinks = [
    "login.php" => "Login",
    "index.php" => "Home",
    "about.php" => "About SW",
    "contact.php" => "Contact US",
    "cart.php" => "View Products",
  ];

  $currentPage = basename($_SERVER["SCRIPT_NAME"]);
?>
<ul>
  <?php foreach ($navLinks as $linkHref => $linkText): ?>
    <?php $cssClass = $linkHref === $currentPage ? "active" : ""; ?>
    <li class="<?= $cssClass ?>"><a href="<?= $linkHref ?>"><?= $linkText ?></a></li>
  <?php endforeach ?>
</ul>