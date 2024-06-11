<?php
include("includes/db.php");

function getBlogPosts()
{
    global $con;

    $query = "SELECT * FROM blog ORDER BY date DESC LIMIT 3"; 

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
            // Add more fields as needed
        );
    }

    return $blogPosts;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="cDfJfyMoMfDpe1OV3qpw_r3BxfH9bN4XsPq63Y1sLHc" />
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

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TV6KDYGD5P"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-TV6KDYGD5P');
</script>


<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '814398920593108'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=814398920593108&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Meta Pixel Code -->

</head>

<body>

   <!--======= Header ======= -->
  <header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <!-- // Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/wila_wane.png" alt="Logo"> 
       
      </a>

      <nav id="navbar" class="navbar">
        <ul>


           
            <li><a class="nav-link scrollto" href="#">Home</a></li>
          <li><a class="nav-link scrollto" href="index.html#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.html#products">Products</a></li>
          <li><a class="nav-link scrollto" href="index.html#faq">Faq</a></li>
          <li><a class="nav-link scrollto" href="index.html#team">Team</a></li>
          <li><a class="nav-link" href="blog.php">Blog</a></li>  
          <!--<li><a class="nav-link" href="resources.php">Resources</a></li>  -->
          <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li>
          <li><a class="nav-link " href="https://wa.me/c/260975520847">Shop</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->

  
<a class="btn-getstarted" href="https://wa.me/c/260975520847">SHOP NOW</a>





    </div>
  </header><!-- End Header -->

  <section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <img src="assets/img/wila_wane.png" class="img-fluid animated">
  </section>

  <main id="main">

  
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h1 style="font-family: 'Buffalo', sans-serif;color: #F62AA0;">About Us</h1>
          <p style="font-size: larger; color: black;">WilaWane Store is a registered wooden educational toys and bookstore, the first of its
            kind in Zambia. We dedicated to providing a unique and enriching experience that
            combines the joy of play with the power of literature, all in a screen-free environment.
            At WilaWane Store, we believe in the transformative power of play and the profound
            impact of storytelling on a child's development. Our store is not just a shopping
            destination; it is a testament to our passion and commitment to fostering an engaging,
            inspiring, and imaginative learning environment. Our carefully curated selection of
            wooden educational toys is designed to encourage hands-on exploration, enabling
            children to learn, discover, and grow all the while having fun. Each toy is chosen with
            great care, ensuring it promotes skill development, creativity, and critical thinking.
            Driven by our deep love for literature and its ability to captivate young minds, we have
            also meticulously curated a diverse collection of children's storybooks. Our thoughtfully
            selected books spark imagination, fuel curiosity, and help cultivate a lifelong love for
            reading in children of all ages. As pioneers in Zambia, we take great pride in providing a
            dedicated space where parents, caregivers, and educators can find high-quality
            resources that inspire learning through the perfect blend of play and literature. We are
            committed to offering a wide range of educational materials that support children's
            growth and development.</p>
        </div>
        <section id="featured-services" class="featured-services">
        <div class="section-header">
        <h2 style="font-family: 'Buffalo', sans-serif;">Our Mission</h2>
          <p style="font-size: larger; color: black;">To provide good quality children’s educational
wooden toys and books that inspire creativity,
imagination, learning and fun.</p>
        </div>
        <div class="section-header">
        <h2 style="font-family: 'Buffalo', sans-serif;">Our Vision</h2>
          <p style="font-size: larger;color: black;">To become the ultimate go-to destination for
parents, caregivers and educators with who aspire
to provide their children with unparalleled play,
learning, and literary experiences.</p>
        </div>
        <div class="section-header">
        <h2 style="font-family: 'Buffalo', sans-serif;">Our Values</h2>
        </div>


        
          <div class="container">
      
              <div class="row gy-4">
                <div class="container">

                  <div class="row gy-4">
                    <div class="col-xl-3  d-flex" data-aos="zoom-out" >
                      <div class="service-item position-relative" style="border: 2px solid #F62AA0;border-radius: 3%;">
                        <h4><div class="icon"><i class="ri-reactjs-line"></i></div> Intergrity</h4>
                        <p>We are honest and trustworthy in our dealings. We say what we mean and mean what we say.</p>  </div>
                    </div><!-- End Service Item -->
          
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
                      <div class="service-item position-relative" style="border: 2px solid #F62AA0;border-radius: 3%;">
                        <h4><div class="icon"><i class="ri-award-fill"></i></div>Quality</h4>
                        <p>We care about supplying good quality products for our customers, toys that are durable and can be enjoyed for many years.</p></div>
                    </div><!-- End Service Item -->
          
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
                      <div class="service-item position-relative" style="border: 2px solid #F62AA0;border-radius: 3%;">
                        <h4><div class="icon"><i class="ri-emotion-happy-line"></i></div>Fun</h4>
                        <p>We believe in learning through play, our supply of children toys and books encourage learning in a fun way.</p>           </div>
                    </div><!-- End Service Item -->
          
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                      <div class="service-item position-relative" style="border: 2px solid #F62AA0;border-radius: 3%;">
                        <h4> <div class="icon"><i class="ri-hand-heart-fill"></i></div>Customer Care</h4>
                        <p>We give quality customer experience, we are attentive, polite, and always serve with a smile.</p> </div>
                    </div><!-- End Service Item -->
          
                  </div>
          
                </div>
      </section>
      
      <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

        <div class="col-lg-5">
          <div class="about-img">
            <img src="assets/img/zeya.jpg"class="img-fluid" alt="Zela" style="border-radius: 5%;">
          </div>
        </div>

        <div class="col-lg-7">
          <h3 class="pt-0 pt-lg-5">Why Choose Us?</h3>

     
          <div class="tab-content">

            <div class="tab-pane fade show active" id="tab1">

             
              <div class="d-flex align-items-center mt-4">
                <i class="bi bi-check2" style="color: #F62AA0;"></i>

                <h4 style="font-family: 'Buffalo', sans-serif; font-size: 25px; font-weight: 400;">Unique Combination of Wooden Educational Toys and Storybooks:</h4>
              </div>
              <p>At WilaWane Store, we offer a unique combination of high-quality wooden educational toys
                and children's storybooks. This curated selection provides a one-stop shop for parents,
                caregivers, and educators seeking resources that foster children's cognitive, imaginative, and
                language skills through play and literature.</p>

              <div class="d-flex align-items-center mt-4">
                <i class="bi bi-check2" style="color: #F62AA0;"></i>

                
                <h4 style="font-family: 'Buffalo', sans-serif; font-size: 25px; font-weight: 400;">Handpicked Items for Learning and Quality</h4>
              </div>
              <p>Every product in our store is carefully chosen to align with our mission of promoting learning through play and literature.
                 We prioritize items that foster skill development, creativity, and critical thinking,
                 maintaining rigorous quality standards for durability, safety, and longevity.</p>

              <div class="d-flex align-items-center mt-4">
                <i class="bi bi-check2" style="color: #F62AA0;"></i>

                
                <h4 style="font-family: 'Buffalo', sans-serif; font-size: 25px; font-weight: 400;">Personalized Approach</h4>
              </div>
              <p>With firsthand experience as parents and collaboration with certified early childhood experts,
                 our team provides a personalized touch. We guide customers through the purpose and suitability of each toy and book for different age groups, 
                offering expert advice tailored to a child's developmental stage.</p>

                <div class="d-flex align-items-center mt-4">
                  <i class="bi bi-check2" style="color: #F62AA0;"></i>

                  
                <h4 style="font-family: 'Buffalo', sans-serif; font-size: 25px; font-weight: 400;">Exceptional Customer Service</h4>
                </div>
                <p>Committed to a seamless and enjoyable shopping experience, 
                  our friendly and knowledgeable customer service team is ready to assist at every step. We address queries, provide recommendations,
                   and prioritize prompt and reliable delivery services to ensure customer satisfaction.</p>



                  <div class="d-flex align-items-center mt-4">
                    <i class="bi bi-check2" style="color: #F62AA0;"></i>

                    
                <h4 style="font-family: 'Buffalo', sans-serif; font-size: 25px; font-weight: 400;">Commitment to Sustainability</h4>
                  </div>
                  <p>Recognizing the importance of environmental preservation, WilaWane Store prioritizes toys crafted from sustainable materials.
                     By choosing our store, customers actively contribute to reducing environmental impact and promoting eco-friendly practices for the benefit of future generations.</p>
        
    
            </div><!-- End Tab 1 Content -->
          </div>

        </div>

      </div>

    </div>
  </section><!-- End About Section -->

  

     <!--======= Call To Action Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-out">

        <div class="row g-5">

          <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
            <h3>Visit WilaWane Store</h3>
            <p> Experience the magic of WilaWane Store by clicking on the button below now! Discover a world of wooden educational toys and captivating books, the first of its kind in Zambia.</p>
            <a class="cta-btn align-self-start" href="">WilaWane Store</a>
          </div>

          <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
            <!-- Bootstrap Carousel -->
            <div id="imageCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ul class="carousel-indicators">
                <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#imageCarousel" data-slide-to="1"></li>
                <li data-target="#imageCarousel" data-slide-to="2"></li>
                <li data-target="#imageCarousel" data-slide-to="3"></li>
                <li data-target="#imageCarousel" data-slide-to="4"></li>
              </ul>
              
              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="assets/img/juanita.jpg" alt="Image 2" class="img-fluid">
                </div>
                
                <div class="carousel-item">
                  <img src="assets/img/kids.jpg" alt="Image 3" class="img-fluid">
                </div>
              
                <div class="carousel-item">
                  <img src="assets/img/kids2.jpg" alt="Image 4" class="img-fluid">
                </div>
            
                <div class="carousel-item">
                  <img src="assets/img/kids3.jpg" alt="Image 5" class="img-fluid">
                </div>
              </div>
              <!-- Optionally, you can add carousel controls here -->
            </div>
            
              
              <!-- Left and right controls -->
              <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <!-- End of Bootstrap Carousel -->
          </div>
          

        </div>

      </div>
    </section>
     <!--End Call To Action Section -->

    

     <!--======= Features Section ======= -->
    <h1 style="font-family: 'Buffalo', sans-serif; color: #fc32c3;">Products</h1>
<section id="products" class="features">
  <div class="container" data-aos="fade-down">
      <ul class="nav nav-tabs row gy-4 d-flex">

          <li class="nav-item col-6 col-md-4 col-lg-2">
              <a class="nav-link active show" data-toggle="tab" data-target="#tab-1">
                   <i class="bi bi-joystick"></i> 
                  <h4>Wooden Educational</h4>
              </a>
          </li><!-- End Tab 1 Nav -->
          
          <li class="nav-item col-6 col-md-4 col-lg-2">
              <a class="nav-link" data-toggle="tab" data-target="#tab-2">
                   <i class="bi bi-box-seam color-indigo"></i> 
                  <h4>Montessori-Aligned</h4>
              </a>
          </li><!-- End Tab 2 Nav -->

          <li class="nav-item col-6 col-md-4 col-lg-2">
              <a class="nav-link" data-toggle="tab" data-target="#tab-3">
                 <i class="bi bi-brightness-high color-teal"></i> 
                  <h4>Felt Material</h4>
              </a>
          </li><!-- End Tab 3 Nav -->

          <li class="nav-item col-6 col-md-4 col-lg-2">
              <a class="nav-link" data-toggle="tab" data-target="#tab-4">
                   <i class="bi bi-command color-red"></i> 
                  <h4>Child Sized Furniture</h4>
              </a>
          </li><!-- End Tab 4 Nav -->
          <li class="nav-item col-6 col-md-4 col-lg-2">
            <a class="nav-link" data-toggle="tab" data-target="#tab-5">
              <i class="bi bi-gear-wide-connected"></i>

                <h4>Stem Kits</h4>
            </a>
        </li><!-- End Tab 5 Nav -->

          <li class="nav-item col-6 col-md-4 col-lg-2">
              <a class="nav-link" data-toggle="tab" data-target="#tab-6">
                <i class="bi bi-book color-blue"></i>

                  <h4>Storybooks</h4>
              </a>
          </li><!-- End Tab 6 Nav -->
          
      </ul>
      
      <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
              <div class="row gy-4">
                  <div class="col-lg-8 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                      <h3>Wooden Educational Toys</h3>
                      <p class="fst-italic">
                          Our collection features a variety of educational wooden toys designed to promote hands-on learning, fine motor skills, problem-solving abilities, and creativity ranging from: Numeric boards, puzzles, building blocks, pretend play toys among others
                      </p>
                  </div>
                  <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                      <img src="assets/img/wooden.jpg" alt="" class="img-fluid">
                  </div>
              </div>
          </div><!-- End Tab Content 1 -->
          
          <div class="tab-pane" id="tab-2">
              <div class="row gy-4">
                  <div class="col-lg-8 order-2 order-lg-1">
                      <h3>Montessori-Aligned Toys</h3>
                      <p class="fst-italic">
                          We offer classic Montessori toys that align with the principles of the Montessori method, fostering independent learning, sensory exploration, and cognitive development. These include: Object permanence boxes, Montessori pink towers, Shape Sorters etc.
                      </p>
                  </div>
                  <div class="col-lg-4 order-1 order-lg-2 text-center">
                    <img src="assets/img/montessori.jpg" alt=montessori"" class="img-fluid" width="100" height="200">

                  </div>
              </div>
          </div><!-- End Tab Content 2 -->
        
          <div class="tab-pane" id="tab-3">
              <div class= "row gy-4">
                  <div class="col-lg-8 order-2 order-lg-1">
                      <h3>Felt Material Toys</h3>
                      <p class="fst-italic">
                          Our felt material toys provide a unique tactile experience, promoting sensory development, imaginative play, and storytelling.
                      </p>
                  </div>
                  <div class="col-lg-4 order-1 order-lg-2 text-center">
                      <img src="assets/img/felt.jpg" alt="" class="img-fluid">
                  </div>
              </div>
          </div><!-- End Tab Content 3 -->
          
          <div class="tab-pane" id="tab-4">
              <div class="row gy-4">
                  <div class="col-lg-8 order-2 order-lg-1">
                      <h3>Child Sized Furniture</h3>
                      <p class="fst-italic">
                          We offer a wide selection of locally made children's furniture that help foster independence, ranging from front-facing bookshelves, sensory tables, Montessori kitchen helpers, toy shelves, mini wardrobes, just to mention a few.
                      </p>
                  </div>
                  <div class="col-lg-4 order-1 order-lg-2 text-center">
                      <img src="assets/img/furniture.png" alt="" class=" img-fluid">
                  </div>
              </div>
          </div><!-- End Tab Content 4 -->
          <div class="tab-pane" id="tab-5">
            <div class="row gy-4">
                <div class="col-lg-8 order-2 order-lg-1">
                    <h3>Stem Kits</h3>
                    <p class="fst-italic">
                      Dive into the fascinating world of STEM with our Ultimate Explorer STEM Kit, designed to spark curiosity and inspire the next generation of innovators. Perfect for young minds aged 8+, this kit combines fun with education, offering a hands-on learning experience that covers crucial aspects of Science, Technology, Engineering, and Mathematics.   </p>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 text-center">
                    <img src="assets/img/stem.jpg" alt="" class=" img-fluid">
                </div>
            </div>
          </div>
            <!-- End tab Content 5 -->
          
          <div class="tab-pane" id="tab-6">
              <div class="row gy-4">
                  <div class="col-lg-8 order-2 order-lg-1">
                      <h3>Children's Storybooks</h3>
                      <p class="fst-italic">
                          Explore our diverse collection of children's storybooks that span various genres, themes, and age groups. From enchanting tales to educational stories, our books fuel imagination, language skills, and a lifelong love for reading.
                      </p>
                  </div>
                  <div class="col-lg-4 order-1 order-lg-2 text-center">
                      <img src="assets/img/books.jpg" alt="" class="img-fluid">
                  </div>
              </div>
          </div><!-- End Tab Content 6 -->
      </div>

       
      <div class="card-details"></div>
  </div>
</section><!-- End Features Section -->

     <!--======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content px-xl-5">
              <h1 style="font-family: 'Buffalo', sans-serif; color: #fc32c3;">Frequently Asked Questions</h1>
              
            </div>

            <div class="accordion accordion-flush px-xl-5" id="faqlist">

              <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    <i class="bi bi-question-circle question-icon"></i>
                    What are Montessori toys?
                  </button>
                </h3>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Montessori toys are educational toys designed based on the principles of the Montessori method, an educational approach developed by Dr. Maria Montessori. These toys aim to encourage independent learning and exploration, focusing on a child's natural curiosity and desire to learn.    </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    <i class="bi bi-question-circle question-icon"></i>
                    Why are Montessori toys often made of wood?
                  </button>
                </h3>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Wooden Montessori toys are preferred because they are natural, durable, and provide a sensory experience for children. Wood is a sustainable material and aligns with the Montessori philosophy of bringing elements from the natural environment into the learning environment.</div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    <i class="bi bi-question-circle question-icon"></i>
                    What age range are Montessori toys suitable for?
                  </button>
                </h3>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Montessori toys are designed for various age groups, from infants to older children. Each toy is specifically crafted to target certain developmental milestones, encouraging age-appropriate learning and skill development. </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <i class="bi bi-question-circle question-icon"></i>
                    How do Montessori toys support child development?
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    <i class="bi bi-question-circle question-icon"></i>
                    Montessori toys are designed to promote hands-on learning, fine and gross motor skills, cognitive development, and sensory exploration. These toys often have a purposeful design that encourages independent play and self-discovery. </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    <i class="bi bi-question-circle question-icon"></i>
                    Are all wooden toys considered Montessori toys?
                  </button>
                </h3>
                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    While not all wooden toys are Montessori toys, the emphasis is on the design and purpose rather than the material. Montessori toys are characterized by their focus on independence, self-directed learning, and engagement with the child's natural development. </div>
                </div>
              </div><!-- # Faq item-->
            
            <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-6">
                        <i class="bi bi-question-circle question-icon"></i>
                        Can Montessori toys be used in group settings, such as classrooms?
                    </button>
                </h3>
                <div id="faq-content-6" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body">
                        Yes, Montessori toys are often used in Montessori classrooms and other educational settings. They are designed to be versatile and adaptable, promoting both individual and collaborative learning experiences.
                    </div>
                </div>
            </div><!-- # Faq item-->
            
            <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-7">
                        <i class="bi bi-question-circle question-icon"></i>
                        What are some popular examples of wooden Montessori toys?
                    </button>
                </h3>
                <div id="faq-content-7" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body">
                        Examples include the Montessori stacking toys, shape-sorters, sensory puzzles, wooden building blocks, and practical life toys (e.g., miniature brooms, watering cans) that encourage the development of various skills.
                    </div>
                </div>
            </div><!-- # Faq item-->
            
            <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-8">
                        <i class="bi bi-question-circle question-icon"></i>
                        How should parents choose Montessori toys for their children?
                    </button>
                </h3>
                <div id="faq-content-8" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body">
                        Parents should consider the age appropriateness of the toy, the developmental goals it supports, and whether it aligns with the child's interests. Montessori toys are often simple, allowing the child to engage in open-ended, imaginative play.
                    </div>
                </div>
            </div><!-- # Faq item-->
            
            <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-9">
                        <i class="bi bi-question-circle question-icon"></i>
                        Are Montessori toys only for children in Montessori schools?
                    </button>
                </h3>
                <div id="faq-content-9" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body">
                        No, Montessori toys are not exclusive to children in Montessori schools. Parents can incorporate these toys into their homes to create a supportive environment for their child's development, regardless of the educational setting.
                    </div>
                </div>
            </div><!-- # Faq item-->
            
            <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-10">
                        <i class="bi bi-question-circle question-icon"></i>
                        Can adults use Montessori principles in their interactions with children?
                    </button>
                </h3>
                <div id="faq-content-10" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                    <div class="accordion-body">
                        Absolutely. The Montessori philosophy extends beyond toys to a holistic approach to education. Parents and caregivers can incorporate Montessori principles into daily routines, fostering independence and creating a learning-friendly environment for children.
                    </div>
                </div>
            </div><!-- # Faq item-->
            

            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/faq.jpg");'>&nbsp;</div>
        </div>

      </div>
    </section><!-- End F.A.Q Section -->

    <!--======= Team Section ======= -->
   
   <section id="team" class="team">
    <div class="container" data-aos="fade-up">
  
      <div class="section-header text-center">
        <h1 style="font-family: 'Buffalo', sans-serif; color: #F62AA0;">Our Team</h1>
        <p style="color: black;">At Wila Wane Store, our success is a result of the dedicated and talented individuals who make up our exceptional team. Each member contributes unique skills and expertise, creating a dynamic and collaborative work environment. Meet the visionaries behind our brand:

        <br> Kayanda Besa (Founder): A visionary leader with a passion for innovation, Kayanda is the driving force behind Wila Wane Store. Her commitment to excellence and forward-thinking approach sets the tone for our company's success.
          
        <br>  Peter Mukuka (Co-Founder): As the Co-Founder of Wila Wane Store, Peter Mukuka brings a wealth of experience and strategic insight to the team. His collaborative spirit and dedication to customer satisfaction are integral to our continued growth.
          
          Discover more about the minds shaping the future of Wila Wane Store, each contributing to our shared mission of delivering outstanding products and services.</p>
      </div>
  
      <div class="row gy-5 justify-content-center">
  
        <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
          <div class="team-member">
            <div class="member-img">
              <img src="assets/img/kayanda.png" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              <div class="social">
                <a href="https://web.facebook.com/kaybesa"><i class="bi bi-facebook"></i></a>
                <a href="https://linkedin.com/in/kayanda-besa-86168680"><i class="bi bi-linkedin"></i></a>
              </div>
              <h4>Kayanda Besa</h4>
              <span>Founder</span>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="400">
          <div class="team-member">
            <div class="member-img">
              <img src="assets/img/peter.png" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              <div class="social">
                <a href="https://web.facebook.com/PeterChisi/"><i class="bi bi-facebook"></i></a>
                <a href="https://linkedin.com/in/peter-mukuka-5834868a
                "><i class="bi bi-linkedin"></i></a>
              </div>
              <h4>Peter Mukuka</h4>
              <span>Co-Founder</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- Recent Blog Posts Section -->
<section id="blog" class="recent-blog-posts">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h1 style="font-family: 'Buffalo', sans-serif; color: #F62AA0;">Blog</h1>
      <p style="color: black;">Recent posts from our Blog</p>
    </div>

    <div class="row">
      <?php
      // Assuming you have a function to fetch blog posts, replace 'getBlogPosts' with your actual function
      $blogPosts = getBlogPosts();

      foreach ($blogPosts as $post) :
      ?>
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="post-box">
            <div class="post-img-container">
              <img src="admin/images/<?php echo $post['image']; ?>" class="img-fluid" alt="No Image added">
            </div>
            <div class="post-content">
              <div class="meta">
                <span class="post-date"><?php echo date('D, M j, Y H:i', strtotime($post['date'])); ?></span>
                <span class="post-author"> / <?php echo $post['author']; ?></span>
              </div>
              <h3 class="post-title"><?php echo $post['title']; ?></h3>
              <p class="post-excerpt"><?php echo substr($post['content'], 0, 100); ?>...</p>
              <a href="blog-details.php?id=<?php echo $post['id']; ?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>



     <!--======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-header">
          <h1 style="font-family: 'Buffalo', sans-serif; color: #F62AA0;">Contact Us</h1>
        </div>

      </div>
      
      <div class="container">

        <div class="row gy-5 gx-lg-5">

          <div class="col-lg-4">

            <div class="info">          

              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Location:</h4>
                  <p style="color: black;">Plot 552/3 <br> kamanga road / vorna valley
              <br> Lusaka - Zambia</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4 >Email:</h4>
                  <p style="color: black;">sales@wilawanestore.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4 >Call:</h4>
                  <p style="color: black;">+260 975520847</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-8">
            <form action="contacts.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <!--  <div class="col-md-6 form-group mt-3 mt-md-0">-->
                <!--  <input type="text" class="form-control" name="number" id="number" placeholder="Your PhoneNumber" required>-->
                <!--</div>-->
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

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
              Designed & Developed with <i id="heart-icon"  class="bi bi-heart-fill"></i> by <a style="color:white;" href="  ">Digital Debug IT Solutions</a>
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

   <!--Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

   <!--Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>


<script>
  $(document).ready(function() {
      // Handle card click event
      $('.nav-link').click(function() {
          // Retrieve the content for the clicked tab
          var content = $(this).parent().find('.tab-pane').html();
          // Display the content in the card-details section
          $('.card-details').html(content);
      });
  });

    function openLogin() {
        // Open a login form (you can customize this)
        var loginForm = prompt("Enter your login credentials:");
    
        // Perform an AJAX request to validate the login (you might want to use a more secure method)
        // Here, I'm assuming you have a PHP script for login validation
        if (loginForm !== null) {
            var xmlhttp = new XMLHttpRequest();
    
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // If login is successful, include e_shop.php
                    if (this.responseText.trim() === "success") {
                        window.location.href = "./e_shop.php";
                    } else {
                        alert("Login failed. Please try again.");
                    }
                }
            };
    
            // Assuming you have a login validation PHP script (login.php), pass credentials to it
            xmlhttp.open("GET", "./customer/customer_login.php?login=" + loginForm, true);
            xmlhttp.send();
        }
    }
    </script>
    