<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/adduser.css">
    <title>Remove User</title>
</head>

<body>

    <h1>Remove User</h1>

    <form action="delete.php" method="POST">
        <label for="userid">Select a User For Remove:</label><br>
        <select name="userid" required>
            <option value="">Select User</option>

            <?php
            
            $connection = mysqli_connect("localhost", "root", "", "moviehub");

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            
            $query = "SELECT userid, first_name, last_name FROM users";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['userid']}'>{$row['first_name']} {$row['last_name']}</option>";
                }
            }

            
            mysqli_close($connection);
            ?>

        </select><br><br>

        <button type="submit">Remove</button>

    </form>

</body>

</html>