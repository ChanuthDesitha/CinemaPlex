<?php

$connection = mysqli_connect("localhost", "root", "", "moviehub");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];

    
    $query = "DELETE FROM users WHERE userid = $userid";

    if (mysqli_query($connection, $query)) {
        echo "<h1>User deleted successfully.</h1>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
    
    echo file_get_contents('delete_user.php');
}


mysqli_close($connection);
?>
