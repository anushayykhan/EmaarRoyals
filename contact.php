<?php
require('inc.connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  // Save the inquiry
  $insert = "INSERT INTO inquiries (name, email,phone, message) VALUES ('$name', '$email','$phone', '$message')";
  mysqli_query($conn, $insert);
}

// Check for existing reservation
//     $check = "SELECT * FROM reservations WHERE Email = '$email'";
//     $result = mysqli_query($conn, $check);

//     if (mysqli_num_rows($result) > 0) {
//         echo "This guest has made a reservation before!";
//     } else {
//         echo "No reservation found for this email.";
//     }
// }
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
    .container .navbar-brand img {
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
          <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="rooms.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rooms</a>
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

  <section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.jpg);">
    <div class="container">
      <div class="row align-items-center site-hero-inner justify-content-center">
        <div class="col-md-12 text-center">

          <div class="mb-5 element-animate">
            <h1>Contact Us</h1>
            <p>Discover our world's #1 Luxury Room For VIP.</p>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- END section -->

  <section class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2 class="mb-5">Contact Form</h2>
          <form action="#" method="post">
            <div class="row">
              <div class="col-md-12 form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control ">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control ">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control ">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
                <label for="message">Write Message</label>
                <textarea name="message" id="message" name="message" class="form-control " cols="30" rows="8"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="submit" name="submit" value="Send Message" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
          <h3 class="mb-5">Paragraph</h3>
          <p class="mb-5"><img src="images/img_4.jpg" alt="" class="img-fluid"></p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae labore aspernatur cumque inventore voluptatibus odit doloribus! Ducimus, animi perferendis repellat. Ducimus harum alias quas, quibusdam provident ea sed, sapiente quo.</p>
          <p>Ullam cumque eveniet, fugiat quas maiores, non modi eos deleniti minima, nesciunt assumenda sequi vitae culpa labore nulla! Cumque vero, magnam ab optio quidem debitis dignissimos nihil nesciunt vitae impedit!</p>
        </div>
      </div>
    </div>
  </section>
  <!-- END section -->





  <section class="section-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/img_5.jpg);">
    <div class="container">
      <div class="row justify-content-center align-items-center intro">
        <div class="col-md-9 text-center element-animate">
          <h2>Relax and Enjoy your Holiday</h2>
          <p class="lead mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto quidem tempore expedita facere facilis, dolores!</p>
          <div class="btn-play-wrap"><a href="https://vimeo.com/channels/staffpicks/93951774" class="btn-play popup-vimeo "><span class="ion-ios-play"></span></a></div>
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
          <form action="#" class="subscribe">
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
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214" />
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