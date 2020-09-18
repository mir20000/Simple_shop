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
    <title>Not enough CREX Coin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body style="background-image: url('img/back.jpg'); background-repeat: repeat; background-size: cover; background-position: center center;">
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
            

            <?php
            $crexcoin = $_SESSION['crexcoin'];
            if(isset($_GET['message'])){
                if ($_GET['message']=='notenough') {
                    echo "<h1>You don't have enough CREX Coin🙁</h1>";
                    echo "<h5>Your CREX Coin amount is: $crexcoin; </h5>";
                    echo '<h6>For any info contact: <a href="tel:6295776418">6295776418</a></h6>';
                    echo '<h6>Click here for<a href="index.php"> Home page</a></h6>';
                }else{
                    echo "<h1>Some unknown error occurs🙁</h1>";
                    echo '<h6>For any info contact: <a href="tel:6295776418">6295776418</a></h6>';
                    echo '<h6>Click here for<a href="index.php"> Home page</a></h6>';
                }
            }
            ?>


            
            
            
            


        </div>
    </center>
</body>

</html>