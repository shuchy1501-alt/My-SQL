<?php 
try {
   $db = new mysqli("localhost", "root", "","schools");
} catch (\Throwable $th) {
   echo  $th->getMessage();
}







?>