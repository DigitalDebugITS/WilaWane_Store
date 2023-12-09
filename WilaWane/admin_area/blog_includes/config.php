<?php 
        session_start();
        // connect to database
        $con = mysqli_connect("localhost", "root", "", "royal_teletherapy");

        if (!$con) {
                die("Error connecting to database: " . mysqli_connect_error());
        }
    // define global constants
        define ('ROOT_PATH', realpath(dirname(__FILE__)));
        define('BASE_URL', 'http://localhost/royal_teletherapy/');

        if (!isset($_SESSION['email'])) {
                // Redirect to the login page if the user is not logged in
                header("Location: signin.php");
                exit();
            }
?>