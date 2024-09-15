<?php
$con = mysqli_connect('localhost','root','','moviehub');
$sql = "SELECT * FROM movies WHERE movieId= 14";
$result = mysqli_query($con,$sql);
$row  =  mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/movie.css">
    <title><?php echo $row['movieName'] ?></title>
</head>

<body>

    <nav class="top-right-nav">
        <UL>
            <li><a href="index.php" id="home-link">Home</a></li>
            <li><a href="booking.php" id="tickets-link">Tickets</a></li>
            <li><a href="contact.html" id="contact-link">Contact</a></li>
        </ul>
    </nav>

    <header>
        <h1><?php echo $row['movieName']; ?></h1>
    </header>
    <main>

        <section class="movie-info">
            <img src="<?php echo $row['img']; ?>" alt="">
            <div class="movie-details">
                
                <h2>Movie Details</h2><br>
                <p>Release Date:<?php echo "&nbsp".$row['releseDate']; ?></p><br>
                <p>Genre:<?php echo "&nbsp".$row['genre']; ?></p><br>
                <p>Director:<?php echo "&nbsp".$row['directorName']; ?></p><br>
                <p>Duration:<?php echo "&nbsp".$row['duration']; ?></p>
            </div>
        </section>
        <section class="about">
            <h2>About</h2>
            <p><?php echo $row['about']; ?></p>
        </section>
    </main>


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

</html>