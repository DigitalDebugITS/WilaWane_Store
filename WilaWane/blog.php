<?php
include("includes/db.php");

function getBlogPosts()
{
    global $con;

    $query = "SELECT * FROM blog ORDER BY date DESC "; 

    $result = mysqli_query($con, $query);

    $blogPosts = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $blogPosts[] = array(
            'id' => $row['id'],
            'image' => $row['image'],
            'date' => $row['date'],
            'author' => $row['author'],
            'title' => $row['Title'],
            'content' => $row['Content']
        );
    }

    return $blogPosts;
}

$blogPosts = getBlogPosts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog- Wila Wane</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  
  <style>
  em{}

@keyframes pulse {
  0% {
    opacity: 0.5;
  }
  50% {
    opacity: 1;
  }
  100% {
    opacity: 0.5;
  }
}

#heart-icon {
  animation: pulse 1.5s infinite;
}


</style>


</head>

<body>

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
 <meta name="description" content="Discover a wide range of Montessori wooden educational toys and books for children in Zambia. Explore our collection to support your child's creative learning journey.">

  <meta name="keywords" content="Montessori toys Zambia, educational toys Zambia, wooden toys, children's books Zambia, learning toys, Montessori learning">


   <!--Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

   <!--Google Fonts -->
  <link href="https://fonts.cdnfonts.com/css/buffalo-3?styles=153173" rel="stylesheet">
                
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!--Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

   <!--Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="assets/css/variables.css" rel="stylesheet">

   <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

<style>
  em{}

  
  #imageCarousel .carousel-inner .carousel-item img {
    border-radius: 10px; /* Adjust this value to control the roundness of the corners */
  }


</style>
</head>

<body>

   <!--======= Header ======= -->
  <header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <!-- // Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/apple-touch-icon.png" alt=""> 
       
      </a>

      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php#products">Products</a></li>
          <li><a class="nav-link scrollto" href="index.php#faq">Faq</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Team</a></li>
          <li><a class="nav-link scrollto" href="blog.php">Blog</a></li>    
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
          <li><a class="nav-link " href="e_shop.php">Shop</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->

      <a class="btn-getstarted scrollto" href="">SHOP NOW</a>


    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
   <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="row gy-4 posts-list">
                        <?php foreach ($blogPosts as $post) : ?>
                            <div class="col-lg-6">
                                <article class="d-flex flex-column">
                                    <div class="post-img">
                                        <img src="admin/images/<?php echo $post['image']; ?>" alt="" class="img-fluid">
                                    </div>
                                    <h2 class="title">
                                        <a href="blog-details.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a>
                                    </h2>
                                    <div class="meta-top">
                                        <ul>
                                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <?php echo $post['author']; ?></li>
                                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="<?php echo $post['date']; ?>"><?php echo date('M j, Y', strtotime($post['date'])); ?></time></li>
                                            <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.php?id=<?php echo $post['id']; ?>">Comments</a></li>
                                        </ul>
                                    </div>
                                    <div class="content">
                                        <p><?php echo substr($post['content'], 0, 200); ?>...</p>
                                    </div>
                                    <div class="read-more mt-auto align-self-end">
                                        <a href="blog-details.php?id=<?php echo $post['id']; ?>">Read More</a>
                                    </div>
                                </article>
                            </div><!-- End post list item -->
                        <?php endforeach; ?>
                    </div><!-- End blog posts list -->
                </div>
            </div>
        </div>
    </section><!-- End Blog Section -->
      </div>

    </div>

  </div>
</section><!-- End Blog Section -->

  </main><!-- End #main -->

   <!--======= Footer ======= -->
  <footer id="footer" class="footer">

   
      <div class="footer-legal text-center">
        <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

          <div class="d-flex flex-column align-items-center align-items-lg-start">
            <div class="copyright">
              &copy; Copyright <strong><span>WilaWane</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
              Designed & Developed with <i id="heart-icon"  class="bi bi-heart-fill"></i> by <a style="color:#F9D030;" href="  ">Digital Debug IT Solutions</a>
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