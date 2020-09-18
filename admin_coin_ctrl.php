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
    <title>CREX Coin Manager</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body style="background-image: url('img/back.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
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
                <a href="admin_user_details.php"><button type="button" class="btn btn-primary btn-lg"> Users Information</button></a>
                </div>
                <div>
                    <a href="admin_table_order.php"><button type="button" class="btn btn-primary btn-lg"> Order Information</button></a>
                </div>
            </div>
            <hr class="w-header my-4" />
            <div>
            <div class="row d-flex align-items-center justify-content-center">
            <!--Grid column-->
            <div class="col-md-6 col-xl-5">
              <!--Form-->
              <div class="card">
                <div class="card-body z-depth-2 px-4">
            <p class="lead text-center pt-2 mb-5">CREX Coin Manager</p>
                  <form action="admin_coin_ctrl.php" method="post">
                    <div class="md-form">
                      <input type="email" id="form2" class="form-control" placeholder="Account's Email" name="yemail" required>
                    </div>
                    <br>
                    <div class="md-form">
                      <input type="number" id="form4" class="form-control" minlength="8" placeholder="Amount" name="crexcoinvalue" required>
                    </div>
                      <label for="exampleFormControlSelect1">Action:</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="opt">
                        <option></option>
                        <option value="added">Increase</option>
                        <option value="removed">Reduce</option>
                      </select>
                    <div class="text-center my-3">
                         <button type="submit" class="btn btn-primary btn-block" name="submit" value="submit">Go</button>
                    </div>

                    <?php

                    if (isset($_GET['message'])) {
                    $cc = $_GET['cc'];
                    $eml = $_GET['eml'];
                    $act = $_GET['act'];
                    
                        if ($_GET['message']=='done') {
                            echo "<p style='color:blue'>Account: $eml,<br>Total CREXcoin: $cc,<br> Action: $act</p>";
                        }elseif($_GET['message']=='notdone'){
                            echo "<p style='color:red'>Can't find the account.</p>";
                        }elseif($_GET['message']=='servererror'){
                            echo "<p style='color:red'>!!!!!SERVER ERROR!!!!!</p>";
                        }
                    }
                    ?>

                    </div>
                  </form>
              </div>
              </div>
              </div>
              </div>
            </div>
        </div>
    </center>
</body>

</html>



<?php
include_once('connect.php');
if (isset($_POST['submit'])) {
    $sql = "SELECT * FROM users WHERE email=? ;";
    //creating a prepared statement 
    $stmt= mysqli_stmt_init($conn);
    //Prepared the prepared statment

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: admin_coin_ctrl.php?message=servererror");
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$_POST['yemail']);
        
        mysqli_stmt_execute($stmt);
        
        $result =mysqli_stmt_get_result($stmt);
        
        $row = mysqli_num_rows($result);
        $userinfo = mysqli_fetch_assoc($result);  
  
        if ($row==1) {

            $crexcoin = $userinfo['crexcoin'];
            $crexcoin = intval($crexcoin);

            $crexcoinvalue=$_POST['crexcoinvalue'];
            $crexcoinvalue = intval($crexcoinvalue);

            $yemail=$_POST['yemail'];
            $opt = $_POST['opt'];
            
            if ($opt=='added') {
                $crexcoin = $crexcoin+$crexcoinvalue;
            }else {
                $crexcoin = $crexcoin-$crexcoinvalue;
            }

            if ($crexcoin<0) {
                $crexcoin=0;
            }

            $sql2 = "UPDATE users SET crexcoin=? WHERE email=?";
            if (!mysqli_stmt_prepare($stmt,$sql2)) {
                 
                header("Location: admin_coin_ctrl.php?message=servererror");
                 }
                 else{
                     mysqli_stmt_bind_param($stmt,"ss",$crexcoin,$_POST['yemail']);
         
                     mysqli_stmt_execute($stmt);

                     echo $crexcoin;
         
                     header("Location: admin_coin_ctrl.php?message=done&eml=$yemail&cc=$crexcoin&act=$opt"); 
                     }
        }
        else{
            header("Location: admin_coin_ctrl.php?message=notdone"); 
        }
    }
}

?>
