<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $title ?? "NO TITLE" ?> - Auth testing</title>
  <link rel="stylesheet" href="./styles/styles.css">
  <script src="https://kit.fontawesome.com/92f1ade1f2.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="site-wrapper">
    <header>
        <div class="navcontainer">
            <!-- Hamburger Icon -->
            <input type="checkbox" id="hamburger-toggle" class="hamburger-toggle">
            <label for="hamburger-toggle" class="hamburger-menu" aria-label="Toggle navigation menu">
                <i class="fas fa-bars"></i> <!-- Hamburger Icon -->
                <i class="fas fa-times"></i> <!-- Cross Icon -->
            </label>
    
            <!-- Navigation Links -->
            <nav id="mainNav">
                 <?php include TEMPLATES_DIR . "_navigation.html.php"; ?>
            </nav>
      
            <!-- User Actions -->
            <div class="user-actions">
                <?php include TEMPLATES_DIR . "_userActionsAdmin.html.php"; ?>

            </div>
        </div>
    </header>

    <main>
        <!-- Slideshow -->
        <div class="slideshow">
            <div class="container">
                <div class="logo">
                    <img src="image/sports-warehouse-logo.png" alt="Sports Warehouse Logo">
                </div>
                <!-- Search Form -->
                <?php include TEMPLATES_DIR . "_searchForm.html.php"; ?>
                <!-- Main Navigation -->
                <nav class="main-nav">
                    <div class="container">
                        <?php include TEMPLATES_DIR . "_categoryNavigation.html.php"; ?>
                    </div>
                </nav>
                <img src="image/Banner01.png" alt="Soccer Ball Banner">
            </div>
        </div>

        <!-- Featured Products -->
        <?= $content ?? 'NO CONTENT - $content not defined' ?>

        <!-- Brands and Partnerships -->
        <section class="brands-partnerships">
            <div class="container">
                <h3>Our brands and partnerships</h3>
                <div class="content">
                    <div class="text">
                        <p>These are some of our top brands and partnerships.</p>
                        <p><a href="#">The best of the best is here.</a></p>
                    </div>
                    <div class="brand-logos">
                        <img src="image/nike.png" alt="Nike Logo">
                        <img src="image/adidas.png" alt="Adidas Logo">
                        <img src="image/asics.png" alt="Asics Logo">
                        <img src="image/skins.png" alt="Skins Logo">
                        <img src="image/newbalance.png" alt="New Balance Logo">
                        <img src="image/wilson.png" alt="Wilson Logo">
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-section site-navigation">
                <h2>Site navigation</h2>          
                     <?php include TEMPLATES_DIR . "_navigation.html.php"; ?>
            </div>
            <div class="footer-section product-categories">
                <h2>Product categories</h2>
                     <?php include TEMPLATES_DIR . "_categoryNavigation.html.php"; ?>
            </div>
            <div class="footer-section contact-info">
                <h2>Contact Sports Warehouse</h2>
                <div class="social-icons">
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i> Facebook</a>
                    <a href="https://twitter.com/"><i class="fab fa-twitter"></i> Twitter</a>
                    <a href="https://www.example.com/contact"><i class="fa-solid fa-paper-plane"></i> Other</a>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; Copyright 2025 Sports Warehouse. &emsp; All rights reserved. &emsp; Website made by Awesomesauce Design and Allan Lee</p>
        </div>
    </footer>
  </div>
</body>
</html>


