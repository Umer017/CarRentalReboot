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
        <a href="adminHome.php" class="navbar-brand ml-5"><img src="images/Visual-Studio-Logo.png" alt="" style="width: 50px;"></a>
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
         <a class="nav-link " href="adminHome.php?id=" tabindex="-1" aria-disabled="true"><img src="images/user.png" alt="" style="width: 40px;" class="ml-3"></a>
        </li>
    </nav>
    <?php 
include 'connection.php';
$id =$_GET['carid'];
$selectQuery = "select*from carlisting where VID = $id";
$perform2 = mysqli_query($connect,$selectQuery);
$fetch = mysqli_fetch_assoc($perform2);

?>



    <div class="row">
    <div class="col-3"></div>
    <div class="6 col">
    <h1 style="text-align: center;" class="mb-5" >Add new car record</h1>
<form method="POST" enctype="multipart/form-data">
    <div class="row">
    <div class="col-md-5">
    <label for="">carname</label>
    <input type="text" class="form-control" name="carname" value="<?php echo $fetch['carname'];  ?>">
    </div>
    <div class="col-md-5">
    <label for="">Model Number</label>
    <input type="text" class="form-control" name="modelno" value="<?php echo $fetch['modelno'];  ?>">
    </div>
    </div>
    

    <div class="row">
    <div class="col-md-5">
    <label for="">Registration Number</label>
    <input type="text" class="form-control" name="noplate" value="<?php echo $fetch['noPlate'];  ?>">
    </div>
    <!-- <div class="col-md-5">
    <label for="">No Plate</label>
    <input type="text" class="form-control" name="carname">
    </div> -->
    </div>

    <div class="row">
    <div class="col-md-5">
    <label for="">Description</label>
    <input type="text" class="form-control" name="description" value="<?php echo $fetch['Discription'];  ?>">
    </div>
    <div class="col-md-5">
    <label for="">Year Of Manutfacturing</label>
    <input type="text" class="form-control" name="yearofmanufacturing" value="<?php echo $fetch['yearofmanufacruring'];  ?>">
    </div>
    </div>

    <div class="row">
    <div class="col-md-5">
    <label for="">image</label>
    <input type="file" class="form-control" name="image" value="<?php echo $fetch['image'];  ?>">
    </div>
    <div class="col-md-5">
    <label for="">Vechicle type</label>
    <input type="text" class="form-control" name="vehicletype" value="<?php echo $fetch['vehicletype'];  ?>">
    </div>
    </div> 

    <div class="row">
    <div class="col-md-5">     
    <label for="">Cost per KM</label>
    <input type="text" class="form-control" name="costperkm" value="<?php echo $fetch['costperkm'];  ?>">
    </div>
    <div class="col-md-5">
    <label for="">No of seats</label>
    <input type="text" class="form-control" name="noofseat" value="<?php echo $fetch['noofseats'];  ?>">
    </div>
    </div>

    <div class="row"> 
    <div class="col-md-5">
    <label for="">bootspace capacity</label>
    <input type="text" class="form-control" name="bootcapacity" value="<?php echo $fetch['bootcapacity'];  ?>">
    </div>
    <div class="col-md-5">
    <label for="">status</label>
    <input type="text" class="form-control" name="status" value="<?php echo $fetch['status'];  ?>">
    </div></div>
    <input type="submit" name="submit">
</form>
</div>
<div class="col-3"></div>
    </div>
</body>
</html>

<?php



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
    // $image =$_FILES['image'];


    // $imgname = $image['name'];
    // $filerror = $image['error'];
    // $temp_name = $image['tmp_name'];


    // $filedestination = 'images/'.$imgname;
    // move_uploaded_file($temp_name,$filedestination);

    $insertQuery = "update carlisting set carname='$carname',modelno='$modelno',noPlate='$noplate',Discription='$description',
    yearofmanufacruring='$yearofmanufacturing',vehicletype='$vehicletype',costperkm='$costperkm',noofseats=$noofseat,bootcapacity='$bootcapacity',status='$status' where VID = $id" ;

    $perform = mysqli_query($connect,$insertQuery);
    if($perform)
    {
        echo "added";
    }



    
}







?>