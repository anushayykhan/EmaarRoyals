<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = $_POST['to_email'];
    $message = nl2br(htmlspecialchars($_POST['message']));
    $subject = "Reply to your inquiry at Our Hotel";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Hotel Support <support@yourhotel.com>";

    if (mail($to, $subject, $message, $headers)) {
        echo "Reply sent successfully.";
    } else {
        echo "Failed to send reply.";
    }
} else {
    echo "Invalid Request";
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
    
</body>
</html>