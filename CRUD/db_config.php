<?php

try{

    $db = new mysqli(
        "localhost",
        "root",
        "",
        "schools"
    );

    if($db->connect_error){
        die("Connection Failed : " . $db->connect_error);
    }

}catch(Throwable $th){

    die($th->getMessage());

}
?>