<?php

$server="localhost";
$username="root";
$password="";
$db="photogallery";

//connection

$connection0=mysqli_connect($server,$username,$password,$db);

//connection check

if(!$connection0){
    die("Connection failed: " . mysqli_connect_error()); 
    echo "database not connected!";
}
// if($connection0){
//     echo "connected!";
// }


?>