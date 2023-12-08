<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->

    <!-- Example: -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">

</head>
<body>
 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top" data--offset="0">
      <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center  me-auto me-lg-0">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <img src="../assets/img/hero-carousel/Wila_Wane.svg" alt=""> 
        
        </a>
       
        
        </nav><!-- .navbar -->

        

        <div>
          <?PHP
        if (isset($_SESSION['customer_email'])) {
    $customer_email = $_SESSION['customer_email'];
    $get_customer = "SELECT * FROM customers WHERE customer_email='$customer_email'";
    $run_customer = mysqli_query($con, $get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $user_name = $row_customer['customer_name'];
    $user_id = $row_customer['customer_id'];
    echo "Welcome : $user_name";
} else {
    echo "Welcome : Guest";

}

?>

            </div>
            <?php if (isset($_SESSION['customer_email'])) : ?>
        <a href="logout.php">Logout</a>
    <?php endif; ?> 
        <div class="basket" style="color: #fc32c3; font-size:30px;">
        
            <a href="cart.php" class="btn btn--basket" style="color: #fc32c3; font-size:25px;">
            <i style="color: #fc32c3; font-size:20px;" class="bi bi-cart4"></i>
              <?php items(); ?> 
            </a>
          </div>

      </div>  
    </header><!-- End Header -->


    <!-- Add the rest of your body content here -->

</body>
</html>
