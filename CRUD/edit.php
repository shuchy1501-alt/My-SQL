
<?php

include_once "db_config.php";
include_once "student.php";

if(!isset($_GET['id'])){
    header("Location: abc.php");
    exit();
}

$id = (int)$_GET['id'];

$data = Student::find($id);

if(!$data){
    die("Student not found");
}

if(isset($_POST['btn_update'])){

    $student = new Student(
        $_POST['id'],
        $_POST['name'],
        $_POST['email'],
        $_POST['department'],
        $_POST['cgpa']
    );

    $student->update();

    header("Location: abc.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-warning">
                    <h3 class="mb-0">Edit Student</h3>
                </div>

                <div class="card-body">

                    <form method="post">

                        <input
                            type="hidden"
                            name="id"
                            value="<?= $data->id ?>">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="<?= $data->name ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="<?= $data->email ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <input
                                type="text"
                                name="department"
                                class="form-control"
                                value="<?= $data->department ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">CGPA</label>
                            <input
                                type="text"
                                name="cgpa"
                                class="form-control"
                                value="<?= $data->cgpa ?>"
                                required>
                        </div>

                        <button
                            type="submit"
                            name="btn_update"
                            class="btn btn-primary">
                            Update Student
                        </button>

                        <a href="abc.php"
                           class="btn btn-secondary">
                           Back
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
