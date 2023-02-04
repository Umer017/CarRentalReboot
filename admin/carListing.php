<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php' ?>
    <style><?php  include 'style.css' ?></style>
    <title>manage vehicle listing</title>
</head>
<body>
<nav class="nav">
        <a href="adminHome.php" class="navbar-brand ml-5"><img src="../images/Visual-Studio-Logo.png" alt="" style="width: 50px;"></a>
        <li class="nav-item">
            <a class="nav-link active" href="adminHome.php">home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="show.php" tabindex="-1" aria-disabled="true">Show records</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="deletecar.php" tabindex="-1" aria-disabled="true">delete record</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Categories
            </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Travel services</a></li>
              <li><a class="dropdown-item" href="#">Rental services</a></li>
              <!-- <li><hr class="dropdown-divider"></li> -->
              <li><a class="dropdown-item" href="#">view records</a></li>
            </ul>
          </li>
          <li class="nav-item ml-auto">
         <a class="nav-link " href="adminHome.php?id=" tabindex="-1" aria-disabled="true"><img src="../images/user.png" alt="" style="width: 40px;" class="ml-3"></a>
        </li>
    </nav>




    <div class="row">
    <div class="col-3"></div>
    <div class="6 col">
    <h1 style="text-align: center;" class="mb-5" >Add new car record</h1>
<form method="POST" enctype="multipart/form-data">
    <div class="row">
    <div class="col-md-5">
    <label for="">carname</label>
    <input type="text" class="form-control" name="carname">
    </div>
    <div class="col-md-5">
    <label for="">Model Number</label>
    <input type="text" class="form-control" name="modelno">
    </div>
    </div>
    

    <div class="row">
    <div class="col-md-5">
    <label for="">Registration Number</label>
    <input type="text" class="form-control" name="noplate">
    </div>
    <!-- <div class="col-md-5">
    <label for="">No Plate</label>
    <input type="text" class="form-control" name="carname">
    </div> -->
    </div>

    <div class="row">
    <div class="col-md-5">
    <label for="">Description</label>
    <input type="text" class="form-control" name="description">
    </div>
    <div class="col-md-5">
    <label for="">Year Of Manutfacturing</label>
    <input type="text" class="form-control" name="yearofmanufacturing">
    </div>
    </div>

    <div class="row">
    <div class="col-md-5">
    <label for="">image</label>
    <input type="file" class="form-control" name="image">
    </div>
    <div class="col-md-5">
    <label for="">Vechicle type</label>
    <input type="text" class="form-control" name="vehicletype">
    </div>
    </div> 

    <div class="row">
    <div class="col-md-5">     
    <label for="">Cost per KM</label>
    <input type="text" class="form-control" name="costperkm">
    </div>
    <div class="col-md-5">
    <label for="">No of seats</label>
    <input type="text" class="form-control" name="noofseat">
    </div>
    </div>

    <div class="row"> 
    <div class="col-md-5">
    <label for="">bootspace capacity</label>
    <input type="text" class="form-control" name="bootcapacity">
    </div>
    <div class="col-md-5">
    <label for="">status</label>
    <input type="text" class="form-control" name="status">
    </div></div>
    <input type="submit" name="submit">
</form>
</div>
<div class="col-3"></div>
    </div>
</body>
</html>

<?php

include 'connection.php';

if(isset($_POST['submit']))
{
    $carname = $_POST['carname'];
    $modelno = $_POST['modelno'];
    $noplate = $_POST['noplate'];
    $description = $_POST['description'];
    $yearofmanufacturing = $_POST['yearofmanufacturing'];
    $vehicletype = $_POST['vehicletype'];
    $costperkm = $_POST['costperkm'];
    $noofseat = $_POST['noofseat'];
    $bootcapacity = $_POST['bootcapacity'];
    $status = $_POST['status'];
    $image =$_FILES['image'];

    print_r($image) ;
    $imgname = $image['name'];
    $filerror = $image['error'];
    $temp_name = $image['tmp_name'];


    $filedestinationto = '../images/'.$imgname;
    $filedestination = 'images/'.$imgname;
    move_uploaded_file($temp_name,$filedestinationto);

    $insertQuery = "insert into carlisting(carname,modelno,noPlate,Discription,yearofmanufacruring,image,vehicletype,costperkm,noofseats,bootcapacity,status)
    values('$carname','$modelno','$noplate','$description','$yearofmanufacturing','$filedestination','$vehicletype','$costperkm',$noofseat,'$bootcapacity','$status')";

    $perform = mysqli_query($connect,$insertQuery);
    if($perform)
    {
        echo "added";
    }



    
}







?>