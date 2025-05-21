<?php
// Navigation items - Remove login.php from main nav
$categoryLinks = [
    "category.php?categoryId=1" => "Shoes",
    "category.php?categoryId=2" => "Helmets",
    "category.php?categoryId=3" => "Pants",
    "category.php?categoryId=4" => "Tops",
    "category.php?categoryId=5" => "Balls",
    "category.php?categoryId=6" => "Equipment",
    "category.php?categoryId=7" => "Training Gear"
];

$currentPage = basename($_SERVER["SCRIPT_NAME"]);
?>
<ul>
  <?php foreach ($categoryLinks as $linkHref => $linkText): ?>
    <?php $cssClass = strpos($_SERVER["REQUEST_URI"], $linkHref) !== false ? "active" : ""; ?>
    <li class="<?= $cssClass ?>"><a href="<?= $linkHref ?>"><?= $linkText ?></a></li>
  <?php endforeach; ?>
</ul>