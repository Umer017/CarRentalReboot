<?php

ob_start();
//session_start();?>

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
    background-color: blue;
    padding-top: 200px;
    padding-left: 150px;
    background-color: #C1DEAE;
}
.left{
    background-color: #219F94;
}
.right{
    background-color: #F2F5C8;
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
<body>
<nav class="nav sticky-top">
        <a href="MainPage.php" class="navbar-brand ml-5"><img src="../images/Visual-Studio-Logo.png" alt="" style="width: 50px;"></a>
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
              <!-- <li><hr class="dropdown-divider"></li> -->
              <li><a class="dropdown-item" href="#">view records</a></li>
            </ul>
          </li>
          <li class="nav-item ml-auto">
            <a class="nav-link " href="" tabindex="-1" aria-disabled="true"></a>
        </li>
    </nav> 

<div class="row">
<div class="col-3 left">
</div>
    <div class="col-6">
        <h2 style="text-align: center;"> Admin Login</h2>
    <form method="POST" class="form" action="<?php //htmlentities( $_SERVER['PHP_SELF']); ?>">

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

</div>
</form>

    </div>
    <div class="col-3 right"></div>
    </div>

</body>
</html>

<?php

include 'connection.php';

if(isset($_POST['submit']))
{
    $Email = $_POST['email'];
    $password = $_POST['password'];

    $checkEmail = "select*from admin where admin = '$Email'";
    $perfrom = mysqli_query($connect,$checkEmail);
    $CountEmail = mysqli_num_rows($perfrom);

    if($CountEmail>0)
    {
        $Email_pass = mysqli_fetch_assoc($perfrom);
        $coded_pass = $Email_pass['password'];
        // $verify_decode= password_verify($password,$coded_pass);
        //$_SESSION['userName']=$Email_pass['admin'];
       // $_SESSION['id']=$Email_pass['AID'];
        if($password == $coded_pass)
        {
           ?>

           <script>alert('login successful')</script>
           
           <?php
           header('location:adminHome.php');
           ob_end_flush();
           //$goto = "adminHome.php";
          // header(sprintf("Location: %s", $goto));
        //echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$goto.'">';

        }
        else
        {
            //echo "password incorrect";
        }

    }
    else
    {
        //echo "dont have account";
    }



}








?>