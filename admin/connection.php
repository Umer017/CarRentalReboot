<?php

$username ="root";
$password ="";
$server = "localhost";
$db = "carrentalreboot";

$connect = mysqli_connect($server,$username,$password,$db);

if($connect)
{
    // echo "success";
}
else{
    echo "failed";
}






?>