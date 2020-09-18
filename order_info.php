<!DOCTYPE html>
<?php 
  include_once("connect.php");
   session_start();
   if(!(isset($_SESSION['name'])))
   {
     header('location: login.php');
   }
   
   $product = $_GET["product"];

   $sql = "SELECT * FROM product WHERE product=? ;";
   //creating a prepared statement 
   $stmt= mysqli_stmt_init($conn);
   //Prepared the prepared statment

   if (!mysqli_stmt_prepare($stmt,$sql)) {
       echo "Some error in SQL 20";
   }
   else{
       mysqli_stmt_bind_param($stmt,"s",$product);
       
       mysqli_stmt_execute($stmt);
       
       $result =mysqli_stmt_get_result($stmt);
       
       $row = mysqli_num_rows($result);
       
       $proinfo = mysqli_fetch_assoc($result); 
   } 

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


    <style>
        
    .order-form .container {
        color: #4c4c4c;
        padding: 20px;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, .1);
      }
  
      .order-form-label {
        margin: 8px 0 0 0;
        font-size: 14px;
        font-weight: bold;
      }
  
      .order-form-input {
        width: 100%;
        padding: 8px 8px;
        border-width: 1px !important;
        border-style: solid !important;
        border-radius: 3px !important;
        font-family: 'Open Sans', sans-serif;
        font-size: 14px;
        font-weight: normal;
        font-style: normal;
        line-height: 1.2em;
        background-color: transparent;
        border-color: #cccccc;
      }
  
      .btn-submit:hover {
        background-color: #090909 !important;
      }
    </style>


</head>
<body style="background-image: url('img/back.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
  <section class="order-form my-4 mx-4" >
    <div class="container pt-4"style="background-color: white;padding:30px">

    <div align="center">
          <img src="img/CWS.png" alt="" width="70" height="70" /><br />
          <p><a href="index.php">CREX Web Service</a></p>
        </div>
        <div class="d-flex justify-content-between ">
          <div>
          <?php 
            if($_SESSION['name']!=NULL) 
            {  
              echo "<h6>Hi, ".$_SESSION['name']."</h6>"; 
            } 
            ?>
          </div>
          
          <div><h6><a href="logout.php">Logout</a></h6></div>
        </div>
        <hr class="w-header my-4" />

        <div class="d-flex justify-content-between ">
          <div>
          <h5>Product</h5>
          <?php 
             echo $proinfo['product'];
            ?>
          </div>
          
          <div><h6>
          <?php 
          echo "<h6> Price = ".$proinfo['price']." <br> CrexCoins =". $proinfo['crexcoin']."</h6>"
          
          ?>
          </h6></div>
        </div>
        <hr class="w-header my-4" />

      <div class="row">
        <div class="col-12">
          <h1> Order Form</h1>
          <hr class="mt-1">
        </div>
        <div class="col-12">
        <form action="order_proc.php" method="post">
        <input type="hidden" name="product" value="<?php echo $proinfo['product']?>">
        <input type="hidden" name="price" value="<?php echo $proinfo['price']?>">
        <input type="hidden" name="crexcoinvalue" value="<?php echo $proinfo['crexcoin']?>">
          <div class="row mx-4">
            <div class="col-12 mb-2">
              <label class="order-form-label">Name</label>
            </div>
            <div class="col-12 ">
              <input class="order-form-input" type="text" placeholder="Full Name" name="fullname" required>
            </div>
          </div>

          <div class="row mx-4">
            <div class="col-12 mb-2">
              <label class="order-form-label">Contact</label>
            </div>
            <div class="col-12 col-sm-6">
              <input class="order-form-input" type="number" placeholder="Phone Number" name="phone" required>
            </div>
            <div class="col-12 col-sm-6 mt-2 mt-sm-0">
              <input class="order-form-input" type="email" placeholder="Email" name="email" required>
            </div>
          </div>

          <div class="row mt-3 mx-4">
            <div class="col-12">
              <label class="order-form-label">Adress</label>
            </div>
            <div class="col-12">
              <input class="order-form-input" type="text" placeholder="Street Address" name="street_add" required>
            </div>
            <div class="col-12 col-sm-6 mt-2 pr-sm-2">
              <input class="order-form-input" type="text" placeholder="City" name="city" required>
            </div>
            <div class="col-12 col-sm-6 mt-2 pl-sm-0">
              <input class="order-form-input" type="text" placeholder="District" name="district" required>
            </div>
            <div class="col-12 col-sm-6 mt-2 pr-sm-2">
              <input class="order-form-input" type="number" placeholder="Pin Code" name="pin" required>
            </div>
            <div class="col-12 col-sm-6 mt-2 pl-sm-0">
              <input class="order-form-input" type="text" placeholder="Landmark" name="landmark" required>
            </div>
          </div>

          <div class="row mt-3 mx-4">
            <div class="col-12">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="validation" id="validation" value="1" required>
                <label for="validation" class="form-check-label">I have given the right address</label>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12">
              <button type="submit" id="btnSubmit" name="submit" value="submit" class="btn btn-outline-danger d-block mx-auto ">Proceed for Payment</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </section>
</body>
</html>