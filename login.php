<?php 
ob_start();
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php' ?>
    <style>
        .form{
    padding-bottom: 100px;
    /* background-color: blue; */
     padding-top: 200px;
    /*padding-left: 150px; */
    /* background-color: #C1DEAE; */
}
.twt{

    color: white;
}
.nav{
    background-color: gray;
}
.nav a{
    color: black;
    text-decoration: solid 50px;
}

    </style>
    <title>Login</title>
</head>
<body style="background-image: url(images/black-bg3.jpg); background-size:cover;">
<nav class="nav sticky-top">
        <a href="MainPage.php" class="navbar-brand ml-5"><img src="images/Visual-Studio-Logo.png" alt="" style="width: 50px;"></a>
        <li class="nav-item">
            <a class="nav-link active" href="MainPage.php">home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">contact us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="show.php" tabindex="-1" aria-disabled="true">About us</a>
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
        <li class="nav-item  ml-auto btn btn-info">
            <a class="nav-link  " tabindex="-1" aria-disabled="true" href="admin/adminLogin.php" class="">Login as admin</a>
        </li>
    </nav>
<div class="row">
<div class="col-lg-3 col-12 left">
    <img src="" alt="" width="100%">
</div>
    <div class="col-lg-6 col-12 no-gutters fdiv p-4" >
    
    <form method="POST" class="form twt" action="<?php //htmlentities( $_SERVER['PHP_SELF']); ?>">
    <h2 style="text-align: left;"> User Login</h2>
<div class="form-group col-md-8">
  <label for="">email id</label>
  <input type="text" class="form-control" placeholder="Email id " name="email" required>
</div>

<div class="form-group col-md-8">
  <label for="inputCity">Password</label>
  <input type="password" class="form-control" id="" name="password" placeholder="Enter password" required>
</div>


<div class="form-group col-md-8">
<button type="submit" class="btn btn-primary" name="submit">submit</button>
<div class="" style="margin-left: auto;">don't have account ? <a href="signup.php">sign up here</a></div>
</div>
</form>

    </div>
    <div class="col-lg-3 col-12 right"></div>
    </div>

<footer class="page-footer font-small  darken-3 mt-5 bg-light">

<div class="container footer-copyright text-center ">

  <div class="row">

    <div class="col-md-12 py-5">
      <div class="mb-5 flex-center">

        <a class="fb-ic">
          <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
        </a>

        <a class="tw-ic">
          <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
        </a>

        <a class="gplus-ic">
          <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
        </a>

        <a class="li-ic">
          <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
        </a>

        <a class="ins-ic">
          <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
        </a>

        <a class="pin-ic">
          <i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
        </a>
      </div>
    </div>

  </div>

</div>




</footer>
</body>
</html>

<?php

include 'connection.php';

if(isset($_POST['submit']))
{
  // if(isset($_SESSION['userName']))
  // {
  //   header('location:MainPage.php');
  // }
            $Email = $_POST['email'];
            $password = $_POST['password'];

    $checkEmail = "select*from users where email = '$Email'";
    $perfrom = mysqli_query($connect,$checkEmail);
    $CountEmail = mysqli_num_rows($perfrom);

    if($CountEmail>0)
    {
        $Email_pass = mysqli_fetch_assoc($perfrom);
        $coded_pass = $Email_pass['Password'];
        $verify_decode= password_verify($password,$coded_pass);
        $_SESSION['userName']=$Email_pass['username'];
        $_SESSION['id']=$Email_pass['id'];
        if($verify_decode)
        {
        ?>

           <script>alert('login successful');</script>
           
        <?php

           header('location:userHome.php');
           ob_end_flush();
           
           

        }
        else
        {
            echo "password incorrect";
        }

    }
    else
    {
        echo "dont have account";
    }



}

?>