
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
          <li class="nav-item ml-auto">
            <a class="nav-link " href="" tabindex="-1" aria-disabled="true"></a>
        </li>
    </nav>

    <table class="table table-light" style="text-align: center;">
        <thead class="thead-light" style="text-align: center;">
                      <div class="heading" style="text-align: center;">All RECORDS</div>  
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
                <th class="">Status</th>
                <th class="" colspan="3">operation</th>
            </tr>
        </thead>
        <tbody>

<?php
    include 'connection.php';
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else{

        $page = 1;

    }
    
    $offset = ($page-1)*3 ;
    $limit = 5;
    $selectQuery = "select * from triprecords order by tripID desc limit {$offset},{$limit};";
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
                <td style=background-color:#cee96b><a href="UpdateStatus.php?id=<?php echo $arrRow['tripID']?>">Accept</a></td>
                <td style=background-color:#D9534F><a href="RejectStatus.php?id=<?php echo $arrRow['tripID']?>">Reject</a></td>
                <td style=background-color:#FFEEAD><a href="invoice.php?id=<?php echo $arrRow['tripID']?>">genrate bill</a></td>
            </tr>
            
<?php } ?>            
        </tbody>
    </table>

    <?php 
    $selectQuery1 = "select * from triprecords";
    $perfrom1 = mysqli_query($connect,$selectQuery1);
    if(mysqli_num_rows($perfrom1)>0)
    {
        $total_records = mysqli_num_rows($perfrom1);
        $total_pages = ceil($total_records/$limit);
        echo '<ul class="pagination admin-pagination mlr-auto">';
        if($page>1)
        {
        echo '<li class="page-item"><a class="page-link" href ="viewRecord.php?page='.($page-1).'">Pre</a></li>';
        }
        for($i = 1 ; $i <= $total_pages ; $i++)
        {
            if($i == $page)
            {
                $active = "active";
            }
            else{

                $active ="";

            }
                 echo '<li class="page-item '.$active.'"><a class="page-link" href="viewRecord.php?page='.$i.'">'.$i.'</a></li>';
            
        }
        if($total_pages> $page)
        {
            echo '<li class="page-item"><a class="page-link" href ="viewRecord.php?page='.($page+1).'">Next</a></li>';
        }
        
        echo '</ul>';

    }
    
    
    
    ?>
            
</body>
</html>