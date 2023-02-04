<?php session_start(); ?>
<!DOCTYPE html>
<html>
<title>ADMIN</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php  include 'links.php' ;

     include 'connection.php';
?>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
<?php include 'style.css' ?>
</style>
<body class="w3-light-grey">




<nav class="nav">
<a href="userHome.php" class="navbar-brand ml-5"><img src="images/Visual-Studio-Logo.png" alt="" style="width: 50px;"></a>
        <li class="nav-item">
            <a class="nav-link active" href="#">home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="show.php" tabindex="-1" aria-disabled="true">Show records</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Categories
            </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Travel services</a></li>
              <li><a class="dropdown-item" href="#">Rental services</a></li>
              <li><a class="dropdown-item" href="#">view records</a></li>
            </ul>
          </li>

          <li class="nav-item ml-auto">
            <a class="nav-link " href="userProfile.php?id=" tabindex="-1" aria-disabled="true"><img src="images/user.png" alt="" style="width: 40px;" class="ml-3"></a>
        </li>
</nav>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-top:30px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <a href="carListing.php"><div class="w3-left"><i class="fa fa-car w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>ADD</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Add car rental records</h4></a>
      </div>
    </div>
    <?php 
    
    $checkrec1 = "select*from carlisting";
    $perfrom1 = mysqli_query($connect,$checkrec1);
    $rowsnum1 = mysqli_num_rows($perfrom1);

    
    ?>
    <div class="w3-quarter h-off">
      <div class="w3-container w3-blue w3-padding-16">
       <a href="deletecar.php"> <div class="w3-left"><i class="fa fa-trash w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $rowsnum1 ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>delete car rental records</h4></a>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <a href="updateCar.php"><div class="w3-left"><i class="fa fa-pencil w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $rowsnum1 ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>update car rental records</h4></a>
      </div>
    </div>
    <?php 
    
    $checkrec = "select*from triprecords";
    $perfrom = mysqli_query($connect,$checkrec);
    $rowsnum = mysqli_num_rows($perfrom);

    
    ?>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
      <a href="viewRecord.php"> <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $rowsnum; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Manage car rental records</h4></a>
      </div>
    </div>
  </div>
<?php


$selectQuery ="select*from feedbacks";
$perfromfeedbacks = mysqli_query($connect,$selectQuery);


?>
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
    <h5>Feedbacks</h5>
      <div class="w3-twothird">
        <?php while($fetchfeedbacks = mysqli_fetch_assoc($perfromfeedbacks)){?>
    
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><?php echo $fetchfeedbacks['Customer']; ?><i class="fa fa-user w3-text-blue w3-large"></i></td>
            <td><?php echo $fetchfeedbacks['Subject']; ?></td>
            <td><?php echo $fetchfeedbacks['Querie']; ?></td>
          </tr>
        </table>
        <?php } ?>
      </div>
    </div>
  </div>
  <hr>

</div>


</body>
</html>
