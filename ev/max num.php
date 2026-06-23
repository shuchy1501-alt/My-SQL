<?php

if(isset($_POST['submit'])){

    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];

    if($a >= $b && $a >= $c){
        echo "Largest Number = ".$a;
    }
    elseif($b >= $a && $b >= $c){
        echo "Largest Number = ".$b;
    }
    else{
        echo "Largest Number = ".$c;
    }
}

?>

<form method="post">

    <input type="number" name="a" placeholder="First Number" required><br><br>

    <input type="number" name="b" placeholder="Second Number" required><br><br>

    <input type="number" name="c" placeholder="Third Number" required><br><br>

    <input type="submit" name="submit" value="Find Max">

</form>