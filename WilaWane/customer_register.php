<?php

session_start();

include("includes/db.php");
// include("includes/header.php");
include("functions/functions.php");
// include("includes/main.php");


?>
  
<!doctype html>
<html lang="en">
  <head>
    
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Sign up</title>
<!--Libraries-->
 <!--main css-->
 <link rel="stylesheet" href="styles/Loginform.css">
 <!--Aos for animation-->
 <link  rel="shortcut icon" href="Logo.png"
    />
 <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!--Icons-->  
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<!--Google fonts-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=ADLaM+Display&family=Poppins:wght@300;400;500;600;250;800;900&family=Red+Hat+Display:wght@300;400&family=Roboto&family=Satisfy&display=swap" rel="stylesheet">
  

<!--Google recaptcha-->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
  <body>
  <header>
  <a href="index.html">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img style="height:70px; width:70px;" src="assets/img/hero-carousel/Wila_Wane.svg" alt=""> 
       
      </a>
</header>


  <h1>Sign up Form</h1>
  <div class="d-flex justify-content-center">
  <form method="post" onsubmit="return validateForm();" id="login" enctype="multipart/form-data">
    <div class="container">
        <div class="col-50">
            <label for="Id">Name</label>
            <input type="text" class="form-control" name="c_name" required>

            <label for="PN">Phone Number</label>
            <input type="text" class="form-control" name="c_contact" required>

            <label for="email">Email</label>
            <input type="text" class="form-control" name="c_email" required>

            <div class="row">
                <div class="col-25">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="pass" name="c_pass" required>
                </div>

                <div class="col-25">
                    <label for="repeat password">Repeat Password</label>
                    <input type="password" class="form-control confirm" id="con_pass" required>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Customer City</label>
                    <input type="text" class="form-control" name="c_city" required>
                </div>

                <div class="col-25">
                    <label>Customer Address</label>
                    <input type="text" class="form-control" name="c_address" required>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Customer Country</label>
                    <input type="text" class="form-control" name="c_country" required>
                </div>
                <div>
                    <label>Profile Picture</label>
                    <input type="file" class="form-control" name="c_image" required>
                </div>
                </div>
                <div class="col-25">
                    <input style="font-size: 24px;" type="submit" name="register" value="Signup" class="btn" >
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<script>
function validateForm() {
    var password = document.getElementById("pass").value;
    var repeatPassword = document.getElementById("con_pass").value;

    if (password.trim() === "" || repeatPassword.trim() === "") {
        alert("Passwords cannot contain blank spaces.");
        return false;
    }

   
    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
    }

    if (password !== repeatPassword) {
        alert("Passwords do not match. Please make sure your passwords match.");
        return false;
    }

    var response = grecaptcha.getResponse();

if (response.length === 0) {
    alert("Please complete the reCAPTCHA.");
    return false; 
}


   return true; 
}
</script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
 </body>
</html>


<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

<?php
if (isset($_POST['register'])) {
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_ip = getRealUserIp();

    move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

    $get_email = "SELECT * FROM customers WHERE customer_email='$c_email'";
    $get_contact = "SELECT * FROM customers WHERE customer_contact='$c_contact'"; // New query for phone number
    $run_email = mysqli_query($con, $get_email);
    $run_contact = mysqli_query($con, $get_contact); // Execute the phone number query
    $check_email = mysqli_num_rows($run_email);
    $check_contact = mysqli_num_rows($run_contact); // Check the result for phone number

    if ($check_email > 0) {
        // Existing email, display an alert to inform the user
        echo "<script>alert('This email is already registered, please use another email.')</script>";
    } elseif ($check_contact > 0) {
        // Existing phone number, display an alert to inform the user
        echo "<script>alert('This phone number is already registered, please use another phone number.')</script>";
    } else {
        // Email and phone number don't exist, proceed with registration
        $customer_confirm_code = mt_rand();
        $subject = "Email Confirmation Message";
        $from = "ernestlubinda1@gmail.com";
        $message = "
        <h2>Email Confirmation By Computerfever.com $c_name</h2>
        <a href='localhost/ecom_store/customer/my_account.php?$customer_confirm_code'>Click Here To Confirm Email</a>";
        $headers = "From: $from \r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($c_email, $subject, $message, $headers);

        $insert_customer = "INSERT INTO customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip,customer_confirm_code) VALUES ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip','$customer_confirm_code')";
        
        $run_customer = mysqli_query($con, $insert_customer);

        $sel_cart = "SELECT * FROM cart WHERE ip_add='$c_ip'";
        $run_cart = mysqli_query($con, $sel_cart);
        $check_cart = mysqli_num_rows($run_cart);

        if ($check_cart > 0) {
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('You have been Registered Successfully')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        } else {
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('You have been Registered Successfully')</script>";
            echo "<script>window.open('customer/e_shop.php','_self')</script>";
        }
    }
} 
?>

