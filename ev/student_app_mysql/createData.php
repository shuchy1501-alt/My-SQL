<?php 
include_once "db_config.php";
include_once "student.php";

$errors = [];

if(isset($_POST["btn_submit"])){

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $department = trim($_POST["department"]);
    $cgpa = trim($_POST["cgpa"]);

    if($name == ""){
        $errors["name"] = "Please give a name";
    }

    if($email == ""){
        $errors["email"] = "Please give an email";
    }

    if($department == ""){
        $errors["department"] = "Please give department";
    }

    if($cgpa == ""){
        $errors["cgpa"] = "Please give cgpa";
    }

    if(empty($errors)){
        $student = new Student(null, $name, $email, $department, $cgpa);
        $success = $student->create();

        if($success){
            header("Location: abc.php");
            exit();
        } else {
            echo "Insert failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Create Student</h4>
                </div>

                <div class="card-body">

                    <form method="post">

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control">
                            <small class="text-danger">
                                <?= $errors["name"] ?? "" ?>
                            </small>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                            <small class="text-danger">
                                <?= $errors["email"] ?? "" ?>
                            </small>
                        </div>

                        <!-- Department -->
                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <input type="text" name="department" class="form-control">
                            <small class="text-danger">
                                <?= $errors["department"] ?? "" ?>
                            </small>
                        </div>

                        <!-- CGPA -->
                        <div class="mb-3">
                            <label class="form-label">CGPA</label>
                            <input type="text" name="cgpa" class="form-control">
                            <small class="text-danger">
                                <?= $errors["cgpa"] ?? "" ?>
                            </small>
                        </div>

                        <button type="submit" name="btn_submit" class="btn btn-success w-100">
                            Save Student
                        </button>

                        <a href="abc.php" class="btn btn-secondary w-100 mt-2">
                            Back
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>