<?php

$connection = mysqli_connect("localhost", "root", "", "moviehub");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['movieID'])) {
    $movieID = $_POST['movieID'];

    
    $query = "DELETE FROM movies WHERE movieID = $movieID";

    if (mysqli_query($connection, $query)) {
        echo "<h1>Movie deleted successfully.</h1>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
    
    echo file_get_contents('deleteMovie.php');
}


mysqli_close($connection);
?>
