<!DOCTYPE html>
<?php
session_start();
if (!(isset($_SESSION['name']))) {
  header('location: login.php');
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UserPanel</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <style>
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    .view,
    body,
    html {
      height: 100%;
    }

    .carousel {
      height: 50%;
    }

    .carousel .carousel-inner,
    .carousel .carousel-inner .active,
    .carousel .carousel-inner .carousel-item {
      height: 100%;
    }

    @media (max-width: 776px) {
      .carousel {
        height: 100%;
      }
    }

    .page-footer {
      background-color: #929fba;
    }
  </style>



</head>

<body style="background-image: url('img/back.jpg');">
  <div class="container my-5" style="background-color: rgb(255, 254, 240); padding: 30px;">
    <!-- Section: Block Content -->
    <section>
      <div align="center">
        <img src="img/CWS.png" alt="" width="70" height="70" /><br />
        <p>CREX Web Service</p>
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
      <p class="lead text-center text-muted pt-2 mb-5">Your CREX Coin</p>

      <div align="center" style="color: white;">
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card classic-admin-card" style="background-color: rgb(255, 208, 0);">
            <div class="card-body py-3">
              <i class="far fa-money-bill-alt"></i>
              <p class="small">Amount:</p>
              <?php

              echo "<h4>" . $_SESSION['crexcoin'] . "</h4>";

              ?>
            </div>
            <div class="card-body pt-2 pb-3">
              <p class="small mb-0">
                Use Your CREX Coins to redeem your special discounts 😄
              </p>
            </div>
          </div>
        </div>
        <a href="user_order.php"> <button class="btn btn-danger">Your Orders</button> </a>
      </div>
    </section>
    <!-- Section: Block Content -->
    <br />
    <hr class="w-header my-4" />
    <br />
    <!--Section: Products v.3-->
    <section class="text-center mb-4">
      <p class="lead text-center text-muted pt-2 mb-5">Products you can buy</p>
      <div class="row wow fadeIn">
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <div class="view overlay">
              <img src="img/products/out_1.jpg" class="card-img-top" alt="" />
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <div class="card-body text-center">
              <h4>Product_1</h4>

              <h6 class="font-weight-bold blue-text">
                <p style="color: #0F4C75;">Rs.150 + 100 CrexCoin (<del>Rs.250</del>)</p>
                <a href="product.php?product=product_1"><button type="button" class="btn btn-outline-danger">Buy Now</button></a>
              </h6>
            </div>
          </div>
        </div>

        <!-- 2-->
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <div class="view overlay">
              <img src="img/products/out_2.jpg" class="card-img-top" alt="" />
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <div class="card-body text-center">
              <h4>Product_2</h4>

              <h6 class="font-weight-bold blue-text">
                <p style="color: #0F4C75;">Rs.250 + 100 CrexCoin (<del>Rs.350</del>)</p>
                <a href="product.php?product=product_2"><button type="button" class="btn btn-outline-danger">Buy Now</button></a>
              </h6>
            </div>
          </div>
        </div>
        <!-- 3 -->
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <div class="view overlay">
              <img src="img/products/out_3.jpg" class="card-img-top" alt="" />
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <div class="card-body text-center">
              <h4>Product_3</h4>

              <h6 class="font-weight-bold blue-text">
                <p style="color: #0F4C75;">Rs.300 + 100 CrexCoin (<del>Rs.400</del>)</p>
                <a href="product.php?product=product_3"><button type="button" class="btn btn-outline-danger">Buy Now</button></a>
              </h6>
            </div>
          </div>
        </div>
        <!-- 4 -->
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <div class="view overlay">
              <img src="img/products/out_4.jpg" class="card-img-top" alt="" />
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <div class="card-body text-center">
              <h4>Product_4</h4>

              <h6 class="font-weight-bold blue-text">
                <p style="color: #0F4C75;">Rs.200 + 100 CrexCoin (<del>Rs.300</del>)</p>
                <a href="product.php?product=product_4"><button type="button" class="btn btn-outline-danger">Buy Now</button></a>
              </h6>
            </div>
          </div>
        </div>
      </div>
  </div>
  </section>
  <!--Section: Products v.3-->
  </div>
</body>

</html>