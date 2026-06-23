<?php

if(isset($_POST['submit'])){

    $mark = $_POST['mark'];

    if($mark >= 80){
        echo "Grade A+";
    }
    elseif($mark >= 70){
        echo "Grade A";
    }
    elseif($mark >= 60){
        echo "Grade A-";
    }
    elseif($mark >= 50){
        echo "Grade B";
    }
    elseif($mark >= 40){
        echo "Grade C";
    }
    elseif($mark >= 33){
        echo "Grade D";
    }
    else{
        echo "Grade F";
    }
}

?>

<form method="post">
    <input type="number" name="mark" placeholder="Enter Marks" required>
    <input type="submit" name="submit" value="Show Grade">
</form>