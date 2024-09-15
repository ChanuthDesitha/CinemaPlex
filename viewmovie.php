<?php

$connection = mysqli_connect("localhost", "root", "", "moviehub");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}



$query = "SELECT movieID, movieName, genre, directorName, releseDate, duration, showTime, about FROM movies ";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h1>Movies List</h1>";
    echo "<table border='2' style='color: white; background-color: gray;'>";

   
    
    echo "<tr><th>Movie ID</th><th>Movie Name</th><th>Genre</th><th>Director Name</th>
        <th>Relese Date</th><th>Duration</th><th>Show Time</th><th>About</th></tr>";


    while ($row = mysqli_fetch_assoc($result)) {
      
        
       echo "<tr><td>{$row['movieID']}</td><td>{$row['movieName']}</td><td>{$row['genre']}</td><td>{$row['directorName']}</td>
            <td>{$row['releseDate']}</td><td>{$row['duration']}</td><td>{$row['showTime']}</td><td>{$row['about']}</td></tr>";
    }
    

    echo "</table>";
} else {
    echo "<h1>No Movies found.</h1>";
}



mysqli_close($connection);
?>