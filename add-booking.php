<?php
include('inc.connection.php');

// Initialize variables
$guest_id = $name = $email = $phone = $checkin = $checkout = $guest = $suite = $room_no = $room = '';
$selected_rooms = [];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['guest_id'])) {
    $guest_id = $_GET['guest_id'];
    $sql = "SELECT * FROM reservations WHERE Id = '$guest_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $name = $user['Name'];
        $email = $user['Email'];
        $phone = $user['Phone'];
        $checkin = $user['Checkin'];
        $checkout = $user['Checkout'];
        $guest = $user['Guest'];
        $suite = $user['Suite'];
        $room = $user['Room'];
        $room_no = $user['Room_no'];
        $selected_rooms = explode(',', $room_no);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Capture POST data
    $guest_id = $_POST['Guest_id'];
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $checkin = $_POST['Checkin'];
    $checkout = $_POST['Checkout'];
    $guest = $_POST['Guest'];
    $suite = $_POST['Suite'];
    $room_no = $_POST['Room_no'];

    // Convert Room_no to comma-separated string if it's an array
    if (is_array($room_no)) {
        $room_no_str = implode(',', $room_no);
    } else {
        $room_no_str = $room_no;
    }

    // Check if booking already exists
    $checkQuery = "SELECT * FROM bookings WHERE Guest_id = '$guest_id'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Update existing booking
        $updateQuery = "UPDATE bookings SET 
                        Name = '$name', 
                        Email = '$email', 
                        Phone = '$phone', 
                        Checkin = '$checkin', 
                        Checkout = '$checkout', 
                        Guest = '$guest', 
                        Suite = '$suite', 
                        Room_no = '$room_no_str'
                        WHERE Guest_id = '$guest_id'";

        $isUpdated = mysqli_query($conn, $updateQuery);
        if ($isUpdated) {
            echo "<script>
                alert('Booking updated successfully!');
                window.location.href = 'Booking.php';
            </script>";
        } else {
            echo "<script>alert('Error while updating booking.');</script>";
        }
    } else {
        // Insert new booking
        $insertQuery = "INSERT INTO bookings 
                        (Guest_id, Name, Email, Phone, Checkin, Checkout, Guest, Suite, Room_no)
                        VALUES 
                        ('$guest_id', '$name', '$email', '$phone', '$checkin', '$checkout', '$guest', '$suite', '$room_no_str')";

        $isInserted = mysqli_query($conn, $insertQuery);
        if ($isInserted) {
            echo "<script>
                alert('Booking added successfully!');
                window.location.href = 'Booking.php';
            </script>";
        } else {
            echo "<script>alert('Error while adding booking.');</script>";
        }
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EmaarRoyals</title>
    <link rel="shortcut icon" type="image/png" href="images/logo.png" />
    <link rel="stylesheet" href="./assets/css/styles.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

        /* Remove any top margin accidentally coming from .body-wrapper or .page-wrapper */
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
                    <form method="POST" action="add-booking.php">
                        <div class="row" style="margin-top: -60px;">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-md-flex align-items-center">
                                            <div>
                                                <h2 class="mb-3">Hotel Booking Form</h2>
                                            </div>
                                           
                                        </div>

                                        <div class="mb-3">
                                            <label for="guest-id" class="form-label">Guest ID</label>
                                            <input type="text" name="Guest_id" id="guest-id" value="<?php echo $guest_id; ?>" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="Name" id="name" value="<?php echo $name; ?>" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="Email" id="email" value="<?php echo $email; ?>" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="text" name="Phone" id="phone" value="<?php echo $phone; ?>" class="form-control" required>
                                        </div>

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="checkin" class="form-label">Check-in Date</label>
                                                <input type="text" name="Checkin" id="checkin" value="<?php echo $checkin; ?>" class="form-control" required>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="checkout" class="form-label">Check-out Date</label>
                                                <input type="text" name="Checkout" id="checkout" value="<?php echo $checkout; ?>" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="guest" class="form-label">Number of Guests</label>
                                                <input type="number" name="Guest" id="guest" value="<?php echo $guest; ?>" class="form-control" min="1" required>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="suite" class="form-label">Suite</label>
                                                <input type="text" name="Suite" id="suite" value="<?php echo $suite; ?>" class="form-control" min="1" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="room_no" class="form-label">Room Number</label>
                                                <select name="Room_no[]" id="room_no" class="form-select" multiple required>
                                                    <option value="1" <?php if (isset($selected_rooms) && in_array("1", $selected_rooms)) echo "selected"; ?>>1</option>
                                                    <option value="2" <?php if (isset($selected_rooms) && in_array("2", $selected_rooms)) echo "selected"; ?>>2</option>
                                                    <option value="3" <?php if (isset($selected_rooms) && in_array("3", $selected_rooms)) echo "selected"; ?>>3</option>
                                                    <option value="4" <?php if (isset($selected_rooms) && in_array("4", $selected_rooms)) echo "selected"; ?>>4</option>
                                                    <option value="5" <?php if (isset($selected_rooms) && in_array("5", $selected_rooms)) echo "selected"; ?>>5</option>
                                                    <option value="6" <?php if (isset($selected_rooms) && in_array("6", $selected_rooms)) echo "selected"; ?>>6</option>
                                                    <option value="7" <?php if (isset($selected_rooms) && in_array("7", $selected_rooms)) echo "selected"; ?>>7</option>
                                                    <option value="8" <?php if (isset($selected_rooms) && in_array("8", $selected_rooms)) echo "selected"; ?>>8</option>
                                                    <option value="9" <?php if (isset($selected_rooms) && in_array("9", $selected_rooms)) echo "selected"; ?>>9</option>
                                                    <option value="10" <?php if (isset($selected_rooms) && in_array("10", $selected_rooms)) echo "selected"; ?>>10</option>
                                                    <option value="11" <?php if (isset($selected_rooms) && in_array("11", $selected_rooms)) echo "selected"; ?>>11</option>
                                                    <option value="12" <?php if (isset($selected_rooms) && in_array("12", $selected_rooms)) echo "selected"; ?>>12</option>
                                                    <option value="13" <?php if (isset($selected_rooms) && in_array("13", $selected_rooms)) echo "selected"; ?>>13</option>
                                                    <option value="14" <?php if (isset($selected_rooms) && in_array("14", $selected_rooms)) echo "selected"; ?>>14</option>
                                                    <option value="15" <?php if (isset($selected_rooms) && in_array("15", $selected_rooms)) echo "selected"; ?>>15</option>
                                                </select>
                                            </div>
                                           
                                        </div>



                                        <div class="text-end mt-3">
                                            <button type="submit" name="submit" id="submit" class="btn btn-primary w-100">Confirm Booking</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>



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

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#room_no').select2({
                placeholder: "Select Room(s)"
            });
        });
    </script>

</body>

</html>