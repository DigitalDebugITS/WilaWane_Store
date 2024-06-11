<?php
// Include the database connection file
include("includes/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the image name to delete the file
    $stmt = $con->prepare("SELECT image FROM resources WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($image);
    $stmt->fetch();
    $stmt->close();

    // Delete the resource from the database
    $stmt = $con->prepare("DELETE FROM resources WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Delete the image file
        if (file_exists("product_images/" . $image)) {
            unlink("product_images/" . $image);
        }
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();

    header("Location: view_resources.php");
    exit();
} else {
    header("Location: view_resources.php");
    exit();
}
?>
