<?php

include_once "db_config.php";
include_once "student.php";

$foundData = null;

if (isset($_GET["btn_submit"])) {

    $id = trim($_GET["sid"]);

    if ($id != "") {
        $foundData = Student::find($id);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Search</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-5">

    <div class="card shadow p-4">

        <h2 class="text-center mb-4">Search Student By ID</h2>

        <form method="GET">
            <div class="row">
                <div class="col-md-8">
                    <input type="number"
                           name="sid"
                           class="form-control"
                           placeholder="Enter Student ID"
                           required>
                </div>

                <div class="col-md-4">
                    <input type="submit"
                           name="btn_submit"
                           value="Search"
                           class="btn btn-primary w-100">
                </div>
            </div>
        </form>

        <hr>

        <?php if(isset($_GET["btn_submit"])): ?>

            <?php if($foundData): ?>

                <div class="alert alert-success">
                    Data Found
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td><?= $foundData->id ?></td>
                    </tr>

                    <tr>
                        <th>Name</th>
                        <td><?= $foundData->name ?></td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td><?= $foundData->email ?></td>
                    </tr>

                    <tr>
                        <th>Department</th>
                        <td><?= $foundData->department ?></td>
                    </tr>

                    <tr>
                        <th>CGPA</th>
                        <td><?= $foundData->cgpa ?></td>
                    </tr>
                </table>

            <?php else: ?>

                <div class="alert alert-danger">
                    Data Not Found
                </div>

            <?php endif; ?>

        <?php endif; ?>

    </div>

</div>

</body>
</html>