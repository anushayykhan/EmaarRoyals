<?php

include('inc.connection.php');
$today = date('Y-m-d');

$today = date('Y-m-d');

$sql = "
SELECT 
  r.room_number,
  CASE
    WHEN r.status = 'maintenance' THEN 'Under Maintenance'
    WHEN EXISTS (
      SELECT 1 FROM bookings b 
      WHERE b.Room_No = r.room_number
      AND b.Checkin <= '$selected_date'
      AND b.Checkout >= '$selected_date'
    ) THEN 'Reserved'
    ELSE 'Free'
  END AS room_status
FROM rooms r
ORDER BY r.room_number";







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

        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        .Reserved {
            color: red;
            font-weight: bold;
        }

        .Free {
            color: green;
            font-weight: bold;
        }

        .UnderMaintenance {
            color: orange;
            font-weight: bold;
        }

        .status-dot {
            height: 10px;
            width: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }

        .dot-reserved {
            background-color: red;
        }

        .dot-free {
            background-color: green;
        }

        .dot-maintenance {
            background-color: orange;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
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
                            <a class="sidebar-link justify-content-between" href="#" aria-expanded="false">
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

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex align-items-center">
                                        <div>
                                            <h4 class="card-title">ROOMS</h4>
                                            <!-- <p class="card-subtitle">
                        Ample Admin Vs Pixel Admin
                      </p> -->
                                        </div>
                                        
                                    </div>
                                    <div class="table-responsive mt-4">
                                        <h2>Room Status Overview</h2>
                                        <p style="text-align:center; font-weight: bold; margin-bottom: 10px;">
                                            Showing status for: <?php echo $today; ?>
                                        </p>

                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Room Number</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($row['room_number']); ?></td>
                                                        <td class="<?php echo str_replace(' ', '', $row['room_status']); ?>">
                                                                                     
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>

                                            </tbody>
                                        </table>


                                    </div>
                                </div>
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