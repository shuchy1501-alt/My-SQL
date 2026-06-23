
<?php
session_start();

if(!isset($_SESSION["email"])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-body text-center">

            <h2 class="text-success">
                Welcome, <?php echo $_SESSION["name"]; ?>
            </h2>

            <p><?php echo $_SESSION["email"]; ?></p>

            <form action="logout.php" method="post">
                <button class="btn btn-danger">
                    Logout
                </button>
            </form>

        </div>
    </div>

</div>

</body>
</html>

