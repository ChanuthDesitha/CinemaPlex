<?php
//establish a MySQL connection
$connection = mysqli_connect("localhost", "root", "", "moviehub");
//verifying the connection
if (!$connection) {
	die("Connection failed : " . mysqli_connect_error());
}

$ticketCount = $_POST['ticketCount'];
$totalPrice = $_POST['totalPrice'];
$userid = $_POST['userid'];
$seatIDs = $_POST['seatIDs'];
$movieID = $_POST['movieID'];

$query = "INSERT INTO booking (userid, movieID, ticketCount, seatID) VALUES 
('$userid', '$movieID', '$ticketCount', '$seatIDs')";

if (mysqli_query($connection, $query)) {
    $msg = "Booking Successfull!";
} else {
    echo 'Error: ' . $query . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/userdetails.css">
    <title>Booking Successfull</title>
</head>
<body>
    <h1>Booking Successfull!</h1>

    <div class="details">

        <Form action="index.php">

            Seat/s ID: <?php echo $seatIDs; ?><br><br>
            Ticket Count: <?php echo $ticketCount; ?><br><br>
            Total Price: <?php echo $totalPrice; ?><br><br><br><br>

            <a href='index.php'><button class="button">Back</button></a>
            
        </Form>
       
</body>
</html>

