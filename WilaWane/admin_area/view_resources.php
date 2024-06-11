<?php
// Include the database connection file
include("includes/db.php");

// Fetch resources from the database
$sql = "SELECT id, title, price, description, image FROM resources";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Resources</title>
    <link href="css/resources.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .button {
            display: inline-block;
            padding: 5px 10px;
            margin: 2px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #45a049;
        }

        .icon-button {
            color:  #fc32c3;
            margin: 0 5px;
            font-size: 1.2em;
        }

        .icon-button:hover {
            color: #45a049;
        }

        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resources</h1>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <!-- <th>URL</th> -->
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                        // echo "<td><a href='" . htmlspecialchars($row['url']) . "' target='_blank'>View</a></td>";
                        echo "<td><img src='product_images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['title']) . "'></td>";
                        echo "<td>
                                <a href='edit_resource.php?id=" . $row['id'] . "' class='icon-button' title='Edit'><i class='fas fa-pencil-alt'></i></a>
                                <a href='delete_resource.php?id=" . $row['id'] . "' class='icon-button' title='Delete' onclick='return confirm(\"Are you sure you want to delete this resource?\");'><i class='fas fa-trash-alt'></i></a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No resources found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$con->close();
?>
