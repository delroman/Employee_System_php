<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin'])) {
    echo "Welcome " . $_SESSION['UserLogin'];
} else {
    echo "Welcome Guest";
}


include_once('connections/connection.php');

$con = connection();

//add

if (isset($_POST['submit'])) {

    $fname =  $_POST['firstname'];
    $lname =  $_POST['lastname'];
    $age =  $_POST['age'];
    $gender =  $_POST['gender'];

    $sql = "INSERT INTO `employee_list`(`first_name`, `last_name`, `age`,`gender`) 
    VALUES ('$fname','$lname','$age','$gender')";

    $con->query($sql) or die($con->error);

    echo header("Location: index.php");
}

//query database 

$sql = "SELECT * FROM employee_list ORDER BY  id DESC";
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

<body>

    <h1>Employee Management System</h1>

    <!-- SEARCH  -->
    <form action="result.php" method="get">
        <input type="text" name="search" id="search">
        <button type="submit">Search</button>
    </form>

    <?php if (isset($_SESSION['UserLogin'])) { ?>
        <a href="logout.php">Logout</a>
    <?php } else { ?>
        <a href="login.php">Login</a>
    <?php } ?>

    &nbsp;<a href="add.php">Add New</a>

    <div class=main-container>
        <div class=items-container>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- do while loop -->
                    <?php do {; ?>
                        <tr>
                            <td><a href="details.php?ID=<?php echo $row['id']; ?>">View</a></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                        </tr>
                    <?php } while ($row = $employee->fetch_assoc()); ?>
                </tbody>
            </table>
        </div>
        <!-- <div class=actions-container>
            <form action="" method="post">
                <h3>Add new Employee</h3><br>
                <label>Firstname: </label>
                <input type="text" name="firstname"> <br>

                <label>Lastname: </label>
                <input type="text" name="lastname"> <br>

                <label>Age: </label>
                <input type="text" name="age"><br>

                <label>Gender: </label>
                <select name="gender" id="gender">
                    <option value=""></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <br><br>
                <input class="submit" type="submit" name="submit" value="ADD">
            </form> -->
    </div>

    </div>


</body>

</html>