<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "moviehub");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/signin.css">
    <title>Sign In</title>
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

    <div class="container">

        <form id="signin-form" method="post" action="signin.php">
            <h2>Sign In</h2><br>
            <input type="text" id="signin-username" placeholder="Email" name="email" required>
            <input type="password" id="signin-password" placeholder="Password" name="password" required><br><br>
            <h3 id="h3"></h3>
            <button type="submit" name="submit">Sign In</button><br><br> OR <br><br>
            <button><a href="register.html">Register Now</a></button>
        </form>

    </div>

    <footer>+
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


<?php

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION["userid"] = $row["userid"];
            header('Location: index.php');
            
        } else {
            echo "<script>document.getElementById('h3').innerHTML = 'Invalid Email or Password';</script>";
        }
    } else {
        echo "<script>document.getElementById('h3').innerHTML = 'Invalid Email or Password';</script>";
    }
    
    mysqli_stmt_close($stmt);
}

mysqli_close($connection);
?>
