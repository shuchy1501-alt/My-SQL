
<?php
session_start();

if(isset($_POST["btn_submit"])){

    $email = $_POST["email"];
    $password = $_POST["password"];

    if($email == "admin@gmail.com" && $password == "12345"){

        $_SESSION["email"] = $email;
        $_SESSION["name"] = "Admin";

        header("Location: index1.php");
        exit();

    }else{
        $error = "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-md-5">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Admin Login</h3>
                </div>

                <div class="card-body">

                    <?php if(isset($error)){ ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>

                    <form method="post">

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Enter Email"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Enter Password"
                                   required>
                        </div>

                        <div class="d-grid">
                            <button type="submit"
                                    name="btn_submit"
                                    class="btn btn-primary">
                                Login
                            </button>
                        </div>

                    </form>

                </div>

                <div class="card-footer text-center text-muted">
                    PHP Session Login System
                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>

