<?php

session_start();

$connection = mysqli_connect("localhost", "root", "", "moviehub");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];

    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    
    $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', gender = '$gender',
     address = '$address', contact = '$contact', password = '$password' WHERE userid = $userid";

    if (mysqli_query($connection, $query)) {
        echo "<body style=' background-color:  #161e40; margin-top: 300px; text-align: center;'><h1 style='color: white; font-size: 32px;'>User updated successfully.</h1>
        <br><br><br>
        <h3><a href='userdetails.php' style='color: tomato; font-size: 28px; text-decoration: none; font-weight: bold;'>Back</a></h3>
        </body>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
   
    echo file_get_contents('modifyuser.php');
}

mysqli_close($connection);

?>
