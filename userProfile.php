<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php' ?>
    <style><?php include 'style.css'; ?></style>
    <title>Profile</title>
</head>
<body>
<?php 
include 'connection.php';

$id = $_GET['id'];
$selectQuery = "select*from users where id =$id ";
$perfrom=mysqli_query($connect,$selectQuery);
$fetch = mysqli_fetch_assoc($perfrom);


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



    <div class="row no-gutters">
        <div class="col-lg-2 col-12 profile bg3 ">
            <div class="col-12" >
                <div class="pic" style="text-align: center;">
<img src="images/user.png" alt="" width="70px">
</div>
<div class="name1" style="text-align: center;">
  <?php echo $fetch['username']; ?>
</div>
            </div>
            <div class="col-12">
manage account
            </div>
            <div class="col-12">
settings
            </div>

        </div>
        <div class="col-lg-10 bg3 col-12 no-gutters">
            <div class="col-12">
<div class="name bg2">
<b class="twt"> User name :-   <?php echo $fetch['username']; ?></b>
</div>
<div class="name bg1">
<b class="twt">Email address:-<?php echo $fetch['email']; ?></b>
</div>
<div class="name bg2">
<b class="twt">mobile:-<?php echo $fetch['mobile']; ?></b>
</div>

            
            </div>
            <div class="col-lg-6 col-12 ">
<!-- trip requests -->
            </div>
            <div class="col-12" >
            <table class="table table-light table-responsive-sm " style="text-align: center;" >
        <thead class="thead-light" style="text-align: center;">
                      <div class="heading" style="text-align: center;">YOUR RECORDS</div>  
            <tr>
                <th class="">customer name</th>
                <th class="">customer mobile no</th>
                <th class="">from</th>
                <th class="">to</th>
                <th class="">selected car</th>
                <th class="">departure date</th>
                <th class="">return date</th>
                <th class="">Amount</th>
                <th class="">id</th>
                <th class="">status</th>
                <th class="" colspan="3">operation</th>
            </tr>
        </thead>
        <tbody>

<?php
    include 'connection.php';
    $cusid = $_GET['id'];
    $selectQuery = "select * from triprecords where CID = $cusid";
    $perfrom =mysqli_query($connect,$selectQuery);
while($arrRow = mysqli_fetch_assoc($perfrom))
{
?>
            <tr class="">
                <td><?php echo $arrRow['username']?></td>
                <td><?php echo $arrRow['mobile']?></td>
                <td><?php echo $arrRow['fromLocation']?></td>
                <td><?php echo $arrRow['toLocation']?></td>
                <td><?php echo $arrRow['carname']?></td>
                <td><?php echo $arrRow['departureDate']?></td>
                <td><?php echo $arrRow['returnDate']?></td>
                <td><?php echo $arrRow['amount']?></td>
                <td><?php echo $arrRow['tripID']?></td>
                <?php if($arrRow['status']=='Accepted')
                {
                  echo '<td style=background-color:#cee96b>'."Accepted".'</td>';
                }
                else if($arrRow['status']=='Rejected')
                {
                  echo '<td style=background-color:#D9534F>'."Rejected".'</td>';
                }
                else if($arrRow['status']=='Requested')
                {
                  echo '<td style=background-color:#FFEEAD>'."Requested".'</td>';
                }
                
                ?>
                <?php if($arrRow['status'] == "Accepted") {?>
                
                <td><a href="invoice.php?id=<?php echo $arrRow['tripID']?>">genrate bill</a></td>
                <?php } ?>
            </tr>
<?php } ?>            
        </tbody>
    </table>
            </div>
        </div>
    </div>
    <div class="col-12 feedback"> <a href=""> give us Feedback </a></div>
<!-- Footer -->
<footer class="page-footer font-small bg-info darken-3">

  <!-- Footer Elements -->
  <div class="container">

    <!-- Grid row-->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-12 py-5">
        <div class="mb-5 flex-center">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Pinterest-->
          <a class="pin-ic">
            <i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
          </a>
        </div>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>