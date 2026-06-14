<?php
try{
    $db= new mysqli("localhost","root","","schools");
    echo "data connect successfully";
}catch(\Throwable $th){
    echo $th->getMessage();

}
$data = $db->query("select * from student");
$student=$data->fetch_all(MYSQLI_ASSOC);
foreach($student as $value){
    print_r($value);
    echo $value["id"] . "<br>";
    echo $value["name"] . "<br>";
    echo $value["email"] . "<br>";
    echo $value["department"] . "<br>";
    echo $value["cgpa"] . "<br>";
}

?>