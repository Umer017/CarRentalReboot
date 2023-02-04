<?php
ob_start();  
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAhJ1yuG3m6DSMM9bw6uAMOi3P-rNKUz5w"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php';
    include 'connection.php'; ?>
    <style>
        <?php include 'style.css' ?>
    </style>
    <title>details</title>
</head>
<body class="bg3">
    <?php 
     $id = $_SESSION['id'];
     $selectQuery = "select*from users where id =$id ";
     $perfrom=mysqli_query($connect,$selectQuery);
     $fetch = mysqli_fetch_assoc($perfrom); 
    
    ?>
<nav class="nav sticky-top">
        <a href="userHome.php" class="navbar-brand ml-5"><img src="images/Visual-Studio-Logo.png" alt="" style="width: 50px;"></a>
        <li class="nav-item">
            <a class="nav-link active" href="userHome.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="Contact.php?id=<?php echo $id; ?>" tabindex="-1" aria-disabled="true">contact</a>
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




    <?php
{
    $carid = $_GET['carid'];

    $selectQuery = "select*from carlisting where VID=$carid";

    $perfrom = mysqli_query($connect, $selectQuery);

    $fetch = mysqli_fetch_assoc($perfrom);

}
    ?>

<?php

$userSelect = $_SESSION['id'];
$seletinfoQuery = "select * from users where id = $userSelect";
$performuser = mysqli_query($connect,$seletinfoQuery);
$fetchuser = mysqli_fetch_assoc($performuser);

if(isset($_POST['confirmTrip']))
{

  $costperkm = $fetch['costperkm'];
  $customeremail = $fetchuser['email'];
  $customerid = $fetchuser['id'];
  $customerName = $fetchuser['username'];
  $cusomerMobile = $fetchuser['mobile'];
  $fromPlace = $_POST['fromPlace'];
  $toPlace = $_POST['toPlace'];
  $selectedCar = $fetch['carname'];
  $carid = $fetch['VID'];
  $noplate = $fetch['noPlate'];
  $modelno = $fetch['modelno'];
  $vehicletype =$fetch['vehicletype'];
  $dateDespatch = date('Y-m-d',strtotime($_POST['departure']));
  $dateReturn = date('Y-m-d',strtotime($_POST['return']));
  $amount = 0;
  $distance = 0; 
  $isvalid = true;
  $time = date('H:i:s',strtotime($_POST['time']));

  if(str_contains($fetch['vehicletype'],'SUV'))
  {
    $amount += 1000;

  }
  else if(str_contains($fetch['vehicletype'],'Hatchback'))
  {
    $amount += 500;
  }
  else if(str_contains($fetch['vehicletype'],'mini-SUV'))
  {
    $amount += 700;
  }



  if($fromPlace == 'Pune' && $toPlace=='aurangabad' || $fromPlace == 'aurangabad' && $toPlace='Pune')
  {
   $distance +=237; 
    $amount = $distance * $costperkm;
  }
  else if($fromPlace == 'jalna' && $toPlace == 'Pune' || $fromPlace == 'Pune' && $toPlace =='jalna')
  {
    $distance +=294;
    $amount = $distance * $costperkm;
  }
  else if($fromPlace == 'ahmadnagar' && $toPlace == 'Pune' || $fromPlace == 'Pune' && $toPlace =='ahmadnagar')
  {
    $distance += 121;
     $amount = $distance * $costperkm;
  }
  else if($fromPlace == 'beed' && $toPlace == 'Pune' || $fromPlace == 'Pune' && $toPlace =='beed')
  {
    $distance +=249;
    $amount = $distance * $costperkm;
  }
  else if($fromPlace == 'jalna' && $toPlace == 'aurangabad' || $fromPlace == 'aurangabad' && $toPlace =='jalna')
  {
    $distance += 60;
    $amount = $distance * $costperkm;
    
  }
  else if($fromPlace == 'jalna' && $toPlace == 'beed' || $fromPlace == 'beed' && $toPlace =='jalna')
  {
    $distance +=100;
    $amount = $distance * $costperkm;
  }
  else if($fromPlace == 'jalna' && $toPlace == 'ahmadnagar' || $fromPlace == 'ahmadnagar' && $toPlace =='jalna')
  {
    $distance +=173;
    $amount += 2000;
  }
  else if($fromPlace == 'beed' && $toPlace == 'ahmadnagar' || $fromPlace == 'ahmadnagar' && $toPlace =='beed')
  {
    $distance += 128;
    $amount = $distance * $costperkm;
    
  }
  else if($fromPlace == 'beed' && $toPlace == 'aurangabad' || $fromPlace == 'aurangabad' && $toPlace =='beed')
  {
    $distance +=126;
    $amount = $distance * $costperkm;
  }
  else if($fromPlace == $toPlace)
  {
    $isvalid = false;
  
    ?>
<script>alert("both places are same please enter valid places");</script>
    <?php
  }

  if($dateReturn<$dateDespatch)
  {
    $isvalid = false;
    ?>
<script>alert("date return should be greather than dispatch date");</script>
    <?php
  }

if($isvalid == true)
{

$insertQuery = "insert into triprecords(CID,username,mobile,email,fromLocation,toLocation,departureDate,returnDate,distance,amount,VID,noplate,modelno,carname,vehicletype,status,description,departureTime)
values($customerid,'$customerName','$cusomerMobile','$customeremail ','$fromPlace','$toPlace','$dateDespatch','$dateReturn','$distance',$amount,$carid ,'$noplate','$modelno','$selectedCar','$vehicletype','Requested','-','$time')";


  $perform = mysqli_query($connect,$insertQuery);
   if($perform)
   {
     ?>
     <script>alert("Trip requested");</script>
     <?php
     header('location:userHome.php');
     ob_flush();
   }

}


}

?>





    <div class="row mt-5  no-gutters">
        <div class="col-12 no-gutters">
            <div class="row no-gutters">
                <div class="col-lg-6 mt-5 p-5 col-12 ">
                    <img src="<?php echo $fetch['image']; ?>" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 col-12 no-gutters b">

                    <div class="col-lg-10 col-12 p-5 c bg-light p-1 font-style">
                        <h2 class="col-12"><?php echo $fetch['carname'] . " " . $fetch['modelno']; ?></h2> <br>
                        <div class="bg-gr col-12"><b><img src="images/svg/seat-svgrepo-com.svg" alt="" style="height: 20px; width: 20px; " class="mr-2"> Seating capacity :- <?php echo $fetch['noofseats'];  ?></b></div><br>
                        <div class="bg-gr col-12"> <b class="w-100"><img src="images/svg/car-svgrepo-com.svg" alt="" style="height: 20px; width: 20px; "class="mr-2">vehicle type :- <?php echo $fetch['vehicletype'];  ?></b></div><br>
                        <div class="bg-gr col-12"><b class="w-100"><img src="images/svg/manufacturer-svgrepo-com.svg" alt="" style="height: 20px; width: 20px;"class="mr-2"> Year of Manufacturing :- <?php echo $fetch['yearofmanufacruring'];  ?></b></div><br>
                        <div class="bg-gr col-12"><b class="w-100"><img src="images/svg/space-key-svgrepo-com.svg" alt="" style="height: 20px; width: 20px;"class="mr-2">bootcapacity :- <?php echo $fetch['bootcapacity'];  ?></b></div><br>
                        <div class="bg-gr col-12"><b class="w-100"><img src="images/svg/text-description-svgrepo-com.svg" alt="" style="height: 20px; width: 20px;"class="mr-2">description :- <?php echo $fetch['Discription']; ?></b></div><br>
                        <div class="bg-gr col-12"><b class="w-100"><img src="images/svg/odometer-svgrepo-com.svg" alt="" style="height: 20px; width: 20px;"class="mr-2">Cost Per Km :- <?php echo $fetch['costperkm']; ?></div></b>
                    </div>
                    <tr></tr>
                    <div class="col-lg-10 col-12 no-gutters p-5 bg2 d">
                        <h3 class="twt">Trip details</h3>
                        <form method="POST">
                            <div class="form-row twt">
                                <div class="form-group col-md-6">
                                   <img src="images/svg/location-svgrepo-com.svg" alt="" style="height: 20px; width: 20px; filter: invert(100%);"class="mr-2"> <label for="">From</label>
                                    <select id="" class="form-control" name="fromPlace">
                                        <option selected>Pune</option>
                                        <option>jalna</option>
                                        <option>aurangabad</option>
                                        <option>ahmadnagar</option>
                                        <option>beed</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                <img src="images/svg/location-svgrepo-com.svg" alt="" style="height: 20px; width: 20px; filter: invert(100%);"class="mr-2"> <label for="">To</label>
                                    <select id="" class="form-control" name="toPlace">
                                        <option selected>Pune</option>
                                        <option>jalna</option>
                                        <option>aurangabad</option>
                                        <option>ahmadnagar</option>
                                        <option>beed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row twt">
                                <div class="form-group col-md-6">
                                    <label for="departure">departure date:</label>
                                    <input type="date" id="d1" name="departure" class="form-control" required>
                                    <label for="departure">Time:</label>
                                    <input type="Time" id="d1" name="time" class="form-control" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="return">Return date:</label>
                                    <input type="date" id="d2" name="return" class="form-control" onchange="myFunction()" required>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary" name="confirmTrip">Request Car</button>
                            <a href="selectinvoice.php?id=<?php echo $fetchuser['id']; ?>" class="btn btn-primary" name="">Print invoice</a>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-12">
  <!-- Footer -->
  <footer class="page-footer font-small  darken-3 mt-5 bg-footer-color">

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
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
</div>
    </div>


</body>

</html>

