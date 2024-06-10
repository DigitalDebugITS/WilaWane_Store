<?php
session_start();

include("includes/db.php");
include("functions/functions.php");

$product_id = @$_GET['pro_id'];
$get_product = "select * from products where product_url='$product_id'";
$run_product = mysqli_query($con, $get_product);
$check_product = mysqli_num_rows($run_product);

if ($check_product == 0) {
    echo "<script> window.open('index.php','_self') </script>";
} else {
    $row_product = mysqli_fetch_array($run_product);
    $p_cat_id = $row_product['p_cat_id'];
    $pro_id = $row_product['product_id'];
    $pro_title = $row_product['product_title'];
    $pro_price = $row_product['product_price'];
    $pro_desc = $row_product['product_desc'];
    $pro_img1 = $row_product['product_img1'];
    $pro_img2 = $row_product['product_img2'];
    $pro_img3 = $row_product['product_img3'];
    $pro_label = $row_product['product_label'];
    $pro_psp_price = $row_product['product_psp_price'];
    $pro_features = $row_product['product_features'];
    $status = $row_product['status'];
    $pro_url = $row_product['product_url'];

    if ($pro_label == "") {
    } else {
        $product_label = "
            <a class='label sale' href='#' style='color:black;'>
                <div class='thelabel'>$pro_label</div>
                <div class='label-background'> </div>
            </a>
        ";
    }

    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    //$p_cat_title = $row_p_cat['p_cat_title'];
  }
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
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,400;0,700;1,300;1,400;1,500;1,400;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,400;0,700;1,300;1,400;1,500;1,400;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,400;0,700;1,300;1,400;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Your custom scripts -->
<script>
  $(document).ready(function () {
    $('#productCarousel').carousel({
      interval: 4000, 
      ride: 'carousel' 
    });
  });
</script>



  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="assets/css/variables.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


    <style>

html {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  line-height: 1.15;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%
}

h1 {
  font-size: 2em;
  margin: .67em 0
}

figcaption, figure, main {
  display: block
}

figure {
  margin: 1em 40px
}

hr {
  box-sizing: content-box;
  height: 0;
  overflow: visible
}

pre {
  font-family: monospace, monospace;
  font-size: 1em
}

a {
  background-color: transparent;
  -webkit-text-decoration-skip: objects
}

a:active, a:hover {
  outline-width: 0
}

abbr[title] {
  border-bottom: none;
  text-decoration: underline;
  text-decoration: underline dotted
}

b, strong {
  font-weight: inherit;
  font-weight: bolder
}

code, kbd, samp {
  font-family: monospace, monospace;
  font-size: 1em
}

dfn {
  font-style: italic
}

mark {
  background-color: #ff0;
  color: #000
}

small {
  font-size: 80%
}

sub, sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline
}

sub {
  bottom: -.25em
}

sup {
  top: -.5em
}

audio, video {
  display: inline-block
}

audio:not([controls]) {
  display: none;
  height: 0
}

img {
  border-style: none
}

svg:not(:root) {
  overflow: hidden
}

button, input, optgroup, select, textarea {
  font-family: sans-serif;
  font-size: 100%;
  line-height: 1.15;
  margin: 0
}

button, input {
  overflow: visible
}

button, select {
  text-transform: none
}

[type=reset], [type=submit], button, html [type=button] {
  -webkit-appearance: button
}

[type=button]::-moz-focus-inner, [type=reset]::-moz-focus-inner, [type=submit]::-moz-focus-inner, button::-moz-focus-inner {
  border-style: none;
  padding: 0
}

[type=button]:-moz-focusring, [type=reset]:-moz-focusring, [type=submit]:-moz-focusring, button:-moz-focusring {
  outline: 1px dotted ButtonText
}

fieldset {
  border: 1px solid silver;
  margin: 0 2px;
  padding: .35em .625em .75em
}

legend {
  box-sizing: border-box;
  color: inherit;
  display: table;
  max-width: 100%;
  padding: 0;
  white-space: normal
}

progress {
  display: inline-block;
  vertical-align: baseline
}

textarea {
  overflow: auto
}

        #content {

            display: flex;
            justify-content: space-between;
            padding-top: 30px;
        }

        #cart {
            flex: 1;
            background-color: #fff;
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #myCarousel img {
          max-width: 50%; 
            max-height: 50px; 
            height: auto;
            width: auto; 
        }

        #thumbs img {
            max-width: 100%;
            height: auto;
        }

        .product img {
            max-width: 100%; 
            max-height: 100px; 
            height: auto;
            width: auto; 
          }
          header {
            background-color: #fff; 
            padding: 15px 0; 
          }
          .navbar {
            background-color: #fff;; 
          }

          .buttons {
    margin-top: 40px;
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

  <main id="main">
    <div id="content">
    <div class="container my-5">

    <h1  >Product Details</h1>
    <div class="row">
      <!-- Product Images Carousel -->
      <div class="col-md-6">
      <div id="productCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
      <div class="carousel-item active">
      <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="d-block w-100" alt="Image 1">
      </div>
      <div class="carousel-item">
      <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="d-block w-100" alt="Image 2">
      </div>
      <div class="carousel-item">
      <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="d-block w-100" alt="Image 3">
      </div>
   </div>
   <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev" style="color:#F62AA0;">
      <span class="sr-only" style="color:#F62AA0; font-size: 40px;"><</span>
   </a>
   <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next"  style="color:#F62AA0;">
      <span class="sr-only"  style="color:#F62AA0; font-size: 40px;">></span>
   </a>
        </div>
      </div>

      <!-- Product Information -->
      <div class="col-md-6">
        <div class="product-details">
          <h1 class="mb-3"><?php echo $pro_title; ?></h1>

          <!-- Product Price -->
          <p class="price">
            <?php
            if ($pro_label == "Sale" || $pro_label == "Gift") {
              echo "Product Price: <del> K$pro_price </del><br>Product Sale Price: $$pro_psp_price";
            } else {
              echo "Product Price: K$pro_price";
            }
            ?>
          </p>



          <?php


if(isset($_POST['add_cart'])){

$ip_add = getRealUserIp();

$p_id = $pro_id;

$product_qty = $_POST['product_qty'];


$check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

$run_check = mysqli_query($con,$check_product);

if(mysqli_num_rows($run_check)>0){

echo "<script>alert('This Product is already added in cart')</script>";

echo "<script>window.open('$pro_url','_self')</script>";

}
else {

$get_price = "select * from products where product_id='$p_id'";

$run_price = mysqli_query($con,$get_price);

$row_price = mysqli_fetch_array($run_price);

$pro_price = $row_price['product_price'];

$pro_psp_price = $row_price['product_psp_price'];

$pro_label = $row_price['product_label'];

if($pro_label == "Sale" or $pro_label == "Gift"){

$product_price = $pro_psp_price;

}
else{

$product_price = $pro_price;

}

$query = "insert into cart (p_id,ip_add,qty,p_price) values ('$p_id','$ip_add','$product_qty','$product_price')";

$run_query = mysqli_query($db,$query);

//echo "<script>alert('This Product has been added to cart')</script>";


echo "<script>window.open('$pro_url','_self')</script>";

}

}


?>

<form action="" method="post" class="form-horizontal" ><!-- form-horizontal Starts -->

<?php

if($status == "product"){

?>

          <!-- Product Quantity Form -->
          <?php if ($status == "product") : ?>
            <form action="" method="post" class="form-horizontal">
              <div class="form-group">
                <label class="col-md-5 control-label">Product Quantity</label>
                <div class="col-md-7">
                  <select name="product_qty" class="form-control">
                    <option>Select quantity</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
              </div>


                    <!-- Product Description and Features Tabs -->
          <ul class="nav nav-tabs mt-4" id="myTabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab">
                Description
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="features-tab" data-toggle="tab" href="#features" role="tab">
                Features
              </a>
            </li>
          </ul>

          <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="description" role="tabpanel">
              <?php echo $pro_desc; ?>
            </div>
            <div class="tab-pane fade show active" id="features" role="tabpanel"  >
              <?php echo $pro_features; ?>
            </div>
          </div>

          <hr>
        <div> 
          <div>
              <!-- Add to Cart and Wishlist Buttons -->
              <div class="buttons">
                <button class='btn btn-danger' type="submit" name="add_cart"  style="background-color:#f9d030; color:black;">
                  Add to Cart <i class="bi bi-cart-check"></i>
                </button>

                <button class="btn btn-warning" type="submit" name="add_wishlist" style="background-color:#F62AA0; color:white;">
                    Add to Wishlist <i class="bi bi-bookmark-heart-fill"></i>
                </button>
                <div class="buttons">
                <a href="e_shop.php" class="btn " style="background-color:#F62AA0; color:white;"> Continue Shopping  <i class="bi bi-shop"></i></a>
                </div> 
              </div>
            </form>
          <?php endif; ?>

        </div>
      </div>
    </div>

    <br>
<div>
    <h1 class="text-center"> You may also like these Products:</h1>

    <div class="row mt-5">

<?php

$get_products = "select * from products order by rand() LIMIT 0,4";

$run_products = mysqli_query($con,$get_products);

while($row_products = mysqli_fetch_array($run_products)) {

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

$pro_label = $row_products['product_label'];


$pro_psp_price = $row_products['product_psp_price'];

$pro_url = $row_products['product_url'];


if($pro_label == "Sale" or $pro_label == "Gift"){

$product_price = "<del> K$pro_price </del>";

$product_psp_price = "| K$pro_psp_price";

}
else{

$product_psp_price = "";

$product_price = "K$pro_price";

}


if($pro_label == ""){


}
else{

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>$pro_label</div>

<div class='label-background'> </div>

</a>

";

}


echo "

<div class='col-md-3 col-sm-6 center-responsive' >

<div class='product' >

<a href='$pro_url' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<center>

</center>

<hr>

<h3><a href='$pro_url' style='color:black; font-size:20px' >$pro_title</a></h3>

<p class='price' > $product_price $product_psp_price </p>

<div class='buttons'>
<a href='$pro_url' class='btn btn-default'  style='background-color:#F62AA0; color:white;'> <i class='bi bi-eye'></i> View Details </a>

<a href='$pro_url' class='btn btn-danger' style='background-color:#f9d030; color:black;'>
<i class='bi bi-cart-check'></i> Add To Cart
</a>
</div>

</p>

</div>

$product_label


</div>

</div>

";


}


?>
<?php

if(isset($_POST['add_wishlist'])){

if(!isset($_SESSION['customer_email'])){

echo "<script>alert('You Must Login To Add Product In Wishlist')</script>";

echo "<script>window.open('checkout.php','_self')</script>";

}
else{

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$select_wishlist = "select * from wishlist where customer_id='$customer_id' AND product_id='$pro_id'";

$run_wishlist = mysqli_query($con,$select_wishlist);

$check_wishlist = mysqli_num_rows($run_wishlist);

if($check_wishlist == 1){

echo "<script>alert('This Product Has Been already Added In Wishlist')</script>";

echo "<script>window.open('$pro_url','_self')</script>";

}
else{

$insert_wishlist = "insert into wishlist (customer_id,product_id) values ('$customer_id','$pro_id')";

$run_wishlist = mysqli_query($con,$insert_wishlist);

if($run_wishlist){

echo "<script> alert('Product Has Inserted Into Wishlist') </script>";

echo "<script>window.open('$pro_url','_self')</script>";

}

}

}

}

?>

  <!-- Bootstrap and Custom Scripts -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Add your custom scripts or additional JS files here -->
</body>

</html>
<?php } ?>



