<?php

include_once('connections/connection.php');
$con = connection();

//add

if(isset($_POST['submit'])){

    $fname =  $_POST['firstname'];
    $lname =  $_POST['lastname'];
    $age =  $_POST['age'];
    $gender =  $_POST['gender'];
    
    $sql = "INSERT INTO `employee_list`(`first_name`, `last_name`, `age`,`gender`) 
    VALUES ('$fname','$lname','$age','$gender')"; 

    $con->query($sql) or die ($con->error);

    echo header("Location: index.php");
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
        <form action="" method="post">
            <h3>Add new Employee Here</h3><br>
            <label>Firstname: </label>
            <input type="text" name="firstname" required> <br>

            <label>Lastname: </label>
            <input type="text" name="lastname" required> <br>

            <label>Age: </label>
            <input type="text" name="age" required> <br>

            <label>Gender: </label>
            <select name="gender" id="gender" required>
                <option value=""></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <br><br>

            <input class="submit" type="submit" name="submit" value="ADD">

        </form>
    <body>

   
    </body>
</html>