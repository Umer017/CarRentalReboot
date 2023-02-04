<?php


include 'connection.php';

$id = $_GET['id'];

$RejectQuery = "update  triprecords set status = 'Rejected' where tripID = $id";
$perfrom = mysqli_query($connect,$RejectQuery);

if($perfrom)
{
    ?>
    <script>alert("Rejected")</script>
    <?php
    header('location:viewRecord.php');
}







?>