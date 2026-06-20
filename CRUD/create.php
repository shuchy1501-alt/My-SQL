
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Add Student</h3>
                </div>

                <div class="card-body">

                    <form method="post">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <input type="text"
                                   name="department"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">CGPA</label>
                            <input type="text"
                                   name="cgpa"
                                   class="form-control"
                                   required>
                        </div>

                        <button type="submit"
                                name="btn_save"
                                class="btn btn-success">
                            Save Student
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
