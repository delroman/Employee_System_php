<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once('connections/connection.php');
$con = connection();

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_user WHERE username = '$username' AND password = '$password'";

    //store result
    $user = $con->query($sql) or die($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if ($total > 0) {
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Access'] = $row['access'];

        echo header("Location: index.php");
    }
    else {
        echo "No user found.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <h1>Log in</h1>
    <br>
    <div class="login-container">
        <form action="" method="post">
            <h4>Please enter Username and Password</h4> <br>
            Username <br>
            <input type="text" name="username" id="username" required><br><br>
            Password <br>
            <input type="password" name="password" id="password" required><br><br><br>
            <button type="submit" name="login" id="login">Login</button>
            <h5 id="demo"></h5>
            <small><label id="text" style="color: red;"></label></small>
        </form>
    </div>

</body>

</html>