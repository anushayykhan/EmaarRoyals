<!-- php -->
<?php
require('inc.connection.php');
$name = $email = $phone = $checkin = $checkout = $guest = $room = $request = '';
// pr($_SERVER);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  // pr($_POST);
  $name = $_POST['Name'];
  $email = $_POST['Email'];
  $phone = $_POST['Phone'];
  $checkin = $_POST['Checkin'];
  $checkout = $_POST['Checkout'];
  $guest = $_POST['Guest'];
  $room = $_POST['Room'];
  $request = $_POST['Request'];


  $sql = "INSERT INTO `reservations` (Name,Email,Phone,Checkin,Checkout,Guest,Room,Request) VALUES ('$name','$email','$phone','$checkin','$checkout','$guest','$room','$request')";

  if ($isInserted = mysqli_query($conn, $sql)) {
    header("location:index.php");
    exit();
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>LuxuryHotel a Hotel Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Rubik:300,400,700" rel="stylesheet">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">


 
  <!-- Theme Style -->
  <link rel="stylesheet" href="css/style.css">
  <style>
    .container .navbar-brand img{
    width: 100%;
    height: 200px;
    margin-bottom: -30px;
  }
  </style>
</head>



<body>

  <header role="banner">

    <nav class="navbar navbar-expand-md navbar-dark bg-light">
      <div class="container" style="margin-top: -30px;">
        <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
          aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
          <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
            <li class="nav-item">
              <a class="nav-link active" href="index.html">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="rooms.php" id="dropdown04" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Rooms</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="rooms.php">Room Videos</a>
                <a class="dropdown-item" href="rooms.php">Presidential Room</a>
                <a class="dropdown-item" href="rooms.php">Luxury Room</a>
                <a class="dropdown-item" href="rooms.php">Deluxe Room</a>
              </div>

            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="booknow.php">Book Now</a>
            </li>
            <li class="nav-item cta">
              <a class="nav-link" href="signin.php"><span>Sign In</span></a>
            </li>
          </ul>

        </div>
      </div>
    </nav>
  </header>
  <!-- END header -->

 <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-12 text-center">

            <div class="mb-5 element-animate">
              <h1>Welcome To Our Luxury Rooms</h1>
              <p>Discover our world's #1 Luxury Room For VIP.</p>
              <p><a href="booknow.php" class="btn btn-primary">Book Now</a></p>
            </div>

          </div>
        </div>
      </div>
    </section>
  <!-- END section -->

  <section class="site-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <div class="heading-wrap text-center element-animate">
            <h4 class="sub-heading">Stay with our luxury rooms</h4>
            <h2 class="heading">Stay and Enjoy</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus illo similique natus, a
              recusandae? Dolorum, unde a quibusdam est? Corporis deleniti obcaecati quibusdam inventore fuga eveniet!
              Qui delectus tempore amet!</p>
            <p><a href="about.php" class="btn btn-primary btn-sm">More About Us</a></p>
          </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-7">
          <img src="images/f_img_1.png" alt="Image placeholder" class="img-md-fluid">
        </div>
      </div>
    </div>
  </section>
  <!-- END section -->

  <section class="site-section bg-light">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12 heading-wrap text-center">
          <h4 class="sub-heading">Our Luxury Rooms</h4>
          <h2 class="heading">Featured Rooms</h2>
        </div>
      </div>
      <div class="row ">
        <div class="col-md-7">
          <div class="media d-block room mb-0">
            <figure>
              <img src="images/img_1.jpg" alt="Generic placeholder image" class="img-fluid">
              <div class="overlap-text">
                <span>
                  Featured Room
                  <span class="ion-ios-star"></span>
                  <span class="ion-ios-star"></span>
                  <span class="ion-ios-star"></span>
                </span>
              </div>
            </figure>
            <div class="media-body">
              <h3 class="mt-0"><a href="#">Presidential Room</a></h3>
              <ul class="room-specs">
                <li><span class="ion-ios-people-outline"></span> 2 Guests</li>
                <li><span class="ion-ios-crop"></span> 22 ft <sup>2</sup></li>
              </ul>
              <p>Nulla vel metus scelerisque ante sollicitudin. Fusce condimentum nunc ac nisi vulputate fringilla. </p>
              <p><a href="booknow.php" class="btn btn-primary btn-sm">Book Now From $20</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-5 room-thumbnail-absolute">
          <a href="booknow.php" class="media d-block room bg first-room" style="background-image: url(images/img_2.jpg); ">
            <!-- <figure> -->
            <div class="overlap-text">
              <span>
                Hotel Room
                <span class="ion-ios-star"></span>
                <span class="ion-ios-star"></span>
                <span class="ion-ios-star"></span>
              </span>
              <span class="pricing-from">
                from $22
              </span>
            </div>
            <!-- </figure> -->
          </a>

          <a href="booknow.php" class="media d-block room bg second-room" style="background-image: url(images/img_4.jpg); ">
            <!-- <figure> -->
            <div class="overlap-text">
              <span>
                Hotel Room
                <span class="ion-ios-star"></span>
                <span class="ion-ios-star"></span>
                <span class="ion-ios-star"></span>
              </span>
              <span class="pricing-from">
                from $22
              </span>
            </div>
            <!-- </figure> -->
          </a>

        </div>
      </div>
    </div>
  </section>



  <section class="section-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/img_5.jpg);">
    <div class="container">
      <div class="row justify-content-center align-items-center intro">
        <div class="col-md-9 text-center element-animate">
          <h2>Relax and Enjoy your Holiday</h2>
          <p class="lead mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto quidem tempore
            expedita facere facilis, dolores!</p>
          <div class="btn-play-wrap"><a href="https://vimeo.com/channels/staffpicks/93951774"
              class="btn-play popup-vimeo "><span class="ion-ios-play"></span></a></div>
        </div>
      </div>
    </div>
  </section>
  <!-- END section -->

  <section class="site-section bg-light">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12 heading-wrap text-center">
          <h4 class="sub-heading">Our Blog</h4>
          <h2 class="heading">Our Recent Blog</h2>
        </div>
      </div>
      <div class="row ">
        <div class="col-md-4">
          <div class="post-entry">
            <img src="images/img_3.jpg" alt="Image placeholder" class="img-fluid">
            <div class="body-text">
              <div class="category">Rooms</div>
              <h3 class="mb-3"><a href="#">New Rooms</a></h3>
              <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum deserunt illo quis
                similique dolore voluptatem culpa voluptas rerum, dolor totam.</p>
              <p><a href="#" class="btn btn-primary btn-outline-primary btn-sm">Read More</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="post-entry">
            <img src="images/img_6.jpg" alt="Image placeholder" class="img-fluid">
            <div class="body-text">
              <div class="category">News</div>
              <h3 class="mb-3"><a href="#">New Staff Added</a></h3>
              <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum deserunt illo quis
                similique dolore voluptatem culpa voluptas rerum, dolor totam.</p>
              <p><a href="#" class="btn btn-primary btn-outline-primary btn-sm">Read More</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="post-entry">
            <img src="images/img_5.jpg" alt="Image placeholder" class="img-fluid">
            <div class="body-text">
              <div class="category">New Rooms</div>
              <h3 class="mb-3"><a href="#">Big Rooms for All</a></h3>
              <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum deserunt illo quis
                similique dolore voluptatem culpa voluptas rerum, dolor totam.</p>
              <p><a href="#" class="btn btn-primary btn-outline-primary btn-sm">Read More</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END section -->

  <footer class="site-footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-4">
          <h3>Phone Support</h3>
          <p>24/7 Call us now.</p>
          <p class="lead"><a href="tel://">+ 1 332 3093 323</a></p>
        </div>
        <div class="col-md-4">
          <h3>Connect With Us</h3>
          <p>We are socialized. Follow us</p>
          <p>
            <a href="#" class="pl-0 p-3"><span class="fa fa-facebook"></span></a>
            <a href="#" class="p-3"><span class="fa fa-twitter"></span></a>
            <a href="#" class="p-3"><span class="fa fa-instagram"></span></a>
            <a href="#" class="p-3"><span class="fa fa-vimeo"></span></a>
            <a href="#" class="p-3"><span class="fa fa-youtube-play"></span></a>
          </p>
        </div>
        <div class="col-md-4">
          <h3>Connect With Us</h3>
          <p>"We’d love to hear from you! Reach out to us with any questions, feedback, or inquiries."</p>
          <form action="contact.php" class="subscribe">
            <div class="form-group">
              <button type="submit"><span class="ion-ios-arrow-thin-right"></span></button>
              <input type="email" class="form-control" placeholder="Enter email">
            </div>

          </form>
        </div>
      </div>
      
    </div>
  </footer>
  <!-- END footer -->

  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#f4b214" />
    </svg></div>

  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.0.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>

  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/magnific-popup-options.js"></script>

  <script src="js/main.js"></script>
</body>

</html>