<?php

$connection = mysqli_connect("localhost", "root", "", "movieHub");



if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$query = "INSERT INTO users (first_name, last_name, email , gender , address,contact ,password) VALUES ('$first_name', '$last_name', '$email', '$gender','$address','$contact','$password')";

if (mysqli_query($connection, $query)) {
    header('Location: signin.php');
  
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>
