<?php
include_once "db_config.php";
include_once "employees.php";

$data = null;

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $data = employee::find($id);
}

if(isset($_POST["btn_submit"])){

    $id = $_POST["id"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];

    $department = isset($_POST["department"])
        ? implode(", ", $_POST["department"])
        : "";

    $designation = $_POST["designation"];
    $salary = $_POST["salary"];

    $employee = new employee(
        $id,
        $name,
        $phone,
        $department,
        $designation,
        $salary
    );

    $employee->update();

    header("location:abc.php");
    exit();
}

$departments = explode(",", $data->department ?? "");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">

            <a class="btn btn-primary mb-3" href="abc.php">
                Manage Employees
            </a>

            <form action="" method="post">

                <input
                    type="hidden"
                    name="id"
                    value="<?php echo $data->id ?? ''; ?>"
                >

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input
                        class="form-control"
                        type="text"
                        name="name"
                        value="<?php echo $data->name ?? ''; ?>"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input
                        class="form-control"
                        type="text"
                        name="phone"
                        value="<?php echo $data->phone ?? ''; ?>"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Department</label>
                    <br>

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="department[]"
                        value="CSE"
                        <?php echo in_array("CSE", array_map('trim', $departments)) ? 'checked' : ''; ?>
                    >
                    CSE

                    <input
                        class="form-check-input ms-3"
                        type="checkbox"
                        name="department[]"
                        value="EEE"
                        <?php echo in_array("EEE", array_map('trim', $departments)) ? 'checked' : ''; ?>
                    >
                    EEE
                </div>

                <div class="mb-3">
                    <label class="form-label">Designation</label>
                    <input
                        class="form-control"
                        type="text"
                        name="designation"
                        value="<?php echo $data->designation ?? ''; ?>"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Salary</label>
                    <input
                        class="form-control"
                        type="text"
                        name="salary"
                        value="<?php echo $data->salary ?? ''; ?>"
                    >
                </div>

                <input
                    class="btn btn-success"
                    type="submit"
                    name="btn_submit"
                    value="Update Employee"
                >

            </form>

        </div>
    </div>
</div>

</body>
</html>