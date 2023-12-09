<?php
include("../connection.php");

if (isset($_POST['post_id'])) {
    $postId = $_POST['post_id'];

    // Update the likes count in the database for the specific post
    $likeQuery = "UPDATE posts SET likes = likes + 1 WHERE id = $postId";
    $con->query($likeQuery);

    // Retrieve the updated likes count and return it as the response
    $likesQuery = "SELECT likes FROM posts WHERE id = $postId";
    $likesResult = $con->query($likesQuery);

    if ($likesResult && $likesRow = $likesResult->fetch_assoc()) {
        echo $likesRow['likes'];
    }
}
?>
