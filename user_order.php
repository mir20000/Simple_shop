<!DOCTYPE html>
<?php
session_start();
if (!(isset($_SESSION['name']))) {
    header('location: login.php');
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
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
                <p><a href="index.php">CREX Web Service</a></p>
            </div>
            <div class="d-flex justify-content-between ">
                <div>
                    <?php
                    if ($_SESSION['name'] != NULL) {
                        echo "<h6>Hi, " . $_SESSION['name'] . "</h6>";
                    }
                    ?>
                </div>

                <div>
                    <h6><a href="logout.php">Logout</a></h6>
                </div>
            </div>
            <hr class="w-header my-4" />
            <div>
                <div class="grayBox" style="height:auto;">
                    <h4 style="padding-left: 16px;">Order Information</h4><br>
                    <h6>For any information contact: <a href="tel:6295776418">6295776418</a></h6>


                    <?php
                    if (isset($_SESSION['name'])) {
                        $account = $_SESSION['email'];
                        include_once('connect.php');
                        $sql = "SELECT * FROM orders WHERE account=? ORDER BY id DESC;";
                        $stmt = mysqli_stmt_init($conn);
                        //Prepared the prepared statment

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "Some error in SQL 20";
                        } else {
                            mysqli_stmt_bind_param($stmt, "s", $account);

                            mysqli_stmt_execute($stmt);

                            $data = mysqli_stmt_get_result($stmt);

                            $row = mysqli_num_rows($data);



                            if ($row != 0) {

                    ?>
                                <table style="font-size: 15px; border-bottom: 2px solid #5d1d87; ">
                                    <tr>
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
                                while ($result = mysqli_fetch_assoc($data)) {

                                    echo "<tr><td style='border-left: 2px solid #5d1d87;padding:10px'>" . $result['product'] . "</td><td style='border-left: 2px solid #5d1d87;padding:10px'>" . $result['price'] . "</td><td style='border-left: 2px solid #5d1d87;padding:10px'>" . $result['crexcoinvalue'] . "</td><td style='border-left: 2px solid #5d1d87;padding:10px'>" . $result['fullname'] . "</td><td style='border-left: 2px solid #5d1d87;padding:10px'>" . $result['phone'] . "</td><td style='border-left: 2px solid #5d1d87;padding:10px'>" . $result['email'] . "</td><td style='border-left: 2px solid #5d1d87;padding:10px'>" . $result['landmark'] . "</td><td style='border-left: 2px solid #5d1d87;padding:10px'>" . $result['street_add'] . "</td><td style='border-left: 2px solid #5d1d87;padding:10px'>" . $result['city'] . "</td><td style='border-left: 2px solid #5d1d87;padding:10px'>" . $result['district'] . "</td><td style='border-left: 2px solid #5d1d87;padding:10px'>" . $result['pin'] . "</td><td style='border-left: 2px solid #5d1d87;border-right: 2px solid #5d1d87;padding:10px'>" . $result['orderid'] . "</td></tr>";
                                }
                            } else {
                                echo "no record found";
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