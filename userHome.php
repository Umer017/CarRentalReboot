<?php session_start(); 

if(!isset($_SESSION['userName']))
{
  header('location:login.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'; include 'connection.php';?>
    <style><?php include 'style.css'; ?></style>
    <title>GetOnRent</title>
</head>
<?php
$id = $_SESSION['id'];
$selectQuery = "select*from users where id =$id ";
$perfrom=mysqli_query($connect,$selectQuery);
$fetch = mysqli_fetch_assoc($perfrom); 
?>
<body class="bg1">
<nav class="nav">
        <a href="userHome.php" class="navbar-brand ml-5"><img src="images/Visual-Studio-Logo.png" alt="" style="width: 50px;"></a>
        <li class="nav-item">
            <a class="nav-link active" href="userHome.php">home</a>
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
         <a class="nav-link " href="userProfile.php?id=<?php echo $id ?>" tabindex="-1" aria-disabled="true"><?php echo $_SESSION['userName']; ?><img src="images/user.png" alt="" style="width: 40px;" class="ml-3"></a>
        </li>
  </nav>

  <div id="carouselExampleIndicators" class="carousel slide pb-5 pt-5" data-ride="carousel" >
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/RollsC.htm" alt="First slide" height="500px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/slide-img1triber.jpg" alt="Second slide" height="500px">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/altobg.jpg" alt="Third slide" height="500px">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>






    <?php 
    $selectAll = "select*from carlisting";
    $perform = mysqli_query($connect,$selectAll);
    $count =1;
   ?>
   <div class="col-12">
   <h4 class="twt">Trending :-</h4>
    <div class="row">
        <?php while($fetchData = mysqli_fetch_assoc($perform))
    {
      if($count<=4)
      {
          ?>
          
    <div class="card col-lg-3 bg3 col-md-6 col-12 mb-1 ">
  <img class="card-img-top" src="<?php echo $fetchData['image'] ?>" alt="Card image">
  <div class="card-body">
    <h4 class="card-title" style="text-decoration: solid 500px;"><?php echo $fetchData['carname'].$fetchData['modelno'];  ?></h4>
    <p class="card-text">No of seats:-<?php echo $fetchData['noofseats']; ?></p>
    <p class="card-text">Cost per km<?php echo $fetchData['costperkm']; ?></p>
    <a href="carDetails.php?carid=<?php echo $fetchData['VID']; ?>" class="btn btn-outline-primary btn-lg btn-block">Get on rent</a>
  </div>
    </div>
    
    <?php }
  if($count>=4 && $count<8)
  {
?>

<div class="card col-lg-3 bg3 col-md-6 col-6 mt-5">
  <img class="card-img-top" src="<?php echo $fetchData['image'] ?>" alt="Card image">
  <div class="card-body">
    <h4 class="card-title txt-b"><?php echo $fetchData['carname'].$fetchData['modelno'];  ?></h4>
    <p class="card-text txt-b">No of seats:-<?php echo $fetchData['noofseats']; ?></p>
    <p class="card-text txt-b">Cost per km<?php echo $fetchData['costperkm']; ?></p>
    <a href="carDetails.php?carid=<?php echo $fetchData['VID']; ?>" class="btn btn-outline-primary btn-lg btn-block">Get on rent</a>
  </div>
    </div>

<?php
 }
 if($count>8)
 {
   ?>

<div class="row">
<div class="card col-lg-4 bg3 col-md-6 col-6 mt-5">
  <div class="card-header">Featured</div>
  <img class="card-img-top" src="<?php echo $fetchData['image'] ?>" alt="Card image">
  <div class="card-body">
    <h4 class="card-title"><?php echo $fetchData['carname'].$fetchData['modelno'];  ?></h4>
    <p class="card-text">No of seats:-<?php echo $fetchData['noofseats']; ?></p>
    <p class="card-text ">Cost per km<?php echo $fetchData['costperkm'];  ?></p>
    <a href="carDetails.php?carid=<?php echo $fetchData['VID']; ?>" class="btn btn-outline-primary btn-lg btn-block">Get on rent</a>
    
  </div>
    </div>
    <div class="card col-lg-8 col-12 mt-5">
  <div class="card-header">
    Our Clients 
  </div>
  <div class="card-body">
    <div class="row mb-2"><img src="images/CartoonProfile.webp" alt="" class="col-lg-1 col-4 rounded-circle">
    <blockquote class="blockquote mb-1 col-lg-10 col-8">
      <p>"Exactly right! Keep it up. Excellent Keep up the good work."</p>
      <footer class="blockquote-footer">Kakashi Hatake </footer>
    </blockquote>
    </div>
    <div class="row mb-2"><img src="images/CartoonProfile.webp" alt="" class="col-lg-1 col-4 rounded-circle">
    <blockquote class="blockquote mb-1 col-lg-10 col-8">
      <p>“Winning doesn't always mean being first. Winning means you're doing better than you've
done before.”</p>
      <footer class="blockquote-footer">Gol D roger</footer>
    </blockquote>
    </div>
    <div class="row mb-2"><img src="images/CartoonProfile.webp" alt="" class="col-lg-1 col-4 rounded-circle">
    <blockquote class="blockquote mb-1 col-lg-10 col-8">
      <p>“Keep your face to the sunshine and you cannot see a shadow.”</p>
      <footer class="blockquote-footer">Mike</footer>
    </blockquote>
    </div>
    
  </div>
</div>
</div>

<?php
}
 $count++; 
  } ?>
</div>
</div>
 


    <footer class="page-footer font-small  darken-3 mt-5 bg-footer-color">
<div class="container">
  <div class="row">
    <div class="col-md-12 py-5">
      <div class="mb-5 flex-center">
        <a class="fb-ic"> <!--fb-->
          <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
        </a>
        <a class="tw-ic"> <!--twitter-->
          <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
        </a>
        <a class="gplus-ic"> <!-- Google +-->
          <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
        </a>
        <a class="li-ic">  <!--Linkedin -->
          <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
        </a>
        <a class="ins-ic"> <!--Instagram-->
          <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
        </a>
        <a class="pin-ic"> <!--Pinterest-->
          <i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
        </a>
      </div>
    </div>

  </div>


</div>

<div class="footer-copyright text-center py-3">© 2020 Copyright:
  <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
</div>

</footer>
</body>
</html>