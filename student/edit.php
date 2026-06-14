<?php

include_once "db_config.php";
include_once "student.php";

$data = Student::find($_GET['id']);

if(isset($_POST['btn_update'])){

    $student = new Student(
        $_POST['id'],
        $_POST['name'],
        $_POST['email'],
        $_POST['department'],
        $_POST['cgpa']
    );

    $student->update();

    header("Location:abc.php");
}
?>

<form method="post">

<input type="hidden" name="id" value="<?= $data->id ?>">

Name:
<input type="text" name="name" value="<?= $data->name ?>"><br><br>

Email:
<input type="text" name="email" value="<?= $data->email ?>"><br><br>

Department:
<input type="text" name="department" value="<?= $data->department ?>"><br><br>

CGPA:
<input type="text" name="cgpa" value="<?= $data->cgpa ?>"><br><br>

<input type="submit" name="btn_update" value="Update">

</form>