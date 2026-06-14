<?php
include_once "db_config.php";
include_once "student.php";

$founddata = null;

if(isset($_GET['btn_search'])){

    $id = trim($_GET['sid']);

    if(!empty($id)){
        $founddata = Student::find($id);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
</head>
<body>

<h2>Student List</h2>

<a href="create.php">Add Student</a>

<br><br>

<form method="GET">

    <input type="text"
           name="sid"
           placeholder="Enter Student ID">

    <input type="submit"
           name="btn_search"
           value="Search">

</form>

<?php

if(isset($_GET['btn_search'])){

    if($founddata){
        echo "<h3 style='color:green'>Data Found</h3>";
    }else{
        echo "<h3 style='color:red'>Data Not Found</h3>";
    }
}
?>

<?php if($founddata){ ?>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <td><?= $founddata->id ?></td>
</tr>

<tr>
    <th>Name</th>
    <td><?= $founddata->name ?></td>
</tr>

<tr>
    <th>Email</th>
    <td><?= $founddata->email ?></td>
</tr>

<tr>
    <th>Department</th>
    <td><?= $founddata->department ?></td>
</tr>

<tr>
    <th>CGPA</th>
    <td><?= $founddata->cgpa ?></td>
</tr>

</table>

<br><br>

<?php } ?>

<table border="1" cellpadding="10">

    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>CGPA</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

    <?php

    $students = Student::all();

    foreach($students as $student){

        echo "
        <tr>
            <td>$student->id</td>
            <td>$student->name</td>
            <td>$student->email</td>
            <td>$student->department</td>
            <td>$student->cgpa</td>

            <td>
                <a href='edit.php?id=$student->id'>Edit</a> |

                <a href='delete.php?id=$student->id'
                onclick='return confirm(\"Are you sure?\")'>
                Delete
                </a>
            </td>
        </tr>
        ";
    }

    ?>

    </tbody>

</table>

</body>
</html>