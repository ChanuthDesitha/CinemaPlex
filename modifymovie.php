<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/adduser.css">
    <title>Modify Movies</title>
</head>

<body>

    <h1>Modify Movies</h1>

    <form action="edit.php" method="POST" enctype="multipart/form-data">

        <label for="movie_ID">Select a Movie:</label>
        <select name="movie_ID" required>
            <option value="">Select Movie</option>

            <?php
            
            $connection = mysqli_connect("localhost", "root", "", "moviehub");

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

        
            $query = "SELECT movieID, movieName FROM movies ";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['movieID']}'>{$row['movieName']}</option>";
                }
            }

            mysqli_close($connection);
            ?>

        </select><br>

        <label for="movieID">Movie ID:</label>
        <input type="number" id="movieID" name="movieID" placeholder="Enter movieID"  required><br>

        <label for="movieName">Movie Name:</label>
        <input type="text" id="movieName" name="movieName" placeholder="Enter movieName" ><br>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" placeholder="Enter genre"><br>
        
        <label for="directorName">Director Name:</label>
        <input type="text" id="directorName" name="directorName" placeholder="Enter directorName"><br>

        <label for="releseDate">Relese Date No:</label>
        <input type="date" id="releseDate" name="releseDate" placeholder="Enter releseDate no"><br>

        <label for="duration">Duration:</label>
        <input type="text" id="duration" name="duration" placeholder="Enter Duration" required><br>

        <label for="showTime">Show Time:</label>
        <input type="text" id="showTime" name="showTime" placeholder="Enter Show Time" required><br>

        <label for="about">about:</label>
        <input type="text" id="about" name="about" placeholder="Enter about"><br>

        <label for="img">Image:</label>
        <input type="file" id="img" name="img" required><br>

        <br>
        <button type="submit">Add</button>

    </form>
</body>

</html>