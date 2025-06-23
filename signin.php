<?php
require('inc.connection.php');
$login = $email = $password = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['loginBtn'])) {

    $email = safe_input($_POST['email']);
    $password = safe_input($_POST['password']);

    $sql = "SELECT * FROM `admins` WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // prx($result);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        // echo $password . "<br>";
        // prx($user);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];

            header('Location:admin-dash.php');
            exit();
        } else {
            $login = false;
        }
    } else {
        $login = false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url(images/big_image_1.jpg);
        }

        .card-body img {
            width: 190px;
            height: 220px;
            margin-top: -50px;
            margin-bottom: -50px;
        }
        
        .form-control {
            background-color: transparent !important;
            border: none;
            border-bottom: 2px solid #ccc;
            border-radius: 0;
            box-shadow: none;
            color: #000;
            font-size: 16px;
            padding-left: 0;
            padding-right: 0;
        }

        .form-control:focus {
            border-bottom: 2px solid rgb(95, 53, 38);
            box-shadow: none;
            outline: none;
        }

        input:-webkit-autofill {
            box-shadow: 0 0 0 1000px transparent inset !important;
            -webkit-text-fill-color: #000 !important;
        }
        
        .btn-custom {
            background-color: #795548;
            color: white;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            display: block;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color:burlywood;
        }

        form {
            max-width: 400px;
            margin: auto;
        }

        h1 {
            text-align: center;
        }
        .form-control{
            margin-bottom: 20px;
        }
        .form-label{
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-title">
                        <!-- <h2 class="text-center">Login Form</h2> -->
                        <?php
                        if ($login === false) {
                            echo '<div class="alert alert-danger" role="alert">
                            Invalid email or password. Please try again.
                            </div>';
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <center><img src="images/logo.png" alt=""></center>

                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
                            <h2 class="text-center mb-4" style="color: #795548; font-family: 'Medium 500 Italic';">Hotel Management Portal</h2>

                            <div class="mb-3">
                                <label for="email" class="form-label" style="font-family: 'Medium 500 Italic';">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label" style="font-family: 'Medium 500 Italic';">Password</label>
                                <input type="password" class="form-control"  id="password" name="password" value="<?php echo $password ?>" required>
                            </div>
                            <button type="submit" class="btn btn-custom mt-5 mb-3" name="loginBtn" style="font-family: 'Medium 500 Italic';">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>