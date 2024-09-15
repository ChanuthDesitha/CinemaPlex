<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/adduser.css">
    <title>Remove Movie</title>
</head>

<body>

    <h1>Remove Movie</h1>

    <form action="deletemovie.php" method="POST">
        <label for="movieID">Select a Movie For Remove:</label><br>
        <select name="movieID" required>
            <option value="">Select Movie</option>

            <?php
            
            $connection = mysqli_connect("localhost", "root", "", "moviehub");

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            
            $query = "SELECT movieID, movieName FROM movies";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['movieID']}'>{$row['movieName']}</option>";
                }
            }

            
            mysqli_close($connection);
            ?>

        </select><br><br>

        <button type="submit">Remove</button>

    </form>

</body>

</html>