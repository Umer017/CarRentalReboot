<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'; include 'connection.php';?>
    <style><?php include 'style.css' ?></style>
    <title>Document</title>
</head>
<body>
<nav class="nav">
        <a href="userHome.php" class="navbar-brand ml-5"><img src="images/Visual-Studio-Logo.png" alt="" style="width: 50px;"></a>
        <li class="nav-item">
            <a class="nav-link active" href="adminHome.php">home</a>
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
              <!-- <li><hr class="dropdown-divider"></li> -->
              <li><a class="dropdown-item" href="#">view records</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="logout.php" tabindex="-1" aria-disabled="true">logout</a>
        </li>
          <li class="nav-item ml-auto">
         <a class="nav-link " href="adminProfile.php?id=" tabindex="-1" aria-disabled="true"><img src="images/user.png" alt="" style="width: 40px;" class="ml-3"></a>
        </li>
    </nav>



    <?php 

    
$selectAll = "select*from carlisting";
$perform = mysqli_query($connect,$selectAll);

?>
<div class="col-12">
<div class="row">
    <?php while($fetchData = mysqli_fetch_assoc($perform))
{
      ?>
<div class="card col-3">
<img class="card-img-top" src="<?php echo "../".$fetchData['image'] ?>" alt="Card image">
<div class="card-body">
<h4 class="card-title"><?php echo $fetchData['carname'].$fetchData['modelno'];  ?></h4>
<p class="card-text">No of seats:-<?php echo $fetchData['noofseats']; ?></p>
<p class="card-text">Cost per km<?php echo $fetchData['costperkm']; ?></p>
<a href="updateCarListing.php?carid=<?php echo $fetchData['VID']; ?>" class="btn btn-primary">updateCar</a>
</div>
</div>
<?php } ?>
</div>
</div>
</body>
</html>