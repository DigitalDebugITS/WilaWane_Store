<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Include database connection
include("includes/db.php");

// Check if c_id and invoice_no are set in the URL
if (isset($_GET['c_id']) && isset($_GET['invoice_no'])) {
    $customer_id = $_GET['c_id'];
    $invoice_no = $_GET['invoice_no'];

    // Fetch customer email based on customer_id
    $get_customer_email = "SELECT customer_email FROM customers WHERE customer_id = '$customer_id'";
    $run_customer_email = mysqli_query($con, $get_customer_email);

    if ($row_customer_email = mysqli_fetch_array($run_customer_email)) {
        $user_email = $row_customer_email['customer_email'];

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        // Use Gmail with SMTP
        $mail->isSMTP();

        // Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';

        // Set the SMTP port number - 587 for TLS, 465 for SSL
        $mail->Port = 465;

        // Enable TLS encryption
        $mail->SMTPSecure = 'ssl';

        // Enable SMTP authentication
        $mail->SMTPAuth = true;

        // Your Gmail username (your full Gmail email address)
        $mail->Username = 'besaemmanuel99@gmail.com';

        // Your Gmail password or App Password
        $mail->Password = 'uzlj bakf ufhd nanx';

        // Set the 'From' email address
        $mail->setFrom('besaemmanuel99@gmail.com', 'Besa');

        // Add a recipient using the user's email
        $mail->addAddress($user_email, 'Customer Email');

        // Email subject
        $mail->Subject = 'Order Confirmation';

 // Fetch order details for a specific customer from pending_orders and customer_orders tables
$get_order_details = "
SELECT po.qty, co.due_amount, co.invoice_no, p.product_title
FROM pending_orders po
JOIN customer_orders co ON po.invoice_no = co.invoice_no
JOIN products p ON po.product_id = p.product_id
WHERE co.customer_id = '$customer_id'
AND co.invoice_no = '$invoice_no'
";

$run_order_details = mysqli_query($con, $get_order_details);

// Initialize an empty array to store order items
$cart_items = [];

// Loop through the order details and store them in $cart_items array
while ($row_order_details = mysqli_fetch_array($run_order_details)) {
$order_item = [
    'product_title' => $row_order_details['product_title'],
    'quantity' => $row_order_details['qty'],
    'price' => $row_order_details['due_amount'],
    'invoice_no' => $row_order_details['invoice_no']
];

$cart_items[] = $order_item;
}

// Now, you can use the $cart_items array to build the order details string
$order_details = '';
foreach ($cart_items as $item) {
$order_details .= "Product: {$item['product_title']}, Quantity: {$item['quantity']},  Price: {$item['price']}, Invoice No: {$item['invoice_no']} \n";
}

// Use $order_details as needed (e.g., display it on the web page, send it in an email, etc.)
$mail->Body = "Thank you for your order!\n\nOrder Details:\n$order_details";


        // Send the email
        if ($mail->send()) {
            echo 'Email sent successfully.';
            
            // Output invoice number from URL
            echo "Invoice Number from URL: " . $_GET['invoice_no'];

            // Output invoice number from the database query
            echo "Invoice Number from Database: " . $invoice_no;
        } else {
            echo 'Email could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    } else {
        echo 'Customer email not found.';
    }
} else {
    echo 'Customer ID or invoice number not provided.';
}
?>
