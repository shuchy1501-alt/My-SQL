<?php

if(isset($_POST['submit'])){

    $num = $_POST['number'];
    $fact = 1;

    for($i = 1; $i <= $num; $i++){
        $fact = $fact * $i;
    }

    echo "Factorial of $num = $fact";
}

?>

<form method="post">
    <input type="number" name="number" placeholder="Enter Number" required>
    <input type="submit" name="submit" value="Calculate">
</form>