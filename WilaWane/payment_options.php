<div class="box"><!-- box Starts -->

<?php

$invoice_no = mt_rand();

$session_email = $_SESSION['customer_email'];

$select_customer = "select * from customers where customer_email='$session_email'";

$run_customer = mysqli_query($con,$select_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

if (isset($_GET['invoice_no'])) {
  $invoice_no = $_GET['invoice_no'];

  // Now you can use $invoice_number as needed
  
}
?>

<h1 class="text-center">Payment Options For You</h1>
<p class="lead text-center">
    <a href="order.php?c_id=<?php echo $customer_id; ?>&invoice_no=<?php echo $invoice_no; ?>&sendmail=true">Pay Offline</a>
</p>


<center><!-- center Starts -->

 


<?php

$i = 0;

