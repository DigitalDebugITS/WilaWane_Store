
<?php
session_start();
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
        header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000; 
}

        #content {
          padding-top: 120px;
            display: flex;
            justify-content: space-between;
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

           header {
            background-color: #fff; 
            padding: 15px 0; 
          }
          .navbar {
            background-color: #fff;; 
          }

          .btn:hover {
                background-color: #ffcccb; 
                color: #000;
                transition: background-color 0.3s ease, color 0.3s ease; 
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
        <div class="container">
            <div class="row">
                <div class="col-md-9" id="cart">
                    <div class="box">
                        <form action="cart.php" method="post" enctype="multipart-form-data">
                            <h1>Shopping Cart</h1>
                            <?php
                            $ip_add = getRealUserIp();
                            $select_cart = "select * from cart where ip_add='$ip_add'";
                            $run_cart = mysqli_query($con, $select_cart);
                            $count = mysqli_num_rows($run_cart);
                            ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th colspan="1">Delete</th>
                                            <th colspan="2">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        while ($row_cart = mysqli_fetch_array($run_cart)) {
                                            $pro_id = $row_cart['p_id'];
                                            $pro_size = $row_cart['size'];
                                            $pro_qty = $row_cart['qty'];
                                            $only_price = $row_cart['p_price'];
                                            $get_products = "select * from products where product_id='$pro_id'";
                                            $run_products = mysqli_query($con, $get_products);
                                            while ($row_products = mysqli_fetch_array($run_products)) {
                                                $product_title = $row_products['product_title'];
                                                $product_img1 = $row_products['product_img1'];
                                                $sub_total = $only_price * $pro_qty;
                                                $_SESSION['pro_qty'] = $pro_qty;
                                                $total += $sub_total;
                                        ?>
                                                <tr>
                                                    <td><img src="admin_area/product_images/<?php echo $product_img1; ?>" alt=""></td>
                                                    <td><a href="#"><?php echo $product_title; ?></a></td>
                                                    <td><input type="text" name="quantity" value="<?php echo $_SESSION['pro_qty']; ?>" data-product_id="<?php echo $pro_id; ?>" class="quantity form-control"></td>
                                                    <td>K<?php echo $only_price; ?>.00</td>
                                          
                                                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                                                    <td>K<?php echo $sub_total; ?>.00</td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">K<?php echo $total; ?>.00</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="box-footer">                        
                                <div class="pull-right">
                                    <button class="btn" type="submit" name="update" value="Update Cart" style="background-color:#F62AA0; color:white;"> Update Cart <i class="bi bi-cart-check"></i></button>
                                    <a href="e_shop.php" class="btn " style="background-color:#F62AA0; color:white;"> Continue Shopping  <i class="bi bi-shop"></i></a>
                                    <a href="checkout.php" class="btn"  style="background-color:#f9d030; color:black;">Checkout <i class="bi bi-credit-card-2-front"></i></a>
                                    

                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                    if (isset($_POST['apply_coupon'])) {
                        $code = $_POST['code'];
                        if ($code != "") {
                            $get_coupons = "select * from coupons where coupon_code='$code'";
                            $run_coupons = mysqli_query($con, $get_coupons);
                            $check_coupons = mysqli_num_rows($run_coupons);
                            if ($check_coupons == 1) {
                                $row_coupons = mysqli_fetch_array($run_coupons);
                                $coupon_pro = $row_coupons['product_id'];
                                $coupon_price = $row_coupons['coupon_price'];
                                $coupon_limit = $row_coupons['coupon_limit'];
                                $coupon_used = $row_coupons['coupon_used'];
                                if ($coupon_limit != $coupon_used) {
                                    $get_cart = "select * from cart where p_id='$coupon_pro' AND ip_add='$ip_add'";
                                    $run_cart = mysqli_query($con, $get_cart);
                                    $check_cart = mysqli_num_rows($run_cart);
                                    if ($check_cart == 1) {
                                        $add_used = "update coupons set coupon_used=coupon_used+1 where coupon_code='$code'";
                                        $run_used = mysqli_query($con, $add_used);
                                        $update_cart = "update cart set p_price='$coupon_price' where p_id='$coupon_pro' AND ip_add='$ip_add'";
                                        $run_update = mysqli_query($con, $update_cart);
                                        echo "<script>alert('Your Coupon Code Has Been Applied')</script>";
                                        echo "<script>window.open('cart.php','_self')</script>";
                                    } else {
                                        echo "<script>alert('Product Does Not Exist In Cart')</script>";
                                    }
                                } else {
                                    echo "<script>alert('Your Coupon Code Has Been Expired')</script>";
                                }
                            } else {
                                echo "<script>alert('Your Coupon Code Is Not Valid')</script>";
                            }
                        }
                    }
                    ?>
                    <?php
                    function update_cart()
                    {
                        global $con;
                        if (isset($_POST['update'])) {
                            foreach ($_POST['remove'] as $remove_id) {
                                $delete_product = "delete from cart where p_id='$remove_id'";
                                $run_delete = mysqli_query($con, $delete_product);
                                if ($run_delete) {
                                    echo "<script>window.open('cart.php','_self')</script>";
                                }
                            }
                        }
                    }
                    echo @$up_cart = update_cart();
                    ?>
                </div>
                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h4>Order Summary</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order Subtotal</td>
                                        <th>K<?php echo $total; ?>.00</th>
                                    </tr>
                                    <!-- <tr>
                                        <td>Shipping and handling</td>
                                        <th>K0.00</th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>K0.00</th>
                                    </tr> -->
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>K<?php echo $total; ?>.00</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
  

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('keyup', '.quantity', function () {
            var id = $(this).data("product_id");
            var quantity = $(this).val();
            if (quantity != '') {
                $.ajax({
                    url: "change.php",
                    method: "POST",
                    data: {
                        id: id,
                        quantity: quantity
                    },
                    success: function (data) {
                        // Update the content of the #cart container
                        $('#cart').html(data);
                    }
                });
            }
        });
    });
</script>


</body>

</html>
