<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
include("includes/db.php");

// Set the number of resources per page
$resourcesPerPage = 6;

// Determine the current page number
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the starting resource index for the current page
$start = ($page - 1) * $resourcesPerPage;

// Fetch categories from the database
$categoryResult = $con->query("SELECT DISTINCT category FROM resources");
$categories = $categoryResult->fetch_all(MYSQLI_ASSOC);

// Fetch selected category
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : '';

// Fetch resources from the database with pagination and category filter
$sql = "SELECT id, title, price, description, url, image FROM resources";
if ($selectedCategory) {
    $sql .= " WHERE category = '" . $con->real_escape_string($selectedCategory) . "'";
}
$sql .= " LIMIT $start, $resourcesPerPage";
$result = $con->query($sql);

// Fetch total number of resources
$totalResourcesQuery = "SELECT COUNT(*) as total FROM resources";
if ($selectedCategory) {
    $totalResourcesQuery .= " WHERE category = '" . $con->real_escape_string($selectedCategory) . "'";
}
$totalResources = $con->query($totalResourcesQuery)->fetch_assoc()['total'];

// Calculate total number of pages
$totalPages = ceil($totalResources / $resourcesPerPage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resources Section</title>
    <link rel="stylesheet" href="styles.css">
    <link href="assets/css/resources.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/variables.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/buffalo-3?styles=153173" rel="stylesheet">
    
    <style>
        .resources-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .resource-item {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            height: 400px;
            overflow: hidden;
            position: relative;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .resource-item:hover {
            transform: translateY(-10px);
        }
        .resource-item img {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }
        .description {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            margin-bottom: 10px;
        }
        .description.expanded {
            overflow: visible;
            display: block;
        }
        .see-more {
            cursor: pointer;
            color: blue;
            position: absolute;
            bottom: 20px;
            left: 20px;
        }
        .url-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #fc32c3;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
        .price {
            color: #f56b2a;
            font-weight: bold;
            font-size: 1.2em;
            text-align: left;
        }
        h2 {
            color: #2c3e50;
            text-align: left;
        }
        header {
            background-image: url('images/banner.jpg');
            background-size: cover;
            background-position: center;
            color: ##fc32c3;
            padding: 0px;
            text-align: center;
            margin-bottom: 40px;
        }
        .banner-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 100px;
        }
        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            background-color: white;
            color: #fc32c3;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        .header-container .logo img {
            height: 50px;
        }
        .header-container nav {
            display: flex;
        }
        .header-container nav ul {
            display: flex;
            list-style: none;
        }
        .header-container nav ul li {
            margin: 0 10px;
        }
        .header-container nav ul li a {
            color: #fc32c3;
            text-decoration: none;
            padding: 10px 15px;
        }
        .header-container nav ul li a:hover {
            background-color: white;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .pagination a {
            padding: 10px 15px;
            margin: 0 5px;
            background-color: #f2f2f2;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .pagination a:hover, .pagination a.active {
            background-color: #fc32c3;
            color: white;
        }
    </style>
</head>
<body>
    <div class="header-container">
        <a href="index.php" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <img src="assets/img/wila_wane.png" alt="">
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <!-- <li><a class="nav-link scrollto" href="#">Home</a></li> -->
                <!-- <li><a class="nav-link scrollto" href="index.html#about">About</a></li> -->
                <!-- <li><a class="nav-link scrollto" href="index.html#products">Products</a></li> -->
                <!-- <li><a class="nav-link scrollto" href="index.html#faq">Faq</a></li> -->
                <!-- <li><a class="nav-link scrollto" href="index.html#team">Team</a></li> -->
                <!-- <li><a class="nav-link scrollto" href="index.html#blog">Blog</a></li> -->
                <!-- <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li> -->
                <!-- <li><a class="nav-link" href="">Shop</a></li> -->
            </ul>
        </nav>
       
    </div>

    <header>
        <div class="banner-overlay">
            <h1>Welcome to our Resources Section</h1>
        </div>
    </header>
    <h1 style="font-family: 'Buffalo', sans-serif; color: #F62AA0; font-size: 60px;">Resources</h1>

    <!-- Category Filter Form -->
    <form method="GET" action="">
    <label for="category">Filter by Category:</label>
    <select name="category" id="category" onchange="this.form.submit()">
        <option value="">All</option>
        <?php 
        $uniqueCategories = array_unique(array_column($categories, 'category'));
        foreach ($uniqueCategories as $category): ?>
            <option value="<?php echo htmlspecialchars($category); ?>" <?php if ($selectedCategory == $category) echo 'selected'; ?>>
                <?php echo htmlspecialchars($category); ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>


    <!-- Resources Section -->
    <div class="resources-section">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="resource-item">
                    <img src="admin/product_images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                    <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                    <p class="description" id="desc-<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['description']); ?></p>
                    <a href="<?php echo htmlspecialchars($row['url']); ?>" class="url-button" target="_blank">View</a>
                    <?php if (strlen($row['description']) > 100): ?>
                        <span class="see-more" onclick="toggleDescription('desc-<?php echo $row['id']; ?>', this)">See more</span>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No resources available.</p>
        <?php endif; ?>
        <?php $con->close(); ?>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?><?php if ($selectedCategory) echo '&category=' . urlencode($selectedCategory); ?>" <?php if ($page == $i) echo 'class="active"'; ?>><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
    
   <!--======= Footer ======= -->
  <footer id="footer" class="footer">

   
<div class="footer-legal text-center">
  <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

    <div class="d-flex flex-column align-items-center align-items-lg-start">
      <div class="copyright">
        &copy; Copyright <strong><span>WilaWane</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="  ">Digital Debug IT Solutions</a>
      </div>
    </div>

    <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
      <a href="https://m.facebook.com/pages/Wila-Wane-Store/106955238955872/?locale=hi_IN" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="https://www.instagram.com/wilawane_store" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="https://l.instagram.com/?u=https%3A%2F%2Fwa.me%2F260975520847&e=AT29F0ZTN12zGL0_5jvEVaggF0EcbLbAbmH3NIbXHDlJXls5Xu9Hom-MJGSgM7ee-PH45Rshp_wnabKY3nhO9jTgZkZQT5abRtlxGw" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
    </div>

  </div>
</div>
</div>
</footer><!-- End Footer -->
    
    <script>
        function toggleDescription(id, button) {
            const description = document.getElementById(id);
            if (description.classList.contains('expanded')) {
                description.classList.remove('expanded');
                button.textContent = 'See more';
            } else {
                description.classList.add('expanded');
                button.textContent = 'See less';
            }
        }
    </script>
</body>
</html>
        