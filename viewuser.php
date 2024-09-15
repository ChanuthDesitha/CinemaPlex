<?php

$connection = mysqli_connect("localhost", "root", "", "moviehub");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}



$query = "SELECT userid, first_name, last_name, email, gender, address, contact FROM users ";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h1>Users List</h1>";
    echo "<table border='2' style='color: white; background-color: gray;'>";
   
    
    echo "<tr><th>ID</th><th>FirstName</th><th>LastName</th><th>Email</th>
        <th>Gender</th><th>Address</th><th>ContactNo</th></tr>";


    while ($row = mysqli_fetch_assoc($result)) {
      
        
       echo "<tr><td>{$row['userid']}</td><td>{$row['first_name']}</td><td>{$row['last_name']}</td><td>{$row['email']}</td>
            <td>{$row['gender']}</td><td>{$row['address']}</td><td>{$row['contact']}</td></tr>";
    }
    

    echo "</table>";
} else {
    echo "<h1>No users found.</h1>";
}



mysqli_close($connection);
?>