<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

// Fetch the author's name from the users_therapist table
include("includes/db.php");

// Fetch the author's name from the admins table
$authorEmail = $_SESSION['admin_email']; 


$admin_nameQuery = "SELECT admin_name FROM admins WHERE admin_email = '$authorEmail'";
$admin_nameResult = mysqli_query($con, $admin_nameQuery);


if ($admin_nameResult) {
    // Fetch the Full_name
    $userFull_name = mysqli_fetch_assoc($admin_nameResult)['admin_name'];
} else {
    // Handle the error, you might want to log it or display an error message
    echo "Error fetching Full_name: " . mysqli_error($con);
    // You should handle the error more gracefully in a production environment
    die();
}

// Check if a post has been liked
if (isset($_POST['id'])) {
    $postId = $_POST['id'];

    // Update the likes count in the database for the specific post
    $likeQuery = "UPDATE blog SET likes = likes + 1 WHERE id = $postId";
    $con->query($likeQuery);

    // Retrieve the updated likes count and return it as the response
    $likesQuery = "SELECT likes FROM blog WHERE id = $postId";
    $likesResult = $con->query($likesQuery);

    if ($likesResult && $likesRow = $likesResult->fetch_assoc()) {
        echo $likesRow['likes'];
    }
}

$sql = "SELECT id, title, content, image, created_at, Author, likes FROM blog ORDER BY created_at DESC";

// Execute the query
$result = $con->query($sql);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/easion.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="js/chart-js-config.js"></script>
    <title>Post on the blog</title>
</head>


<body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="index.html" style="font-size: 27px; font-family: 'Satisfy', cursive; "><i class="fas fa-sun"></i> <span>Royal Teletherapy</span></a>
            </header>
            <nav class="dash-nav-list">
             <a href="../Dashboard.php" class="dash-nav-item"><i class="ri-dashboard-3-line"></i>   Dashboard</a>
                <a href="../Appointments.php" class="dash-nav-item"><i class="ri-calendar-2-line"></i>   Appointments</a>
                <a href="../teletherapy.html" class="dash-nav-item"><i class="ri-video-chat-line"></i>   Teletherapy</a>
                <a href="index.php" class="dash-nav-item"><i class="ri-article-fill"></i>   Blog</a>
                <a href="../records.php" class="dash-nav-item"><i class="ri-file-lock-line"></i> Patient Files</a>
                <a href="../logout.php" class="dash-nav-item"><i class="ri-logout-box-line"></i>   Logout</a>
            </ul> 
            </nav>
        </div>
        <div class="dash-app">
            <header class="dash-toolbar">
                <a href="#!" class="menu-toggle">
                <i class="ri-menu-line"></i>
                </a>
                <div class="tools">
                <a href="../notifications.php" class="tools-item">
            <i class="ri-notification-3-fill"></i>
            <i class="tools-item-count"><?php echo $notificationCount; ?></i>
                    </a>
                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ri-user-fill"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="../profile.php">Profile</a>
                            <a class="dropdown-item" href="../logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </header>
            <div class="text-right mb-3">
    <a href="index.php" class="btn " style="background: #459252; color: white;">Back</a>
</div>
            <main class="dash-content">
            <div class="container-fluid">
    <h1 class="text-center" style="font-size: 37px; font-family: 'Satisfy', cursive;">Royal Teletherapy Blog</h1>

    <?php
    // Loop through the database results and display each blog post
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card mb-4">';
        echo '<img src="images/' . $row['image'] . '" class="card-img-top" alt="No Image added">';
        echo '<div class="card-body">';
        echo '<h2 class="card-title">' . $row['title'] . '</h2>';
        echo '<p class="card-text">' . $row['body'] . '</p>';
        echo '<p class="card-text">Posted by ' . $row['Author'] . '</p>';
        echo '<p class="card-text"> ' .  date("F j, Y", strtotime($row["created_at"])) . '</p>';
        echo '<p class="card-text"><a href="javascript:void(0);" class="like-button" data-post-id="' . $row['id'] . '"><i class="ri-thumb-up-fill" style="color: green;"></i></a> <span class="likes-count">' . $row['likes'] .'</span></p>';
        echo '<p class="card-text"></p>';
        echo '</div>';
        echo '</div>';
    }
    

    // Close the database connection
    $con->close();
    ?>

</div>
<button class="scroll-to-top" onclick="scrollToTop()"><i class="ri-arrow-up-fill"></i></button>


<!-- Footer -->
<footer class=" text-center py-3" style="color: grey">
    &copy; Royal Teletherapy Blog
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Your custom JavaScript here -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../js/easion.js"></script>



<script>
// JavaScript function to scroll to the top of the page
function scrollToTop() {
    // Scroll to the top of the page with a smooth animation
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Show the scroll-to-top button when the user scrolls down
window.onscroll = function() {
    var scrollButton = document.querySelector('.scroll-to-top');
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollButton.style.display = 'block';
    } else {
        scrollButton.style.display = 'none';
    }
}

jQuery(document).ready(function() {
    jQuery('.like-button').click(function() {
        var postId = jQuery(this).data('post-id');
        var likesCountElement = jQuery(this).parent().find('.likes-count'); // Find the likes count element

        jQuery.ajax({
            type: 'POST',
            url: 'update_likes.php', // Create a separate PHP file for handling likes updates
            data: { post_id: postId },
            success: function(response) {
                // Update the likes count on the page without reloading
                var likesCount = parseInt(response);
                if (!isNaN(likesCount)) {
                    likesCountElement.text(likesCount); // Update the likes count within the same DOM element
                }
            }
        });
    });
});
</script>

</body>
</html>