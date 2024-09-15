<?php

$connection = mysqli_connect("localhost", "root", "", "movieHub");



if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$adminID = $_POST['adminID'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$query = "INSERT INTO admins (adminID, email, password) VALUES ('$adminID', '$email', '$password')";

if (mysqli_query($connection, $query)) {
    header('Location: adminsignin.php');
  
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>
