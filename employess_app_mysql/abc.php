<?php

session_start();

if(!isset($_SESSION["name"])){
    header("location:login.php");
    exit();
}

require_once "db_config.php";
include_once("employees.php");

$founddata = null;

if(isset($_GET["btn_submit"])){

    $id = trim($_GET["sid"]);

    if(!empty($id)){
        $founddata = employee::find($id);
    }
}

if(isset($_GET["deleteid"])){

    $id = $_GET["deleteid"];

    employee::delete($id);

    header("Location: abc.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees List</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">

    <a class="btn btn-warning  " href="createEmployees.php">Create Employee</a>
    <a class="btn btn-danger" href="logout.php">Logout</a>

    <div class="row mt-4">

        <div class="col-md-8">

            <h2>All Employees</h2>

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php

                $employees = employee::all();

                foreach($employees as $row){

                    echo "
                    <tr>
                        <td>{$row->id}</td>
                        <td>{$row->name}</td>
                        <td>{$row->phone}</td>
                        <td>{$row->department}</td>
                        <td>{$row->designation}</td>
                        <td>{$row->salary}</td>
                        <td>
                            <a class='btn btn-info btn-sm' href='update.php?id={$row->id}'>Edit</a>

                            <a class='btn btn-danger btn-sm'
                               onclick='return confirm(\"Are you sure?\")'
                               href='abc.php?deleteid={$row->id}'>
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

        <div class="col-md-4">

            <h3>Search Employee</h3>

            <form action="" method="GET">
                <input type="text" class="form-control mb-2" name="sid" placeholder="Enter Employee ID">

                <input type="submit" class="btn btn-success" name="btn_submit" value="Search">
            </form>

            <?php

            if(isset($_GET["btn_submit"])){

                if($founddata){
                    echo "<p class='text-success mt-2'>Data Found</p>";
                }else{
                    echo "<p class='text-danger mt-2'>Data Not Found</p>";
                }
            }

            ?>

            <table class="table table-bordered mt-3">

                <tr>
                    <th>ID</th>
                    <td><?php echo $founddata->id ?? ""; ?></td>
                </tr>

                <tr>
                    <th>Name</th>
                    <td><?php echo $founddata->name ?? ""; ?></td>
                </tr>

                <tr>
                    <th>Phone</th>
                    <td><?php echo $founddata->phone ?? ""; ?></td>
                </tr>

                <tr>
                    <th>Department</th>
                    <td><?php echo $founddata->department ?? ""; ?></td>
                </tr>

                <tr>
                    <th>Designation</th>
                    <td><?php echo $founddata->designation ?? ""; ?></td>
                </tr>

                <tr>
                    <th>Salary</th>
                    <td><?php echo $founddata->salary ?? ""; ?></td>
                </tr>

            </table>

        </div>

    </div>

</div>

</body>
</html>