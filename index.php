<?php
session_start();

$con = mysqli_connect('localhost','root','','moviehub');

$sql = "SELECT * FROM movies WHERE movieId= 01";
$resultMovie1 = mysqli_query($con,$sql);
$row  =  mysqli_fetch_assoc($resultMovie1);
$movieName1 = $row['movieName'];
$img1 = $row['img'];

$sql = "SELECT * FROM movies WHERE movieId= 02";
$resultMovie2 = mysqli_query($con,$sql);
$row  =  mysqli_fetch_assoc($resultMovie2);
$movieName2 = $row['movieName'];
$img2 = $row['img'];

$sql = "SELECT * FROM movies WHERE movieId= 03";
$resultMovie3 = mysqli_query($con,$sql);
$row  =  mysqli_fetch_assoc($resultMovie3);
$movieName3 = $row['movieName'];
$img3 = $row['img'];

$sql = "SELECT * FROM movies WHERE movieId= 04";
$resultMovie4 = mysqli_query($con,$sql);
$row  =  mysqli_fetch_assoc($resultMovie4);
$movieName4 = $row['movieName'];
$img4 = $row['img'];

$sql = "SELECT * FROM movies WHERE movieId= 05";
$resultMovie5 = mysqli_query($con,$sql);
$row  =  mysqli_fetch_assoc($resultMovie5);
$movieName5 = $row['movieName'];
$img5 = $row['img'];

$sql = "SELECT * FROM movies WHERE movieId= 10";
$resultMovie10 = mysqli_query($con,$sql);
$row  =  mysqli_fetch_assoc($resultMovie10);
$movieName10 = $row['movieName'];
$img10 = $row['img'];

$sql = "SELECT * FROM movies WHERE movieId= 11";
$resultMovie11 = mysqli_query($con,$sql);
$row  =  mysqli_fetch_assoc($resultMovie11);
$movieName11 = $row['movieName'];
$img11 = $row['img'];

$sql = "SELECT * FROM movies WHERE movieId= 12";
$resultMovie12 = mysqli_query($con,$sql);
$row  =  mysqli_fetch_assoc($resultMovie12);
$movieName12 = $row['movieName'];
$img12 = $row['img'];

$sql = "SELECT * FROM movies WHERE movieId= 13";
$resultMovie13 = mysqli_query($con,$sql);
$row  =  mysqli_fetch_assoc($resultMovie13);
$movieName13 = $row['movieName'];
$img13 = $row['img'];

$sql = "SELECT * FROM movies WHERE movieId= 14";
$resultMovie14 = mysqli_query($con,$sql);
$row  =  mysqli_fetch_assoc($resultMovie14);
$movieName14 = $row['movieName'];
$img14 = $row['img'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>CinemaPlex</title>
    <style>
        .list:nth-child(1)::before{
            content: '<?php echo $movieName1 ?>'; 
        }
        .list:nth-child(2)::before{
            content: '<?php echo $movieName2 ?>';
        }
        .list:nth-child(3)::before{
            content: '<?php echo $movieName3 ?>';
        }
        .list:nth-child(4)::before{
            content: '<?php echo $movieName4 ?>';
        }
        .list:nth-child(5)::before{
            content: '<?php echo $movieName5 ?>';
        }
        .tv .list:nth-child(1)::before{
            content: '<?php echo $movieName10 ?>';
        }
        .tv .list:nth-child(2)::before{
            content: '<?php echo $movieName11 ?>';
        }
        .tv .list:nth-child(3)::before{
            content: '<?php echo $movieName12 ?>';
        }
        .tv .list:nth-child(4)::before{
            content: '<?php echo $movieName13 ?>';
        }
        .tv .list:nth-child(5)::before{
            content: '<?php echo $movieName14 ?>';
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="left">
            <p>CinemaPlex."</p>

            <div class="flow home">
                <span class="material-icons">home </span>
                <a href="index.php">
                    <h2>Home</h2>
                </a>
            </div>

            <div class="flow">
                <span class="material-icons">book_online</span>
                <a href="booking.php">
                    <h2>Tickets</h2>
                </a>
            </div>

            <div class="flow">
                <span class="material-icons">call</span>
                <a href="contact.html">
                    <h2>Contact</h2>
                </a>
            </div>

            <div class="flow">
                <span class="material-icons">shield</span>
                <a href="Privacy.html">
                    <h2>privacy policy</h2>
                </a>
            </div>

            <br><br><br>
            <p>account</p>
            <div class="flow">
                <span class="material-icons">login</span>
                <?php
                
                if (isset($_SESSION['userid'])) {
                    $userid = $_SESSION['userid'];
                    $sqlUserID = "SELECT first_name FROM users WHERE userid = $userid";
                    $resultUserID = mysqli_query($con,$sqlUserID);

                    if (mysqli_num_rows($resultUserID) > 0) {
                        $row = mysqli_fetch_assoc($resultUserID);
                        $userName = $row['first_name'];
                        echo ' <a href="userdetails.php"><h2>' . $userName . '</h2></a>';
                    }    
                } else {
                    echo '<a href="signin.php"><h2>Sign in</h2></a>';
                }
                ?>
               
            </div>

            <div class="flow"><span class="material-icons">logout</span>
                <a href="signout.php">
                    <h2>Sign out</h2>
                </a>
            </div>


        </div>


        <?php
            $sql = "SELECT * FROM movies WHERE movieId= 00";
            $result = mysqli_query($con,$sql);
            $row  =  mysqli_fetch_assoc($result);

        ?>

        <div class="right">
            <div class="heading">
                <div class="head-content">
                    <h2>
                        <?php echo $row['movieName']; ?>
                    </h2>
                    <div class="rating">
                        <div class="btn"><span class="material-icons">movie_filter</span><span>2023</span></div>
                        <div class="btn"><span class="material-icons star">star</span><span>4.0</span></div>
                    </div>
                    <p>
                        <?php echo $row['about']; ?><br><br>Release Date:
                        <?php echo "&nbsp".$row['releseDate']; ?> &nbsp &nbsp &nbsp Director:
                        <?php echo "&nbsp".$row['directorName']; ?>
                        <br><br> Duration:
                        <?php echo "&nbsp".$row['duration']; ?> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        &nbsp&nbsp Show Time:
                        <?php echo "&nbsp".$row['showTime']; ?>
                    </p>
                    <P>

                    </p>
                    <?php
                        echo '<form action="booking.php" method="post">
                        <input type="hidden" name="movieID" value="00">
                        <button type="submit" class="bookNow">BOOK NOW</button>
                        </form>';
                    ?>
    
                    <!-- <a href="booking.php" class="bookNow">Book now</a> -->
                </div>
                <div class="img-container" style="background: url('<?php echo $row['img']; ?>') no-repeat center center / cover;">
                </div>

            </div>

            <div class="show">
                <h1>New Release<span></span></h1>

                <div class="movie-container">

                    <?php
                        echo '<div class="list" style="background: url(' . $img1 . ') no-repeat center center /cover;"><a href="avatar.php"></a></div>';

                    ?>

                    <?php
                        echo '<div class="list" style="background: url(' . $img2 . ') no-repeat center center /cover;"><a href="nun.php"></a></div>';

                    ?>

                    <?php
                        echo '<div class="list" style="background: url(' . $img3 . ') no-repeat center center /cover;"><a href="javan.php"></a></div>';

                    ?>

                    <?php
                        echo '<div class="list" style="background: url(' . $img4 . ') no-repeat center center /cover;"><a href="spider.php"></a></div>';

                    ?>

                    <?php
                        echo '<div class="list" style="background: url(' . $img5 . ') no-repeat center center /cover;"><a href="aqua.php"></a></div>';

                    ?>
                </div>
            </div>

            <div class="show">
                <h1>Upcoming Movies<span></span></h1>

                <div class="movie-container tv">

                <?php
                        echo '<div class="list" style="background: url(' . $img10 . ') no-repeat center center /cover;"><a href="deadpool.php"></a></div>';

                    ?>

                    <?php
                    echo '<div class="list" style="background: url(' . $img11 . ') no-repeat center center /cover;"><a href="800.php"></a></div>';

                ?>
                
                <?php
                        echo '<div class="list" style="background: url(' . $img12 . ') no-repeat center center /cover;"><a href="venm.php"></a></div>';

                    ?>

                    <?php
                    echo '<div class="list" style="background: url(' . $img13. ') no-repeat center center /cover;"><a href="avenjers.php"></a></div>';

                ?>
                
                <?php
                        echo '<div class="list" style="background: url(' . $img14 . ') no-repeat center center /cover;"><a href="ring.php"></a></div>';

                    ?>

                </div>
            </div>
        </div>

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
    </footer>

    </div>

</body>

</html>