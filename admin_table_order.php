
<!DOCTYPE html>
<?php
session_start();
if (!(isset($_SESSION['admin_name']))) {
    header('location: admin_login.php');
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Order Information</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <center>
        <div class="container my-5 " style="background-color: rgb(255, 255, 255); padding: 50px;">
            <div align="center">
                <img src="img/CWS.png" alt="" width="70" height="70" /><br />
                <p>CREX Web Service</p>
            </div>
            <div class="d-flex justify-content-between ">
                <div>
                    <?php
                    if ($_SESSION['admin_name'] != NULL) {
                        echo "<h6>Hi, " . $_SESSION['admin_name'] . "</h6>";
                    }
                    ?>
                </div>

                <div>
                    <h6><a href="admin_logout.php">Logout</a></h6>
                </div>
            </div>
            <hr class="w-header my-4" />
            <div class="d-flex justify-content-around ">
                <div>
                    <a href="admin_coin_ctrl.php"><button type="button" class="btn btn-primary btn-lg">CREX Coin Manager</button></a>
                </div>
                <div>
                    <a href="admin_user_details.php"><button type="button" class="btn btn-primary btn-lg"> Users Information</button></a>
                </div>
            </div>
            <hr class="w-header my-4" />
            <div>
            <div class="grayBox" style="height:auto;">
                  <h4 style="padding-left: 16px;">Order Information</h4><br>
                  
                
                    <?php
                if(isset($_SESSION['admin_name'])){

                include_once('connect.php');
                $sql="SELECT * FROM orders ORDER BY id DESC;";
                $stmt= mysqli_stmt_init($conn);
                //Prepared the prepared statment

                if (!mysqli_stmt_prepare($stmt,$sql)) {
                    echo "Some error in SQL 20";
                }
                else{
                    
                    mysqli_stmt_execute($stmt);
                    
                    $data =mysqli_stmt_get_result($stmt);
                    
                    $row = mysqli_num_rows($data);
                    


                    if ($row!=0) {
                        
                        ?>
                        <table style="font-size: 15px; border-bottom: 2px solid #5d1d87; ">
                        <tr><th style='border-left: 2px solid #3498db;border-bottom: 2px solid #3498db;border-top: 2px solid #3498db;padding:10px'>ID</th>
                            <th style='border-left: 2px solid #3498db;border-bottom: 2px solid #3498db;border-top: 2px solid #3498db;padding:10px'>Product</th>
                            <th style='border-left: 2px solid #3498db;border-bottom: 2px solid #3498db;border-top: 2px solid #3498db;padding:10px'>Price</th>
                            <th style='border-left: 2px solid #3498db;border-bottom: 2px solid #3498db;border-top: 2px solid #3498db;padding:10px'>CREX Coin</th>
                            <th style='border-left: 2px solid #3498db;border-bottom: 2px solid #3498db;border-top: 2px solid #3498db;padding:10px'>Full Name</th>
                            <th style='border-left: 2px solid #3498db;border-bottom: 2px solid #3498db;border-top: 2px solid #3498db;padding:10px'>Phone</th>
                            <th style='border-left: 2px solid #3498db;border-bottom: 2px solid #3498db;border-top: 2px solid #3498db;padding:10px'>Email</th>
                            <th style='border-left: 2px solid #3498db;border-bottom: 2px solid #3498db;border-top: 2px solid #3498db;padding:10px'>Landmark</th>
                            <th style='border-left: 2px solid #3498db;border-bottom: 2px solid #3498db;border-top: 2px solid #3498db;padding:10px'>Street Address</th>
                            <th style='border-left: 2px solid #3498db;border-bottom: 2px solid #3498db;border-top: 2px solid #3498db;padding:10px'>City</th>
                            <th style='border-left: 2px solid #3498db;border-bottom: 2px solid #3498db;border-top: 2px solid #3498db;padding:10px'>District</th>
                            <th style='border-left: 2px solid #3498db;border-bottom: 2px solid #3498db;border-top: 2px solid #3498db;padding:10px'>Pin</th>
                            <th style='border-left: 2px solid #3498db;border-bottom: 2px solid #3498db;border-top: 2px solid #3498db;border-right: 2px solid #3498db;padding:10px'>OrderID</th>
                            </tr>
                        <?php
                        while($result=mysqli_fetch_assoc($data)){
                        
                            echo"<tr><td style='border-left: 2px solid #5d1d87;padding:10px'>".$result['id']."</td><td style='border-left: 2px solid #5d1d87;padding:10px'>".$result['product']."</td><td style='border-left: 2px solid #5d1d87;padding:10px'>".$result['price']."</td><td style='border-left: 2px solid #5d1d87;padding:10px'>".$result['crexcoinvalue']."</td><td style='border-left: 2px solid #5d1d87;padding:10px'>".$result['fullname']."</td><td style='border-left: 2px solid #5d1d87;padding:10px'>".$result['phone']."</td><td style='border-left: 2px solid #5d1d87;padding:10px'>".$result['email']."</td><td style='border-left: 2px solid #5d1d87;padding:10px'>".$result['landmark']."</td><td style='border-left: 2px solid #5d1d87;padding:10px'>".$result['street_add']."</td><td style='border-left: 2px solid #5d1d87;padding:10px'>".$result['city']."</td><td style='border-left: 2px solid #5d1d87;padding:10px'>".$result['district']."</td><td style='border-left: 2px solid #5d1d87;padding:10px'>".$result['pin']."</td><td style='border-left: 2px solid #5d1d87;border-right: 2px solid #5d1d87;padding:10px'>".$result['orderid']."</td></tr>";
                        }
                        }
                        else{
                            echo"no record found";
                        }
                    }
                        ?>
                        </table>
                <?php
                }
                ?>
            </div>
        </div>
        
    </center>
</body>

</html>