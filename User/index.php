<?php
  require('../Utilities/_LogoutFunctionality.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopify.in</title>
  <link rel="stylesheet" href="../Bootstrap/Css/bootstrap.min.css">
  <link rel="stylesheet" href="../Utilities/Css/navbar.css">
  <link rel="stylesheet" href="Css/categoryNav.css">
  <link rel="stylesheet" href="Css/index.css">
  <link rel="stylesheet" href="../Utilities/Css/footer.css">
  <style>
  </style>
</head>
<body>
  <?php require('../Utilities/_navbar.php');?>
  <?php require('Services/categoryNav.php');?>
  <!-- body -->
  <div class="bodycontent">
    <!-- slider -->
    <div class="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <a href="category display.php?q=Electronics"><img src="Images/Slider-1.jpg" class="d-block w-100" alt="image"></a>
          </div>

          <div class="carousel-item">
            <a href="category display.php?q=Footwear"><img src="Images/Slider-2.jpg" class="d-block w-100" alt="image"></a>
          </div>

          <div class="carousel-item">
            <a href="category display.php?q=Clothing"><img src="Images/Slider-3.jpg" class="d-block w-100" alt="image"></a>
          </div>

          <div class="carousel-item">
            <a href="category display.php?q=shirt"><img src="Images/Slider-4.jpg" class="d-block w-100" alt="image"></a>
          </div>

          <div class="carousel-item">
            <a href="category display.php?q=Medicines"><img src="Images/Slider-5.jpg" class="d-block w-100" alt="image"></a>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <!-- service -->
    <div class="service">
      <div class="service container">
        <div class="row">
          <div class="col-md-4">
            <div class="item">
                <div class="photo"><img src="Images/service-5.png" width="150px" alt="Easy Returns"></div>
                <h3>Easy Returns</h3>
                <p>Return any item before 15 days! </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="item">
              <div class="photo"><img src="Images/service-6.png" width="150px" alt="Free Shipping"></div>
              <h3>Free Shipping</h3>
              <p>Enjoy free shipping inside US. </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="item">
              <div class="photo"><img src="Images/service-7.png" width="150px" alt="Fast Shipping"></div>
              <h3>Fast Shipping</h3>
              <p>Items are shipped within 24 hours. </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="item">
              <div class="photo"><img src="Images/service-8.png" width="150px" alt="Satisfaction Guarantee">
              </div>
              <h3>Satisfaction Guarantee</h3>
              <p>We guarantee you with our quality satisfaction. </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="item">
              <div class="photo"><img src="Images/service-9.png" width="150px" alt="Secure Checkout"></div>
              <h3>Secure Checkout</h3>
              <p>Providing Secure Checkout Options for all </p>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="item">
              <div class="photo"><img src="Images/service-10.png" width="150px" alt="Money Back Guarantee">
              </div>
              <h3>Money Back Guarantee</h3>
              <p>Offer money back guarantee on our products </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- sub body -->
    <div class="container">
      <!-- heading 1 -->
      <h2 class="text-center heading3 bold">Shop By Category</h2>
      <p class="text-center small">Browse through your favourite categories. We've got them all!</p><hr>

      <!-- cards -->
      <div class="category">
        <div id="card1"> 
          <div class="card" style="width: 12rem;">
            <img src="Images/Card-1.png" class="card-img-top">
            <a href="category display.php?q=Electronics">
              <div class="card-body">
                <h5 class="card-title">Electronics & Appliances</h5>
                <p>Explore <img src="Images/Explore Right.png" id="ExRight"></p>
              </div>
            </a>
          </div>
        </div>

        <div id="car2">
          <div class="card" style="width: 12rem;">
            <img src="Images/Card-2.png" class="card-img-top">
            <a href="category display.php?q=Clothing">
              <div class="card-body">
                <h5 class="card-title">Clothing & Accessories</h5>
                <p>Explore <img src="Images/Explore Right.png" id="ExRight"><p>
              </div>
            </a>
          </div>
        </div>

        <div id="car3">
          <div class="card" style="width: 12rem;">
            <img src="Images/Card-3.png" class="card-img-top">
            <a href="category display.php?q=Medicines">
              <div class="card-body">
                <h5 class="card-title">Medicines</h5>
                <p>Explore <img src="Images/Explore Right.png" id="ExRight"></p>
              </div>
            </a>
          </div>
        </div>

        <div id="car4">
          <div class="card" style="width: 12rem;">
            <img src="Images/Card-4.png" class="card-img-top">
            <a href="category display.php?q=Food">
              <div class="card-body">
                <h5 class="card-title">Food</h5>
                <p>Explore <img src="Images/Explore Right.png" id="ExRight"></p>
              </div>
            </a>
          </div>
        </div>

        <div id="car5">
          <div class="card" style="width: 12rem;">
            <img src="Images/Card-5.png" class="card-img-top">
            <a href="category display.php?q=Toys">
              <div class="card-body">
                <h5 class="card-title">Toys, Baby & Sports</h5>
                <p>Explore <img src="Images/Explore Right.png" id="ExRight"></p>
              </div>
            </a>
          </div>
        </div>

        <div id="car6">
          <div class="card" style="width: 12rem;">
            <img src="Images/Card-6.png" class="card-img-top">
            <a href="category display.php?q=Footwear">
              <div class="card-body">
                <h5 class="card-title">Footwear</h5>
                <p>Explore <img src="Images/Explore Right.png" id="ExRight"></p>
              </div>
            </a>
          </div>
        </div>

        <div id="car7">
          <div class="card" style="width: 12rem;">
            <img src="Images/Card-7.jpg" class="card-img-top">
            <a href="category display.php?q=Hardware">
              <div class="card-body">
                <h5 class="card-title">Hardware & Sanitaryware</h5>
                <p>Explore <img src="Images/Explore Right.png" id="ExRight"></p>
              </div>
            </a>
          </div>
        </div>

        <div id="car8">
          <div class="card" style="width: 12rem;">
            <img src="Images/Card-8.png" class="card-img-top">
            <a href="category display.php?q=Luggage">
              <div class="card-body">
                <h5 class="card-title">Luggage & Backpacks</h5>
                <p>Explore <img src="Images/Explore Right.png" id="ExRight"></p>
              </div>
            </a>
          </div>
        </div>
      </div>

      <!-- heading s3 -->
      <h2 class="text-center heading3 bold">Connect With Us</h2>
      <p class="text-center small">We are always available to guide you at your convenience</p><hr>

        <!-- Query section -->
      <div class="query">
        <form action="Services/send_mail.php" method="post">
          <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter your name" require>
          </div>
          <div class="mb-3">
            <label for="Email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter your e-mail address" require>
          </div>
          <div class="mb-3">
            <label for="query" class="form-label">Queries</label>
            <textarea class="form-control" id="query" name="query" rows="6" placeholder="Enter your queries" require></textarea>
          </div>
          <input type="submit" id="submit" class="btn">
          <input type="reset" id="reset" class="btn">
        </form>
      </div>
    </div>

    <!-- video slider -->
    <div class="video_slider">
      <video src="Images/Video Slider.mp4" type="video/mp4" loop="" autoplay="" muted="" playsinline="" class="video"></video>
      <a href="category display.php?q=all">
        <div class="video-content shadow p-3 mb-5 bg-white rounded">Explore Now</div>
      </a>
    </div>

  </div>
  <?php require('../Utilities/_footer.php');?>
</body>
<script src="../Bootstrap/Js/bootstrap.min.js"></script>
<script src="../Utilities/Javascript/navbaruserconf.js"></script>
<script src="Javascript/categoryNav.js"></script>
</html>