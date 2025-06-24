<?php
include('inc.connection.php');
$sql = "SELECT * FROM `inquiries`";
$result = mysqli_query($conn, $sql);
?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>EmaarRoyals</title>
    <link rel="shortcut icon" type="image/png" href="images/logo.png" />
  <link rel="stylesheet" href="./assets/css/styles.min.css" />

  <style>
    .app-header {
      margin-top: 0 !important;
      padding-top: 0 !important;
      position: relative;
      top: 0 !important;
    }

    nav.navbar {
      margin-top: 0 !important;
      padding-top: 0 !important;
    }

    .body-wrapper,
    #main-wrapper,
    .page-wrapper {
      margin-top: 0 !important;
      padding-top: 0 !important;
    }

    .brand-logo img {
      width: 100%;
      height: 160px;
      margin-top: -26px;
      margin-bottom: -35px;
    }
  </style>



</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" style="padding-top: 0 !important;" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    <aside class="left-sidebar" style="margin-top: 0 !important; padding-top: 0 !important; top: 0 !important;">

      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-center">
          <a href="./admin-dash.php" class="text-nowrap logo-img">
            <img src="images/logo.png" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./admin-dash.php" aria-expanded="false">
                <i class="ti ti-receipt"></i>
                <span class="hide-menu">Reservations</span>
              </a>
            </li>
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
            <!-- ---------------------------------- -->



            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between" href="room_status.php" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-key"></i>
                  </span>
                  <span class="hide-menu">Rooms</span>
                </div>

              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link has-arrow justify-content-between" href="javascript:void(0)" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-bookmark"></i>
                  </span>
                  <span class="hide-menu">Booking</span>
                </div>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="add-booking.php" class="sidebar-link">
                    <i class="ti ti-plus"></i>
                    <span class="hide-menu">Add Booking</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="Booking.php" class="sidebar-link">
                    <i class="ti ti-check"></i>
                    <span class="hide-menu">Booked</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between" href="admin-inquiry.php" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-help"></i>
                  </span>
                  <span class="hide-menu">Inquires</span>
                </div>

              </a>
            </li>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">


        <nav class="navbar navbar-expand-lg navbar-light">

          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
           
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

              <li class="nav-item dropdown">
                <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="./assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-key fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="signin.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row" style="margin-top: -60px;">


            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">Recent Comments</h4>
                </div>
                <div class="comment-widgets scrollable mb-2 common-widget" style="height: 465px" data-simplebar="">
                  <?php $srno = 1;
                  while ($row = mysqli_fetch_assoc($result)) {
                    $email = $row['email'];

                    $reservation_check_query = "SELECT id FROM reservations WHERE Email = '$email' LIMIT 1";
                    $reservation_result = mysqli_query($conn, $reservation_check_query);
                    $hasReservation = mysqli_num_rows($reservation_result) > 0;
                  ?>
                    <div class="d-flex flex-row comment-row border-bottom p-3 gap-3">
                      <div>
                        <span><img src="./assets/images/profile/user-3.jpg" class="rounded-circle" alt="user" width="50" /></span>
                      </div>
                      <div class="comment-text w-100">
                        <h5 class="fw-medium"><?php echo htmlspecialchars($row['name']); ?></h5>
                        <p class="mb-1 fs-2 text-muted"><?php echo htmlspecialchars($row['email']); ?></p>

                        <p>
                          <?php if ($hasReservation): ?>
                            <span class="badge bg-success text-white">✔ Reserved Guest</span>
                          <?php else: ?>
                            <span class="badge bg-secondary text-white">✖ No Reservation Found</span>
                          <?php endif; ?>
                        </p>

                        <h6 class="fw-medium"><?php echo nl2br(htmlspecialchars($row['message'])); ?></h6>
                        <!-- reply form -->
                        <form method="POST" action="reply.php" class="mt-3">
                          <input type="hidden" name="to_email" value="<?php echo htmlspecialchars($row['email']); ?>">
                          <div class="mb-2">
                            <textarea name="message" class="form-control" rows="3" placeholder="Write your reply..." required></textarea>
                          </div>
                          <button type="submit" class="btn btn-primary btn-sm">Send Reply</button>
                        </form>
                      </div>
                    </div>
                  <?php $srno++;
                  } ?>


                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/sidebarmenu.js"></script>
    <script src="./assets/js/app.min.js"></script>
    <script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="./assets/js/dashboard.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>