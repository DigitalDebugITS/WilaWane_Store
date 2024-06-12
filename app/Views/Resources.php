<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resources Section</title>
    <link rel="stylesheet" href="<?= base_url('styles.css') ?>">
    <link href="<?= base_url('assets/css/resources.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/variables.css') ?>" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/buffalo-3?styles=153173" rel="stylesheet">
    <meta name="google-site-verification" content="cDfJfyMoMfDpe1OV3qpw_r3BxfH9bN4XsPq63Y1sLHc" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="<?= base_url('assets/img/favicon.png') ?>" rel="icon">
    <link href="<?= base_url('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">
    <link href="https://fonts.cdnfonts.com/css/buffalo-3?styles=153173" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/variables.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet">
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
            color: #fc32c3;
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
        <a href="<?= base_url('/') ?>" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <img src="<?= base_url('assets/img/wila_wane.png') ?>" alt="">
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="<?= base_url('/') ?>">Home</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('/index.html#about') ?>">About</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('/index.html#products') ?>">Products</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('/index.html#faq') ?>">Faq</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('/index.html#team') ?>">Team</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('/index.html#blog') ?>">Blog</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('/index.html#contact') ?>">Contact</a></li>
                <li><a class="nav-link" href="<?= base_url('/shop') ?>">Shop</a></li>
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
            <?php foreach ($categories as $category): ?>
                <option value="<?= htmlspecialchars($category['category']); ?>" <?= ($selectedCategory == $category['category']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['category']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <!-- Resources Section -->
    <div class="resources-section">
        <?php if (!empty($resources)): ?>
            <?php foreach ($resources as $resource): ?>
                <div class="resource-item">
                    <img src="<?= base_url('admin/product_images/' . htmlspecialchars($resource['image'])) ?>" alt="<?= htmlspecialchars($resource['title']) ?>">
                    <h2><?= htmlspecialchars($resource['title']) ?></h2>
                    <p class="description" id="desc-<?= $resource['id'] ?>"><?= htmlspecialchars($resource['description']) ?></p>
                    <a href="<?= htmlspecialchars($resource['url']) ?>" class="url-button" target="_blank">View</a>
                    <?php if (strlen($resource['description']) > 100): ?>
                        <span class="see-more" onclick="toggleDescription('desc-<?= $resource['id'] ?>', this)">See more</span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No resources available.</p>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="<?= base_url('/resources?page=' . $i . ($selectedCategory ? '&category=' . urlencode($selectedCategory) : '')) ?>" <?= ($currentPage == $i) ? 'class="active"' : '' ?>><?= $i ?></a>
        <?php endfor; ?>
    </div>

    <!-- Footer -->
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
    </footer>

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
