<?php
include ('inc.connection.php');

$sql = "SELECT r.*
        FROM rooms r
        LEFT JOIN bookings b 
          ON r.id = id 
          AND CURDATE() BETWEEN b.check_in AND b.check_out
        WHERE id IS NULL";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Available Rooms</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Available Rooms Today</h2>

<table>
    <tr>
        <th>Room Number</th>
        <th>Suite</th>
        <th>Price</th>
    </tr>
<?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['room_number']; ?></td>
        <td><?php echo $row['suite']; ?></td>
        <td><?php echo $row['price']; ?></td>
    </tr>
<?php endwhile; ?>
</table>
</body>
</html>