<?php

include_once('connections/connection.php');
$con = connection();
$id = $_GET['ID'];

//add

if(isset($_POST['submit'])){

    $fname =  $_POST['firstname'];
    $lname =  $_POST['lastname'];
    $age =  $_POST['age'];
    $gender =  $_POST['gender'];
    
    $sql = "UPDATE `employee_list` SET first_name = '$fname',last_name = '$lname', age = '$age', gender = '$gender' WHERE id = '$id'";

    $con->query($sql) or die ($con->error);

    echo header("Location: details.php?ID=".$id);
}

//query database 

$sql = "SELECT * FROM employee_list WHERE id = '$id'";
$employee = $con->query($sql) or die($con->error);
$row = $employee->fetch_assoc();

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
            <h3>Edit Details</h3><br>
            <label>Firstname: </label>
            <input type="text" name="firstname" value="<?php echo $row['first_name'];?>"> 
            <br>

            <label>Lastname: </label>
            <input type="text" name="lastname" value="<?php echo $row['last_name'];?>">
             <br>

            <label>Age: </label>
            <input type="text" name="age" value="<?php echo $row['age'];?>">
             <br>

            <label>Gender: </label>
            <select name="gender" id="gender" value="<?php echo $row['gender'];?>">
                <option value=""></option>
                <!-- shorthand if statement -->
                <option value="Male" <?php echo ($row['gender'] == "Male")? 'selected' : '';?>    
                >Male</option>
                <option value="Female" <?php echo ($row['gender'] == "Female")? 'selected' : '';?>
                >Female</option>
            </select>
            <br><br>

            <input class="submit" type="submit" name="submit" value="Update">

        </form>
    <body>

   
    </body>
</html>