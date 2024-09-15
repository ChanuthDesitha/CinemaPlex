<?php

$connection = mysqli_connect("localhost", "root", "", "moviehub");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$movieID = $_POST['movieID'];
$movieName = $_POST['movieName'];
$genre = $_POST['genre'];
$director_Name = $_POST['directorName'];
$releseDate = $_POST['releseDate'];
$duration = $_POST['duration'];
$showTime = $_POST['showTime'];
$about = $_POST['about'];

$target_dir = "upload_images/";
$img = $target_dir . basename($_FILES['img']['name']);

if (move_uploaded_file($_FILES['img']['tmp_name'], $img)){
    $query = "INSERT INTO movies (movieID, movieName, genre , directorName , releseDate, duration, showTime, about, img) VALUES ('$movieID', '$movieName', '$genre', '$director_Name','$releseDate' ,'$duration' ,'$showTime','$about','$img')";

    if (mysqli_query($connection, $query)) {
        echo "<h1>Movie added successfully.</h1>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
    echo "<h1>Sorry, there was an error uploading the image.</h1>";
}

mysqli_close($connection);

?>