<?php

$connection = mysqli_connect("localhost", "root", "", "moviehub");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}



$query = "SELECT bookingID, userid, movieID, ticketCount, seatID FROM booking ";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h1>Booking List</h1>";
    echo "<table border='2' style='color: white; background-color: gray;'>";

   
    
    echo "<tr><th>Booking ID</th><th>User ID</th><th>Movie ID</th><th>Ticket Count</th>
        <th>Seat ID</th></tr>";


    while ($row = mysqli_fetch_assoc($result)) {
      
        
       echo "<tr><td>{$row['bookingID']}</td><td>{$row['userid']}</td><td>{$row['movieID']}</td><td>{$row['ticketCount']}</td>
            <td>{$row['seatID']}</td></tr>";
    }
    

    echo "</table>";
} else {
    echo "<h1>No Booking found.</h1>";
}



mysqli_close($connection);
?>