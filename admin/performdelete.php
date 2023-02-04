<?php

include 'connection.php';

$id = $_GET['carid'];

$deleteQuery = "delete from carlisting where VID = $id";
$perfrom =mysqli_query($connect,$deleteQuery);

if($perfrom)
{
    header('location:deletecar.php');
}
else{

}




?>