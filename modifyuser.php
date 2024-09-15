<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/adduser.css">
    <title>Update User</title>
</head>

<body>

    <h1>Update User</h1>

    <form action="edituser.php" method="POST">

        <label for="first_name">First name:</label>
        <input type="text" id="first_name" name="first_name" placeholder="Enter First name" required><br>

        <label for="Last_name">Last name:</label>
        <input type="text" id="last_name" name="last_name" placeholder="Enter Last name" required><br><br>

        Gender: &nbsp; &nbsp; Male 
        <input type="radio" name="gender" value="Male" required> 
        Female 
        <input type="radio" name="gender" value="Female" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" placeholder="Enter address" required><br>

        <label for="contact">Contact No:</label>
        <input type="number" id="contact" name="contact" placeholder="Enter contact no" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter Password" required><br>

        <br>
        <button type="submit">Add</button>

    </form>
</body>

</html>