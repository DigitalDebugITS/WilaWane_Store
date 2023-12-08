<!doctype html>
<html lang="en">
<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">

    <title> Sign in </title>

    <link rel="stylesheet" href="styles/Loginform.css">
    <!-- Aos for animation -->
    <link  rel="shortcut icon" href="Logo.png"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Google fonts -->
    <link rel="preconect" href="https://fonts.googleapis.com">
    <link rel="preconect" href="https://fonts.gstatic.com" crossorigin>
    <link
            href="https://fonts.googleapis.com/css2?family=ADLaM+Display&family=Poppins:wght@300;400;500;600;700;800;900&family=Red+Hat+Display:wght@300;400&family=Roboto&family=Satisfy&display=swap"
            rel="stylesheet">
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>

 </head>
<body>
<header>
<a href="index.html">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img style="height:70px; width:70px;" src="assets/img/hero-carousel/Wila_Wane.svg" alt=""> 
       
      </a>
</header>
<h1>Login</h1>
<div class="d-flex justify-content-center">
    <form action="../checkout.php" method="post" id="login" onsubmit="return submitForm();">
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <div class="col-50">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="c_email" required >
                        <div class="col-50">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="c_pass" id="pass" required >
                            <label for="showPassword">
                                <span id="showPasswordIcon" class="ri-eye-line"></span> 
                                Show Password <br>
                            </label>
                        </div>
                <div>
                <input style="font-size: 24px;" type="submit" name="login" value="Login" class="btn btn-primary" onclick="submitForm()">  </div>
            <div>        
            <!-- <div class="g-recaptcha" data-sitekey="6LfC9wkpAAAAAB8i9IK4WuiQWPsNsQa1lFhMOqsr" ata-callback="submitForm"></div> -->

        <a href="forgot_pass.php">  Forgot Password?</a>
        </div>
        </div>
        </div>
        </div>
    </form>
</div>
<script>

    document.getElementById('showPasswordIcon').addEventListener('click', function () {
        var passwordInput = document.getElementById('pass');
        var showPasswordIcon = document.querySelector('#showPasswordIcon .ri-eye-line');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            showPasswordIcon.classList.remove('ri-eye-line'); 
            showPasswordIcon.classList.add('ri-eye-off-line'); 
        } else {
            passwordInput.type = 'password';
            showPasswordIcon.classList.remove('ri-eye-off-line');
            showPasswordIcon.classList.add('ri-eye-line'); 
        }
    });
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

 <script>
function submitForm() {
  
    var response = grecaptcha.getResponse();

    if (response.length === 0) {
        alert("Please complete the reCAPTCHA.");
        return false; 
    }

  
    return true; 
}

</script>

</body>
</html>


<?php

if(isset($_POST['login'])){

$customer_email = $_POST['c_email'];

$customer_pass = $_POST['c_pass'];

$select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

$run_customer = mysqli_query($con,$select_customer);

$get_ip = getRealUserIp();

$check_customer = mysqli_num_rows($run_customer);

$select_cart = "select * from cart where ip_add='$get_ip'";

$run_cart = mysqli_query($con,$select_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_customer==0){

echo "<script>alert('password or email is wrong')</script>";

exit();

}

if($check_customer==1 AND $check_cart==0){

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

}
else {

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('checkout.php','_self')</script>";

} 


}

?>



