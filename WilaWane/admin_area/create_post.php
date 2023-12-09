<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

// Include your database connection file here
include("includes/db.php");

// Fetch the author's name from the admins table
$authorEmail = $_SESSION['admin_email']; 

$admin_nameQuery = "SELECT admin_name FROM admins WHERE admin_email = '$authorEmail'";
$admin_nameResult = mysqli_query($con, $admin_nameQuery);


if ($admin_nameResult) {
    // Fetch the admin_name
    $useradmin_name = mysqli_fetch_assoc($admin_nameResult)['admin_name'];
} else {
    // Handle the error, you might want to log it or display an error message
    echo "Error fetching admin_name: " . mysqli_error($con);
    // You should handle the error more gracefully in a production environment
    die();
}

// Assuming you have the therapist's email in the session
$query = "SELECT admin_name FROM admins WHERE admin_email = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $authorEmail);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_bind_result($stmt, $authorName);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
} else {
    $authorName = "Unknown Author"; // Set a default value in case of an error
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission

    // Process other form data
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name']; // Get the uploaded image file name
    $author = $authorName; // Use the fetched author's name

    // Upload image file to the first directory
    $uploads_dir1 = 'C:\xampp1\htdocs\WilaWane_STORE\WilaWane\admin_area\images';
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "$uploads_dir1/$image");


    // Insert data into the posts table
    $insertQuery = "INSERT INTO blog (title, content, image, author) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $insertQuery);
    mysqli_stmt_bind_param($stmt, "ssss", $title, $content, $image, $author);

    if (mysqli_stmt_execute($stmt)) {
        // Insertion was successful
        echo "Post created successfully!";
    } else {
        // Insertion failed
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
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
    <title>Post on the blog</title>
</head>


<body>
 
                                    <div class="easion-card-title"> Create Post </div>
                                </div>
                                <div class="card-body ">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" readonly value="<?php echo $authorName; ?>">
            </div>
            <button type="submit" class="btn" style="background:#F62AA0; color: white" >Post</button>
            
        </form>
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