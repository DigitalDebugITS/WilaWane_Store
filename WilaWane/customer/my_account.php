<?php
session_start();

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../checkout.php','_self')</script>";
} else {
    include("includes/db.php");
    include("../includes/header.php");
    include("includes/main.php");
?>

<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include("includes/sidebar.php"); ?>
            </div>

            <div class="col-md-9">
                <div class="box">
                    <?php
                    if (isset($_GET['my_orders'])) {
                        include("my_orders.php");
                    } elseif (isset($_GET['pay_offline'])) {
                        include("pay_offline.php");
                    } elseif (isset($_GET['edit_account'])) {
                        include("edit_account.php");
                    } elseif (isset($_GET['change_pass'])) {
                        include("change_pass.php");
                    } elseif (isset($_GET['delete_account'])) {
                        include("delete_account.php");
                    } elseif (isset($_GET['my_wishlist'])) {
                        include("my_wishlist.php");
                    } elseif (isset($_GET['delete_wishlist'])) {
                        include("delete_wishlist.php");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button to call sendmail.php -->
<form id="sendMailForm" action="../sendmail.php" method="get">
    <input type="hidden" name="c_id" value="<?php echo $customer_id; ?>">
    <input type="hidden" name="invoice_no" value="<?php echo $invoice_no; ?>">
    <button type="button" onclick="sendMail()">Send Email</button>
</form>



<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
}
?>

<script>
    function sendMail() {
        document.getElementById("sendMailForm").submit();
    }
</script>
