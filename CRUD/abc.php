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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student CRUD</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Student Management</h3>

            <a href="create.php" class="btn btn-light">
                Add Student
            </a>
        </div>

        <div class="card-body">

            <!-- Search Form -->
            <form method="GET" class="row g-3 mb-4">

                <div class="col-md-4">
                    <input
                        type="text"
                        name="sid"
                        class="form-control"
                        placeholder="Enter Student ID">
                </div>

                <div class="col-md-2">
                    <input
                        type="submit"
                        name="btn_search"
                        value="Search"
                        class="btn btn-success w-100">
                </div>

            </form>

            <?php

            if(isset($_GET['btn_search'])){

                if($founddata){
                    echo "<div class='alert alert-success'>Data Found</div>";
                }else{
                    echo "<div class='alert alert-danger'>Data Not Found</div>";
                }
            }
            ?>

            <!-- Search Result -->
            <?php if($founddata){ ?>

            <div class="card mb-4">

                <div class="card-header bg-info text-white">
                    Student Information
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th width="200">ID</th>
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

                </div>

            </div>

            <?php } ?>

            <!-- Student List -->

            <h4 class="mb-3">All Students</h4>

            <table class="table table-bordered table-striped table-hover">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>CGPA</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php

                $students = Student::all();

                

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
            <a href='edit.php?id=$student->id'
               class='btn btn-warning btn-sm'>
               Edit
            </a>

            <a href='delete.php?id=$student->id'
               class='btn btn-danger btn-sm'
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

        </div>

    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>