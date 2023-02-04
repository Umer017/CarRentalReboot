<?php
include 'connection.php';

$id = $_GET['id'];


$updateQuery = "update triprecords set status = 'Accepted' where tripID='$id'";
$perfrom = mysqli_query($connect,$updateQuery);

if($perfrom)
{
    ?>
    <script>alert("Accepted")</script>
    <?php
    header('location:viewRecord.php');
}


?>