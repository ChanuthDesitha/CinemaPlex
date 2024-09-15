<?php
session_start();

if (isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
}

$con = mysqli_connect('localhost','root','','moviehub');
$sql = "SELECT * FROM users WHERE userid= $userid";
$result = mysqli_query($con,$sql);
$row  =  mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/userdetails.css">
    <title>User Account Details</title>
</head>

<body>

    <nav>
        <ul>
            <nav class="top-right-nav">
                <li><a href="index.php" id="home-link">Home</a></li>
                <li><a href="booking.php" id="tickets-link">Tickets</a></li>
                <li><a href="contact.html" id="contact-link">Contact</a></li>
        </ul>
    </nav>


    <h1>User Account Details</h1>

    <div class="details">

        <Form action="modifyuser.php" method="post">

            First Name: <?php echo $row['first_name']; ?><br><br>
            Last Name: <?php echo $row['last_name']; ?><br><br>
            Email: <?php echo $row['email']; ?><br><br>
            Gender: <?php echo $row['gender']; ?><br><br>
            Address: <?php echo $row['address']; ?><br><br>
            Contact Number: <?php echo $row['contact']; ?><br><br><br>

            <button class="button">Edit User</button>
            <br><br>
            

        </Form>
        <a href="signout.php"><button class="button">Sign Out</button></a>
    </div>

    <footer>
        <div class="footer-content">

            <div class="footer-links">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="booking.php">Booking</a></li>
                    <li><a href="Privacy.html">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="footer-social">
                <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                <a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
                <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
                <a href="https://www.whatsapp.com"><i class="fa">&#xf232;</i></i></a>
                <a href="https://www.youtube.com"><i class="fa">&#xf16a;</i></a>
            </div>

            <div class="footer-info">
                &copy; 2023 CinemaPlex."
            </div>

        </div>

    </footer>

</body>

</html>