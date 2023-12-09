<?php
$customer_session = $_SESSION['customer_email'];
$get_customer = "SELECT * FROM customers WHERE customer_email='$customer_session'";
$run_customer = mysqli_query($con, $get_customer);
$row_customer = mysqli_fetch_array($run_customer);
$customer_id = $row_customer['customer_id'];

// Number of records per page
$recordsPerPage = 10;

// Get the current page number from the URL parameter
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset for the SQL query
$offset = ($currentPage - 1) * $recordsPerPage;

// Fetch orders with pagination
$get_orders = "SELECT * FROM customer_orders WHERE customer_id='$customer_id' ORDER BY order_date DESC LIMIT $offset, $recordsPerPage";
$run_orders = mysqli_query($con, $get_orders);

?>

<center><!-- center Starts -->
    <h1>My Orders</h1>
    <p class="lead"> Your orders in one place.</p>
    <p class="text-muted">
        If you have any questions, please feel free to <a href="../contact.php">contact us.</a> 
    </p>
</center><!-- center Ends -->

<hr>

<div class="table-responsive"><!-- table-responsive Starts -->
    <table class="table table-bordered table-hover"><!-- table table-bordered table-hover Starts -->
        <thead><!-- thead Starts -->
            <tr>
                <th>Date</th>
                <th>#</th>
                <th>Amount</th>
                <th>Invoice</th>
                <th>Qty</th>
               
                <th>Order Date</th>
            </tr>
        </thead><!-- thead Ends -->

        <tbody><!-- tbody Starts -->
            <?php
            $currentDate = null;
            while ($row_orders = mysqli_fetch_array($run_orders)) {
                $order_id = $row_orders['order_id'];
                $due_amount = $row_orders['due_amount'];
                $invoice_no = $row_orders['invoice_no'];
                $qty = $row_orders['qty'];
                $size = $row_orders['size'];
                $order_date = substr($row_orders['order_date'], 0, 11);
                $order_status = $row_orders['order_status'];

                // Display date as a heading when it changes
                if ($order_date !== $currentDate) {
                    echo "<tr class='date-heading'><td colspan='7'>$order_date</td></tr>";
                    $currentDate = $order_date;
                }

                $order_status_display = ($order_status == 'pending') ? "<b style='color:red;'>Unpaid</b>" : "<b style='color:green;'>Paid</b>";
            ?>
                <tr><!-- tr Starts -->
                    <td></td><!-- Empty cell for date heading -->
                    <th><?php echo $order_id; ?></th>
                    <td>$<?php echo $due_amount; ?></td>
                    <td><?php echo $invoice_no; ?></td>
                    <td><?php echo $qty; ?></td>
                    
                    <td><?php echo $order_date; ?></td>
                    <!-- Uncomment the lines below if needed -->
                    <!--
                    <td><?php echo $order_status_display; ?></td>
                    <td>
                        <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="blank" class="btn btn-success btn-xs"> Confirm If Paid </a>
                    </td>
                    -->
                </tr><!-- tr Ends -->
            <?php } ?>
        </tbody><!-- tbody Ends -->
    </table><!-- table table-bordered table-hover Ends -->

    <!-- Add pagination links -->
    <!-- <ul class="pagination">
        <?php
        $totalPages = ceil($i / $recordsPerPage);
        for ($page = 1; $page <= $totalPages; $page++) {
            echo "<li class='" . ($currentPage == $page ? 'active' : '') . "'><a href='my_account.php?my_orders&page=$page'>$page</a></li>";
        }
        ?>
    </ul> -->
</div><!-- table-responsive Ends -->
