<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);

    // Check for file upload errors
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $uploadDir = 'product_images/';  // Ensure this directory exists

        // Ensure the uploads directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $imagePath = $uploadDir . $imageName;

        // Move the uploaded file to the desired directory
        if (move_uploaded_file($imageTmpPath, $imagePath)) {
            // Include the database connection file
            include("includes/db.php");

            // Prepare and bind
            $stmt = $con->prepare("INSERT INTO resources (title, price, description, url, image, category) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sdssss", $title, $price, $description, $url, $imageName, $category);

            // Execute the statement
            if ($stmt->execute()) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement and connection
            $stmt->close();
            $con->close();
        } else {
            echo "Error moving the uploaded file";
        }
    } else {
        echo "Error uploading the file";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Resource</title>
    <link href="css/resources.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Add Resource</h1>
        <form method="post" action="" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="price">Price:</label>
            <input type="text" id="price" name="price" required>

            <label for="description">Brief Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="url">URL:</label>
            <input type="text" id="url" name="url" required>

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="">Select Category</option>
                <option value="PDF">PDF</option>
                <option value="Video">Video</option>
                <option value="Podcast">Podcast</option>
                <option value="Docx">Docx</option>
            </select>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" required>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
