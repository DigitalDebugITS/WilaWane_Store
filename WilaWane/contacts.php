<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Include database connection
include("includes/db.php");
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'besaemmanuel99@gmail.com';
    $mail->Password   = 'uzlj bakf ufhd nanx'; // Ensure this is the correct app password or SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Use PHPMailer constants for clarity
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('1804685@northrise.net', 'Recipient Name');

    // Content
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = strip_tags($_POST['message']);
    $mail->AltBody = strip_tags($_POST['message']);

    $mail->send();
    echo 'Message has been sent. We will get back to you!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
