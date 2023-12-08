<?php
session_start();
include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>

<main>
    <div class="nero">
        <div class="nero__heading">
            <span class="nero__bold">SHOP</span> Cart
        </div>
        <p class="nero__text"></p>
    </div>
</main>

<div id="content">
    <div class="container">
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
                    <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart.</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Size</th>
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
                                            <td>$<?php echo $only_price; ?>.00</td>
                                            <td><?php echo $pro_size; ?></td>
                                            <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                                            <td>$<?php echo $sub_total; ?>.00</td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Total</th>
                                    <th colspan="2">$<?php echo $total; ?>.00</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="form-inline pull-right">
                        <div class="form-group">
                            <label>Coupon Code : </label>
                            <input type="text" name="code" class="form-control">
                        </div>
                        <input class="btn btn-primary" type="submit" name="apply_coupon" value="Apply Coupon Code">
                    </div>
                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="index.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue Shopping</a>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-info" type="submit" name="update" value="Update Cart"><i class="fa fa-refresh"></i> Update Cart</button>
                            <a href="checkout.php" class="btn btn-success">Proceed to Checkout <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function (data) {
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
                        $("body").load('cart_body.php');
                    }
                });
            }
        });
    });
</script>
</body>

</html>
