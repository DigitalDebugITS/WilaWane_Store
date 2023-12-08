
<?php
include("includes/db.php");

include("functions/functions.php");
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
  

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

    <style>
        /* Add your custom styles for the cart page */
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
        }

        #content {

            display: flex;
            justify-content: space-between;
            padding-top: 90px;
        }

        #cart {
            flex: 1;
            background-color: #fff;
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table.table {
            border-collapse: collapse;
            width: 100%;
        }

        table.table th, table.table td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: center;
        }

        table.table th {
            background-color: #F62AA0;
            color: #fff;
        }

        table.table img {
            max-width: 80px; /* Adjust the image size as needed */
            max-height: 80px;
            border-radius: 4px;
        }

        table.table .quantity {
            width: 50px;
        }

        table.table .btn {
            padding: 5px 10px;
            font-size: 14px;
        }

        #order-summary {
            flex: 0 0 30%; /* Fixed width for the order summary */
            margin-left: 20px; /* Add a margin to separate the two sections */
            background-color: #fff;
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #order-summary h3 {
            color: #007bff;
        }

        #order-summary table.table th, #order-summary table.table td {
            border-color: #dee2e6;
        }

        #order-summary table.table .total {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    <header id="header" class="header fixed-top" data--offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <img src="assets/img/hero-carousel/Wila_Wane.svg" alt="">
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link" href="#">Home</a></li>
                    <li><a class="nav-link" href="index.html#about">About</a></li>
                    <li><a class="nav-link" href="index.html#services">Services</a></li>
                    <li><a class="nav-link" href="index.html#portfolio">Portfolio</a></li>
                    <li><a class="nav-link" href="index.html#team">Team</a></li>
                    <li><a class="nav-link" href="index.html#features">Values</a></li>
                    <li><a class="nav-link" href="index.html#faq">FAQ</a></li>
                    <li><a class="nav-link" href="index.html#contact">Contact</a></li>
                    <li><a class="btn-getstarted" href="checkout.php">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav>
           
            <div class="basket" style="color: #fc32c3; font-size:30px;">
          <a href="cart.php" class="btn btn--basket" style="color: #fc32c3; font-size:25px;">
          <i style="color: #fc32c3; font-size:20px;" class="bi bi-cart4"></i>
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