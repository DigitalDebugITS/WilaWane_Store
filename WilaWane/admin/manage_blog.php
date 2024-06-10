<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

// Fetch the author's name from the users_therapist table
// Include your database connection file here
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
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="js/chart-js-config.js"></script>
    <title>Manage the blog</title>
    <style>
    </style>
</head>
<body>
   
            <main class="dash-content">
            <div class="container-fluid">
            <div class="card-body ">
                    <div class="text-right mb-3">
                <h1 class="text-center" style="font-size: 37px;">Manage Posts</h1>
                <?php
                include("includes/db.php");


                $sql = "SELECT id, title, date, Author, likes FROM blog";

                $result = $con->query($sql);

                if ($result && $result->num_rows > 0) {
                    echo '    <div class="card easion-card">';
                    echo '         <div class="card-header">';
                    echo '             <div class="easion-card-icon">';
                    echo '                </div>';
                    echo '          </div>';
                    echo '           <div class="card-body ">';
                    echo '                <table class="table table-hover table-in-card">';
                    echo '<table class="table table-bordered table-striped">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>Title</th>';
                    echo '<th>Posted On</th>';
                    echo '<th>Author</th>';
                    echo '<th>Likes</th>';
                    echo '<th>Action</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['title'] . '</td>';
                        echo '<td>' . date("F j, Y", strtotime($row["date"])) . '</td>';
                        echo '<td>' . $row['Author'] . '</td>';
                        echo '<td>' . $row['likes'] . '</td>';
                        echo '<td><a href="posts.php?id=' . $row['id'] . '" style="background:#F62AA0; color: white; border-radius:5px;" class="btn btn-primary">View</a>';
                        echo ' <a href="delete_post.php?id=' . $row['id'] . '" style="background:#F62AA0; color: white; border-radius:5px;" class="btn btn-primary">Delete</a></td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '<p>No posts available.</p>';
                }

                $con->close();
                ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script src="../js/easion.js"></script>
        </body>
        </html>