<?php

include_once "db_config.php";
include_once "student.php";

if(isset($_POST['btn_save'])){

    $student = new Student(
        "",
        $_POST['name'],
        $_POST['email'],
        $_POST['department'],
        $_POST['cgpa']
    );

    $student->save();

    header("Location: abc.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
</head>
<body>

<h2>Add Student</h2>

<form method="post">

    Name:<br>
    <input type="text" name="name"><br><br>

    Email:<br>
    <input type="email" name="email"><br><br>

    Department:<br>
    <input type="text" name="department"><br><br>

    CGPA:<br>
    <input type="text" name="cgpa"><br><br>

    <input type="submit" name="btn_save" value="Save">

</form>

</body>
</html>