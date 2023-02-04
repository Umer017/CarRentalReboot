<?php session_start(); 
include 'connection.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'?>
    <style>
        /* .parent {
    background-color: #96CEB4;
}
.child{
    margin-top: 150px;
    background-color: #96EEB4;
    justify-content: center;
    margin-left: 450px;
} */

.form{
    padding-bottom: 100px;
    /* background-color: blue; */
    padding-top: 200px;
    /* padding-left: 150px; */
    /* background-color: #C1DEAE; */
}
/* .left{
    background-color: #219F94;
}
.right{
    background-color: #F2F5C8;
} */
.twt{
color: white;
text-decoration: solid;
}
.nav{
    background-color: gray;
}
.nav a{
    color: black;
    text-decoration: solid 50px;
}

    </style>
    <title>sign up</title>
</head>
<body style="background-image: url(images/Car-Logo-Designsbg.jpg); background-repeat:no-repeat;background-size:cover;">
<nav class="nav sticky-top">
        <a href="MainPage.php" class="navbar-brand ml-5"><img src="images/Visual-Studio-Logo.png" alt="" style="width: 50px;"></a>
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
<div class="col-lg-3 col-12">
</div>
    <div class="col-lg-6 col-12">
    
    <form method="POST" class="form twt" action="<?php htmlentities( $_SERVER['PHP_SELF']); ?>">
    <h2 style="text-align: center;" class="twt"> user signup</h2>
<div class="form-group col-md-8 ">
  <label for="">UserName</label>
  <input type="text" class="form-control" placeholder=" User name" name="UserName" required>
</div>
<div class="form-group col-md-8">
  <label for="">Mobile no</label>
  <input type="text" class="form-control" id="" name="mobile" placeholder="mobile number" required>
</div>

<div class="form-group col-md-8">
  <label for="">E-mail id</label>
  <input type="text" class="form-control" id="" name="email" placeholder="Email-id" required>
</div>

<div class="form-group col-md-8">
  <label for="">Password</label>
  <input type="password" class="form-control" id="" name="password" placeholder="Enter password" required>
</div>

<div class="form-group col-md-8">
  <label for="">Confirm Password</label>
  <input type="password" class="form-control" id="" name="cpassword" placeholder="Confirm password" required>
</div>
<div class="form-group col-md-8">
<button type="submit" class="btn btn-primary" name="submit">submit</button>
<div class="" style="margin-left: auto;">have account ? <a href="login.php">login here</a></div>
</div>
</form>

    </div>
    <div class="col-lg-3 col-12 right"></div>
    </div>

</body>
</html>
<?php

if(isset($_POST['submit']))
{

    $username = mysqli_real_escape_string($connect,$_POST['UserName']);
    $password = mysqli_real_escape_string($connect,$_POST['mobile']);
    $email = mysqli_real_escape_string($connect,$_POST['email']);
    $password = mysqli_real_escape_string($connect,$_POST['password']);
    $cpassword = mysqli_real_escape_string($connect,$_POST['cpassword']);
    $mobile = mysqli_real_escape_string($connect,$_POST['mobile']);


    $pass = password_hash($password,PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword,PASSWORD_BCRYPT);

    
    $emailQuery = "select * from users where email = '$email'";
    $perform = mysqli_query($connect,$emailQuery);
    $emailRow = mysqli_num_rows($perform);

    if($emailRow > 0)
    {
        ?>
            <script>alert("Email already exist")</script>
            <?php

    }
    else{
        if($password === $cpassword)
        {
            $insertQuery = "insert into users(username,mobile,email,Password,cPassword) values('$username','$mobile','$email','$pass','$cpass')";
            $perform = mysqli_query($connect,$insertQuery);
            if($perform)
            {
                ?>
            <script>alert("sign up success")</script>
            <?php
            }

        }
        else
        {
            ?>
            <script>alert("password not matched")</script>
            <?php

        }

    }


}







?>
