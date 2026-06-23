<?php

if(isset($_POST["number"])){

    $num = $_POST["number"];
    $isPrime = true;

    if($num <= 1){
        $isPrime = false;
    }else{
        for($i = 2; $i < $num; $i++){
            if($num % $i == 0){
                $isPrime = false;
                break;
            }
        }
    }

    echo $isPrime ? "Prime Number" : "Not Prime Number";
}

?>

<form method="post">
    <input type="number" name="number" required>
    <input type="submit" name="submit">
</form>