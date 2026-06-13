<?php 
try {
   $db = new mysqli("localhost", "root", "","HR");
} catch (\Throwable $th) {
   echo  $th->getMessage();
}







?>