<?php

include_once "db_config.php";
include_once "student.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    Student::delete($id);
}

header("Location: abc.php");
exit();