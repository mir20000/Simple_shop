<!DOCTYPE html>
<?php
include_once("connect.php");
session_start();
if (!(isset($_SESSION['name']))) {
  header('location: login.php');
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product_1</title>

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body style="background-image:url('img/back.jpg') ;">
  <!-- Page Content -->
  <div class="container" style="background-color: white;padding:30px;margin-top:40px;margin-bottom:40px">
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

    $product = $_GET["product"];

    $sql = "SELECT * FROM product WHERE product=? ;";
    //creating a prepared statement 
    $stmt = mysqli_stmt_init($conn);
    //Prepared the prepared statment

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "Some error in SQL 20";
    } else {
      mysqli_stmt_bind_param($stmt, "s", $product);

      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      $row = mysqli_num_rows($result);

      $proinfo = mysqli_fetch_assoc($result);
    }
    ?>

    <!-- Portfolio Item Heading -->
    <h1 class="my-4"><?php echo $proinfo['product']; ?>
    </h1>

    <!-- Portfolio Item Row -->
    <div class="row">

      <div class="col-md-8">
        <img class="img-fluid" src="img/products/<?php echo $proinfo['imgproduct'] ?>" alt="">
      </div>

      <div class="col-md-4">
        <h3 class="my-3">Product Description</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus.</p>
        <small><i class="fa fa-star fa-2x text-warning"></i>
          <i class="fa fa-star fa-2x text-warning"></i>
          <i class="fa fa-star fa-2x text-warning"></i>
          <i class="fa fa-star fa-2x text-warning"></i>
          <i class="fa fa-star fa-2x text-warning"></i>
          <span class="fa fa-2x">
            <h5>(9) Votes</h5>
          </span></small>
        <h3 class="my-3">Product Details</h3>
        <ul>
          <li>Lorem Ipsum</li>
          <li>Dolor Sit Amet</li>
          <li>Consectetur</li>
          <li>Adipiscing Elit</li>
        </ul>
        <h5><?php echo "Rs." . $proinfo['price'] . "+" . $proinfo['crexcoin'] . "Crexcoin"; ?></h5>

        <a href="order_info.php?product=<?php echo $proinfo['product']?>"><button type="submit" name="submit" value="submit" class="btn btn-outline-danger">Buy Now</button></a>


      </div>

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <h3 class="my-4">Related Products</h3>

    <div class="row">
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="product.php?product=product_1">
          <img class="img-fluid" src="img/products/in_1.jpg" alt="">
        </a>
      </div>
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="product.php?product=product_2.php">
          <img class="img-fluid" src="img/products/in_2.jpg" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="product.php?product=product_3">
          <img class="img-fluid" src="img/products/in_3.jpg" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="product.php?product=product_4">
          <img class="img-fluid" src="img/products/in_4.jpg" alt="">
        </a>
      </div>


    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</body>

</html>