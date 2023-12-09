<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <title>Wila Wane Store</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.cdnfonts.com/css/buffalo-3?styles=153173" rel="stylesheet">
                
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="assets/css/variables.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

<style>
  em{}
</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/hero-carousel/Wila_Wane.svg" alt=""> 
       
      </a>

      <nav id="navbar" class="navbar">
        <ul>


           
            <li><a class="nav-link scrollto" href="#">Home</a></li>
          <li><a class="nav-link scrollto" href="index.html#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.html#services">Services</a></li>
          <li><a class="nav-link scrollto" href="index.html#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="index.html#team">Team</a></li>
           <!-- <li><a href="blog.html">Blog</a></li> -->
          <li><a class="nav-link scrollto" href="index.html#features">Values</a></li>
          <li><a class="nav-link scrollto" href="index.html#faq">FAQ</a></li>
          
          <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li>
          <li><a class="nav-link " href="e_shop.php">Shop</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->

      <a class="btn-getstarted scrollto" href="e_shop.php">SHOP NOW</a>


    </div>
  </header>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog Details</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li>Blog Details</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <section id="blog" class="blog">
<div class="container" data-aos="fade-up">
    <div class="row g-5">
        <div class="col-lg-8">

<?php

include("includes/db.php");

// Assuming you have a 'blog' and 'comments' tables in your database
$postId = $_GET['id'];
$sql = "SELECT * FROM blog WHERE id = $postId";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $blogDetails = $result->fetch_assoc();
    ?>
    <article class="blog-details">
        <div class="post-img">
        <div class="post-img"><img src="admin_area/images/<?php echo $blogDetails['image']; ?>" class="img-fluid" alt="No Image added"></div>
        </div>

        <h2 class="Title"><?php echo $blogDetails['Title']; ?></h2>

        <div class="meta-top">
            <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"><?php echo $blogDetails['author']; ?></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="<?php echo $blogDetails['date']; ?>"><?php echo date('Y-m-d H:i', strtotime($blogDetails['date'])); ?></time></a></li>
                <!-- Add code to count and display the number of comments -->
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">12 Comments</a></li>
            </ul>
        </div><!-- End meta top -->

        <div class="Contents">
            <?php echo $blogDetails['Content']; ?>
        </div><!-- End post Contents -->

        <!-- Comments Section -->
        <div class="comments">

            <h4 class="comments-count">Comments</h4>

            <?php
            // Fetch comments for the blog post
            $sqlComments = "SELECT * FROM comments WHERE id = $postId";
            $resultComments = $con->query($sqlComments);

            if ($resultComments->num_rows > 0) {
                while ($comment = $resultComments->fetch_assoc()) {
                    ?>
                    <div class="comment">
                        <div class="d-flex">
                            <!-- Display user avatar or use a placeholder -->
                            <div class="comment-img"><img src="assets/img/blog/user-avatar.jpg" alt=""></div>
                            <div>
                                <h5><a href="#"><?php echo $comment['user_name']; ?></a></h5>
                                <time datetime="<?php echo $comment['comment_date']; ?>"><?php echo $comment['comment_date']; ?></time>
                                <p><?php echo $comment['comment_text']; ?></p>
                            </div>
                        </div>
                    </div><!-- End comment -->
                    <?php
                }
            } else {
                echo "<p>No comments yet.</p>";
            }
            ?>
        </div><!-- End comments -->
    </article><!-- End blog post -->

    <?php
} else {
    echo "<p>Blog post not found.</p>";
}

// Close the database connection
$con->close();
?>
  </main><!-- End #main -->

<!-- ======= Footer ======= -->
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
</footer>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>