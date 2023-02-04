
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php' ?>
    <title>select your invoice</title>
</head>
<body>

<nav class="nav sticky-top">
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
          <li class="nav-item ml-auto">
            <a class="nav-link " href="" tabindex="-1" aria-disabled="true">Welcome <?php echo $_SESSION['userName']; ?></a>
        </li>
    </nav>

    <table class="table table-light" style="text-align: center;">
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
                <td><a href="invoice.php?id=<?php echo $arrRow['tripID']?>">genrate bill</a></td>
            </tr>
<?php } ?>            
        </tbody>
    </table>
   
</body>
</html>