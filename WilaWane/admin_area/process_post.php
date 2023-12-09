<?php
// Include your database connection file
include("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];

    // Insert data into the database
    $insertQuery = "INSERT INTO posts (title,author, content,image) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $insertQuery);
    mysqli_stmt_bind_param($stmt, "ssss", $title, $content);

    if (mysqli_stmt_execute($stmt)) {
        // Data inserted successfully
        echo "Post created successfully!";
    } else {
        // Insertion failed
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
