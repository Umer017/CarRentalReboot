<?php

include 'connection.php';

$billid = $_GET['id'];

$selectQuery = "select*from triprecords where tripID =$billid";

$perform = mysqli_query($connect,$selectQuery);

$arrRow = mysqli_fetch_assoc($perform)


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include 'invoicestyle.css'?></style>
    <title>invoice</title>
</head>
<body>
<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block">
                                        <h2>INVOICE</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody><tr>
                                                <td>Customer name:  <?php echo $arrRow['username']?><br>Invoice_ID <?php echo $arrRow['tripID']?><br><?php echo date("Y/m/d") ?> </td>
                                            </tr>
                                            <tr><td>Customer Mobile:  <?php echo $arrRow['mobile']?></td></tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                            <td>From</td>
                                                            <td class="alignright"><?php echo $arrRow['fromLocation'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>To</td>
                                                            <td class="alignright"><?php echo $arrRow['toLocation'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Distance</td>
                                                            <td class="alignright"><?php echo $arrRow['distance'] ?> KM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Carname</td>
                                                            <td class="alignright"><?php echo $arrRow['carname'] ?></td>
                                                        </tr>
                                                        <tr class="total">
                                                            <td class="alignright" width="80%">Fair</td>
                                                            <td class="alignright"><?php echo $arrRow['amount']?></td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <a onclick="PrintThis();">Print this invoice</a>
                                        <script>

function PrintThis() {
  window.print();
}
                                        </script>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        Company Inc. Tours And Travels Services
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <div class="footer">
                    <table width="100%">
                        <tbody><tr>
                            <td class="aligncenter content-block">Questions? Email <a href="mailto:">support@Travel.com</a></td>
                        </tr>
                    </tbody></table>
                </div></div>
        </td>
        <td></td>
    </tr>
</tbody></table>
</body>
</html>