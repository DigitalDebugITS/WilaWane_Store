<?php
// Include the database connection file
include("includes/db.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
    $imageName = $_POST['existing_image'];

    // Check if a new image is uploaded
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $uploadDir = 'product_images/';

        // Move the uploaded file to the desired directory
        move_uploaded_file($imageTmpPath, $uploadDir . $imageName);
    }

    // Update the resource in the database
    $stmt = $con->prepare("UPDATE resources SET title = ?, price = ?, description = ?, url = ?, image = ? WHERE id = ?");
    $stmt->bind_param("sdsssi", $title, $price, $description, $url, $imageName, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();

    header("Location: view_resources.php");
    exit();
}

// Fetch the existing resource data
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $con->prepare("SELECT title, price, description, url, image FROM resources WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($title, $price, $description, $url, $image);
    $stmt->fetch();
    $stmt->close();
} else {
    header("Location: view_resources.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resource</title>
    <link href="css/resources.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Edit Resource</h1>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($image); ?>">

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>

            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($description); ?></textarea>

            <label for="url">URL:</label>
            <input type="text" id="url" name="url" value="<?php echo htmlspecialchars($url); ?>" required>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            <img src="product_images/<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?>" width="100">

            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
