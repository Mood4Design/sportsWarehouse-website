<?php

  // Common includes for main PHP pages (controllers)
  require_once "includes/common.php";

  // Config
  $title = "About";

  // Get list of services (e.g. from database)
  $about = [
    // "name" => "description",
    "Primary Purpose of the Website" => "The primary purpose of the website is to increase sales and create brand awareness. 
    We aim to provide an online platform where customers can easily browse and purchase our products, 
    which will help us reach a wider audience beyond our physical stores.",
    "The short-term and long-term business goals" => "In the short term, we want to establish a strong online presence and streamline the purchasing process. 
    Long-term goals include expanding our market reach beyond the Illawarra region, increasing our product range, 
    and supporting community sports organisations through our sales.",
    "Specific products or categories" => "Initially, we would like to highlight our Australian-made clothing and accessories, as well as our branded sports apparel. These products align with our mission to support local businesses and provide quality items.",
    "The key success" => "Success will be measured by increased online sales, good website traffic, improved customer engagement, and positive customer feedback.",
    "The target audience" => "Our target audience includes families and individuals involved in casual sporting activities, particularly parents aged 30-55",
    
  ];

  // Start output buffering
  ob_start();

  // Include the page-specific template
  include_once "templates/_aboutPage.html.php";

  // Stop output buffering
  $content = ob_get_clean();

  // Include the main layout template
  include_once "templates/_layout.html.php";