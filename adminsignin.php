<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //establish a MySQL connection
    $connection = mysqli_connect("localhost", "root", "", "moviehub");

    //verifying the connection
    if(!$connection){
        die("Connection failed : " . mysqli_connect_error());
    }

    $query = "SELECT adminID, email, password FROM admins WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    // Check if a row was returned
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            $_SESSION["adminID"] = $row["adminID"];
            header('Location: admin.html'); // Redirect to a dashboard page
        } else {
            $loginError = "Invalid Email or password.";
        }
    } else {
        $loginError = "Email not found";
    }

    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinemaPlex Administrator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/signin.css">
    

</head>

<body>

<div class="container">

<form id="signin-form" method="post" action="adminsignin.php">
    <h2>Admin Login</h2><br>
    <input type="text" id="signin-username" placeholder="Email" name="email" required>
    <input type="password" id="signin-password" placeholder="Password" name="password" required><br><br>
    <h3 id="h3"></h3>
    <button type="submit" name="submit">Login</button>
</form>
        </form>
    </div>

</body>

</html>    



