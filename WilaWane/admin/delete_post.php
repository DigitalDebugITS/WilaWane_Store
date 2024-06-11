<?php
include("includes/db.php");
if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Create an SQL query to delete the post
    $deleteQuery = "DELETE FROM blog WHERE id = $postId";

    if ($con->query($deleteQuery) === TRUE) {
        
        echo "Post deleted successfully!";
        exit; 
    } else {
        // Error occurred while deleting the post
        echo "Error: " . $con->error;
    }
}

$con->close();
?>
