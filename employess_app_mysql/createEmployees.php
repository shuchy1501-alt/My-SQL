<?php

include_once "db_config.php";
include_once "employees.php";

$errors = [];

if(isset($_POST['btn_submit'])){

    $id = 1;
    $name = $_POST["name"];
    $phone = $_POST["phone"];

    $department = isset($_POST['department'])
        ? implode(", ", $_POST['department'])
        : "";

    $designation = $_POST["designation"];
    $salary = $_POST["salary"];

    if($name == ""){
        $errors["name"] = "Name must have given value";
    }

    if(!count($errors)){

        $employee = new employee(
            $id,
            $name,
            $phone,
            $department,
            $designation,
            $salary
        );

        $success = $employee->save();

        header("location:abc.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</head>
<body>
    <div class="container mt-5">
         <div class="row">
             <div class="col-lg-12">

        <a class="btn btn-primary" href="abc.php">Manage Employees</a>
    
    <form action="" method="post">
       <!-- <div>
         <label class="form-label" for="id">ID</label> <br>
          <input class="form-control" type="text" name="id" id="id">
          <span style="color:red"><?php //echo isset($errors["id"]) ? "{$errors["id"]}":"" ?> </span> 
       </div> -->
       <div>
         <label  class="form-label"for="name">Name</label> <br>
          <input class="form-control" type="text" name="name" id="">
       </div>
       <div>
         <label class="form-label"  for="phone">Phone</label> <br>
          <input  class="form-control" type="text" name="phone" id="">
       </div>
      <div>
    
    <label for="department">Department</label><br>

    <input class="form-check-input" type="checkbox" name="department[]" value="CSE">
    CSE

    <input class="form-check-input" type="checkbox" name="department[]" value="EEE">
    EEE
</div>
        
       <div>
         <label class="form-label" for="designation">Designation</label> <br>
          <input class="form-control" type="text" name="designation" id="designation">
       </div>
       <div>
         <label class="form-label" for="salary">Salary</label> <br>
          <input class="form-control" type="text" name="salary" id="salary">
       </div>
        <div>
        
          <input class="btn btn-primary mt-2" type="submit" name="btn_submit" >
       </div>

    </form>
   

        </div>
         </div>
    </div>
</body>
</html>