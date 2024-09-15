<?php

$connection = mysqli_connect("localhost", "root", "", "moviehub");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['movieID'])) {
    $movieID = $_POST['movieID'];

    
    $movieName = $_POST['movieName'];
    $genre = $_POST['genre'];
    $directorName = $_POST['directorName'];
    $releseDate = $_POST['releseDate'];
    $duration = $_POST['duration'];
    $showTime = $_POST['showTime'];
    $about = $_POST['about'];

    $target_dir = "upload_images/";
    $img = $target_dir . basename($_FILES['img']['name']);

    if (move_uploaded_file($_FILES['img']['tmp_name'], $img)){
        $query = "UPDATE movies SET movieName = '$movieName', genre = '$genre', directorName = '$directorName', releseDate = '$releseDate', duration = '$duration', showTime = '$showTime', about = '$about', img = '$img' WHERE movieID = $movieID";

    if (mysqli_query($connection, $query)) {
        echo "<h1>Movie updated successfully.</h1>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}else{
    echo "<h1>Sorry, there was an error uploading the image.</h1>";
}
} else {
   
     echo file_get_contents('modifymovie.php');
}

mysqli_close($connection);

?>
