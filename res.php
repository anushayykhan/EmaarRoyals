 <?php
 include('inc.connection.php');
if(!isset($_SESSION['logged_in'])) {
    header('Location: signin.php');
    exit();
}
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <h1>hi</h1>
 </body>
 </html>