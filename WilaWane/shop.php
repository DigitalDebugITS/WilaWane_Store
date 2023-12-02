<?php

session_start();

include("../E-commerce/includes/db.php");
include("../E-commerce/includes/header.php");
include("../E-commerce/functions/functions.php");
include("../E-commerce/includes/main.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Wila Wane Store</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.cdnfonts.com/css/buffalo-3?styles=153173" rel="stylesheet">
                
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

<style>
  em{}
</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top" data--offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center  me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/hero-carousel/Wila_Wane.svg" alt=""> 
       
      </a>

      <nav id="navbar" class="navbar">
        <ul>


           
            <li><a class="nav-link " href="#">Home</a></li>
          <li><a class="nav-link " href="index.html#about">About</a></li>
          <li><a class="nav-link " href="index.html#services">Services</a></li>
          <li><a class="nav-link " href="index.html#portfolio">Portfolio</a></li>
          <li><a class="nav-link " href="index.html#team">Team</a></li>
           <!-- <li><a href="blog.html">Blog</a></li> -->
          <li><a class="nav-link " href="index.html#features">Values</a></li>
          <li><a class="nav-link " href="index.html#faq">FAQ</a></li>
          
          <li><a class="nav-link " href="index.html#contact">Contact</a></li>
      
          <li><a class="btn-getstarted " href="../E-commerce/checkout.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->

      

      <div class="basket" style="color: #fc32c3; font-size:35px;">
          <a href="../E-commerce/cart.php" class="btn btn--basket" style="color: #fc32c3; font-size:10px;">
          <i style="color: #fc32c3; font-size:35px;" class="bi bi-cart4"></i>
            <?php items(); ?> 
          </a>
        </div>

    </div>
  </header><!-- End Header -->

  <section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <img src="assets/img/hero-carousel/wila_wane e.png" class="img-fluid animated">
      <!-- <h2>Welcome to <span>WilaWane</span></h2> -->
    
     
  </section>

  <main id="main">

  <div id="content" class="container"><!-- container Starts -->

    <div class="row"><!-- row Starts -->

    <?php

    getPro();

    ?>

            <!-- Tab Content -->
          
          </div>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

   
      <div class="footer-legal text-center">
        <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

          <div class="d-flex flex-column align-items-center align-items-lg-start">
            <div class="copyright">
              &copy; Copyright <strong><span>WilaWane</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
              Designed by <a href="  ">Digital Debug IT Solutions</a>
            </div>
          </div>
  
          <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
            <a href="https://m.facebook.com/pages/Wila-Wane-Store/106955238955872/?locale=hi_IN" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/wilawane_store" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://l.instagram.com/?u=https%3A%2F%2Fwa.me%2F260975520847&e=AT29F0ZTN12zGL0_5jvEVaggF0EcbLbAbmH3NIbXHDlJXls5Xu9Hom-MJGSgM7ee-PH45Rshp_wnabKY3nhO9jTgZkZQT5abRtlxGw" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
          </div>
  
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>