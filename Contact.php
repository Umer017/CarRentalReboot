
<?php
ob_start(); 
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'; include 'connection.php'; ?>
    <title>Contact-us</title>
    <style>
        <?php include 'style.css'; ?>
        .centre{
            margin-left: auto;
            margin-right: auto;
        }
        .mtop{
            margin-top: 100px;
        }
    </style>
</head>
<body style="background-image: url(images/black-bg2.jpg); background-size:cover; background-repeat:no-repeat;">

<?php

$userSelect = $_SESSION['id'];
$seletinfoQuery = "select * from users where id = $userSelect";
$performuser = mysqli_query($connect,$seletinfoQuery);
$fetchuser = mysqli_fetch_assoc($performuser); 

?>
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


    <div class="row">
<div class="col-lg-6 col-12 centre p-5">
    <!-- <div class="form-group">
      <label for="">Email</label>
      <input type="text" class="form-control" name=""placeholder="">
    </div>

    <div class="form-group">
      <label for="">Name</label>
      <input type="text" class="form-control" name=""placeholder="">
    </div> -->
<form method="POST" class="col-12">
    <div class="form-group">
      <label for="">Subject</label>
      <input type="text" class="form-control" name="subject"placeholder="">
    </div>

    <div class="form-group">
      <label for="">Querie</label>
      <input type="text" name="message"  class="form-control">
    </div>
    <div class="form-group">
      <input type="submit" class="form-control" name="submit"placeholder="">
    </div>
    </form>
</div>
<div class="col-lg-6 col-12">
    <div class="col-6 mtop"><p class="twt">contact us : 0240-548245
         </p><br><p class="twt">email us :TourTravel@gmail.com</p>
         <p class="twt">reach out to us : Xyz City Road , Bermuda tower , Konoha , Leaf 43599
         </p><br></div>
    <div class="col-6"></div>
    
</div>
</div>
    <?php

if(isset($_POST['submit']))
{

$Customer = $fetchuser['username'];
$Subject = $_POST['subject'];
$querie = $_POST['message'];

$insertQuery = "insert into feedbacks(Customer,Subject,Querie) values('$Customer','$Subject','$querie')";
$performuserfeedback = mysqli_query($connect,$insertQuery);
if($performuserfeedback)
{
    header('location:Contact.php');
    ob_flush();
}

}

    ?>
</body>
</html>