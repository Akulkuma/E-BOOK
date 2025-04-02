<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Book Store Website</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/main1.css" rel="stylesheet">

</head>
<body class="index-page">
  <?php include 'header.php'; ?>


  <main class="main">
        <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
    <!--<div class="image-container"> -->
      <img src="assets/img/background_image.webp" alt="" class="hero-bg" data-aos="fade-in">
      <!--<img src="assets/img/1.jpg" alt="Image 1">
      <img src="assets/img/3.jpg" alt="Image 2">
      <img src="assets/img/cta-bg.jpg" alt="Image 3">
    </div>-->
      <div class="container">
        <div class="row gy-4 d-flex justify-content-between">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2 data-aos="fade-up">Responsive Book Store Website</h2>
            <p data-aos="fade-up" data-aos-delay="100">"Both reading and writing are experiences – lifelong – in the course of which we who encounter words used in certain ways are persuaded by them to be brought mind and heart within the presence, the power, of the imagination." </p>

            <form action="search_page.php" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
              <input type="text" class="form-control" placeholder="Books">
              <button type="search_page.php" class="btn btn-primary">Search</button>
            </form>
          </div>

        </div>
      </div>

    </section><!-- /Hero Section -->
  
    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>Our Books<br></span>
        <h2>Our BookS</h2>
        <p>Book is useful for the students</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/bash_and_lucy-2.jpg" alt="" class="img-fluid">
              </div>
              <h3>Bash_and_Lucy</h3>
              <div class="Products-price for-desktop">
              <p id="sellingPWeb">&#8377 175</p>
              <del>&#8377 250</del>
              <span id="off_desktop">20% OFF</span>
              <strong id="save_desktop">You save &#8377 75</strong>
              </div>
              <a href="cart.php" class="btn btn-primary">Add_Cart</a>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/be_well_bee.jpg" alt="" class="img-fluid">
              </div>
              <h3>Be_Well_Bee</h3>
              <div class="Products-price for-desktop">
              <p id="sellingPWeb">&#8377 210 </p>
              <del>&#8377 300</del>
              <span id="off_desktop">30% OFF</span>
              <strong id="save_desktop">You save &#8377 90</strong>
              </div>
              <a href="cart.php" class="btn btn-primary">Add_Cart</a>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/boring_girls_a_novel.jpg" alt="" class="img-fluid">
              </div>
              <h3>Boring_Girls</h3>
              <div class="Products-price for-desktop">
              <p id="sellingPWeb">&#8377 280</p>
              <del>&#8377 350</del>
              <span id="off_desktop">20% OFF</span>
              <strong id="save_desktop">You save &#8377 70</strong>
              </div>
              <a href="cart.php" class="btn btn-primary">Add_Cart</a>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/clever_lands.jpg" alt="" class="img-fluid">
              </div>
              <h3>Clever_lands</h3>
              <div class="Products-price for-desktop">
              <p id="sellingPWeb">&#8377 259</p>
              <del>&#8377 370</del>
              <span id="off_desktop">30% OFF</span>
              <strong id="save_desktop">You save &#8377 111</strong>
              </div>
              <a href="cart.php" class="btn btn-primary">Add_Cart</a>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/darknet.jpg" alt="" class="img-fluid">
              </div>
              <h3>Darknet</h3>
              <div class="Products-price for-desktop">
              <p id="sellingPWeb">&#8377 175</p>
              <del>&#8377 250</del>
              <span id="off_desktop">20% OFF</span>
              <strong id="save_desktop">You save &#8377 75</strong>
              </div>
              <a href="cart.php" class="btn btn-primary">Add_Cart</a>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/economic.jpg" alt="" class="img-fluid">
              </div>
              <h3>Economic</h3>
              <div class="Products-price for-desktop">
              <p id="sellingPWeb">&#8377 210</p>
              <del>&#8377 300</del>
              <span id="off_desktop">30% OFF</span>
              <strong id="save_desktop">You save &#8377 90</strong>
              </div>
              <a href="cart.php" class="btn btn-primary">Add_Cart</a>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/holy_ghosts.jpg" alt="" class="img-fluid">
              </div>
              <h3>Holy_Ghosts</h3>
              <div class="Products-price for-desktop">
              <p id="sellingPWeb">&#8377 280</p>
              <del>&#8377 350</del>
              <span id="off_desktop">20% OFF</span>
              <strong id="save_desktop">You save &#8377 70</strong>
              </div>
              <a href="cart.php" class="btn btn-primary">Add_Cart</a>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/history_of_modern_architecture.jpg" alt="" class="img-fluid">
              </div>
              <h3>Modern_Architecture</h3>
              <div class="Products-price for-desktop">
              <p id="sellingPWeb">&#8377 259</p>
              <del>&#8377 370</del>
              <span id="off_desktop">30% OFF</span>
              <strong id="save_desktop">You save &#8377 111</strong>
              </div>
              <a href="cart.php" class="btn btn-primary">Add_Cart</a>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/freefall.jpg" alt="" class="img-fluid">
              </div>
              <h3>FreeFall</h3>
              <div class="Products-price for-desktop">
              <p id="sellingPWeb">&#8377 280</p>
              <del>&#8377 400</del>
              <span id="off_desktop">30% OFF</span>
              <strong id="save_desktop">You save &#8377 120</strong>
              </div>
              <a href="cart.php" class="btn btn-primary">Add_Cart</a>
            </div>
          </div><!-- End Card Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>Book Features</span>
        <h2>Book Features</h2>
        <p>A room without books is like a body without a soul.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
            <img src="assets/img/Features-1.jpg" class="img-fluid w-60" alt="">
          </div>
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            <h3>Novels</h3>
            <p class="fst-italic">
            A novel is a long, fictional narrative that explores characters, events, and settings, typically written in prose form.
            </p>
            <ul>
              <li><i class="bi bi-check"></i><span>One of the primary functions of a novel is to entertain readers by immersing them.</span></li>
              <li><i class="bi bi-check"></i> <span>Novels delve deeply into human emotions, relationships, and the human condition.</span></li>
              <li><i class="bi bi-check"></i> <span>Novels often reflect the culture,and values of the time,place in which they are written.</span></li>
            </ul>
          </div>
        </div><!-- Features Item -->

        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/Features-2.jpg" class="img-fluid w-60" alt="">
          </div>
          <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
            <h3>Gaming</h3>
            <p class="fst-italic">
            These books provide in-depth strategies, tips, and tricks to help players navigate through specific video games.
            </p>
            <ul>
              <li><i class="bi bi-check"></i><span>Gaming books can vary widely in content, from guides and strategy.</span></li>
              <li><i class="bi bi-check"></i> <span>They often include detailed maps, character abilities,and expert advice.</span></li>
              <li><i class="bi bi-check"></i> <span>These books often appeal to fans of the game, offering deeper insight into characters.</span></li>
            </ul>
          </div>
        </div><!-- Features Item -->

        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
            <img src="assets/img/Features-3.jpg" class="img-fluid w-60" alt="">
          </div>
          <div class="col-md-7" data-aos="fade-up">
            <h3>College-Book</h3>
            <p>A college book typically refers to academic textbooks, guides, or reference materials used by students in higher education to support their learning in various subjects.</p>
            <ul>
              <li><i class="bi bi-check"></i> <span>These books cover course topics in depth and proper way.</span></li>
              <li><i class="bi bi-check"></i><span>Reference books, such as  dictionaries, and thesauruses, provide definitions.</span></li>
              <li><i class="bi bi-check"></i> <span>Manual is  often used in technical subjects like engineering,computer science.</span></li>
            </ul>
          </div>
        </div><!-- Features Item -->

        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out">
            <img src="assets/img/Features-4.jpg" class="img-fluid w-60" alt="">
          </div>
          <div class="col-md-7 order-2 order-md-1" data-aos="fade-up">
            <h3>Literature</h3>
            <p class="fst-italic">
            A literature book is a written work that offers a creative, critical, or analytical exploration of ideas, themes, and emotions through the use of language.
            </p>
            <ul>
              <li><i class="bi bi-check"></i><span>Literature spans various genres, including novels, poetry, drama,and short stories.</span></li>
              <li><i class="bi bi-check"></i> <span>It  delve deep into human nature, societal issues, and philosophical questions.</span></li>
              <li><i class="bi bi-check"></i> <span>Literature books are a vital aspect of human culture,life, into the human experience.</span></li>
            </ul>
          </div>
        </div><!-- Features Item -->

      </div>

    </section><!-- /Features Section -->

  </main>
  <?php include 'footer.php'; ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>