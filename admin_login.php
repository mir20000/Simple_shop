<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Log in</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body style="background-image: url('img/back.jpg'); background-repeat: repeat; background-size:cover; background-position: center center;">
  <!-- Main navigation -->
  <div class="container-fluid mt-3 mb-5">

    <!-- Full Page Intro -->

    <!-- Mask & flexbox options-->
    <div class="mask d-flex justify-content-center align-items-center">
      <!-- Content -->
      <div class="container py-5 my-5">
        <center><img src="img/CWS.png" alt="" width="70" height="70"></center>

        <br>
        <!--Grid row-->
        <div class="row d-flex align-items-center justify-content-center">
          <!--Grid column-->
          <div class="col-md-6 col-xl-5">
            <!--Form-->
            <form action="admin_login_insert.php" method="post">
              <div class="card">
                <div class="card-body z-depth-2 px-4">
                  <p class="lead text-center pt-2 mb-5">ADMIN LOG IN</p>
                  <?php
                  if (isset($_GET['message'])) {
                    $message = $_GET['message'];
                    if ($message == 'notmatched') {
                      echo "<p style='color:red'>EmailID or Password is invalid</p>";
                    }
                  }
                  ?>
                  <div class="md-form">
                    <input type="text" id="form2" class="form-control" placeholder="Your email" name="yemail" required>
                  </div>
                  <br>
                  <div class="md-form">
                    <input type="password" id="form4" class="form-control" placeholder="Your password" name="pswd" minlength="8" required>
                  </div>
                  <div class="text-center my-3">
                    <button type="submit" class="btn btn-primary btn-block" name="submit" value="submit">Log in</button>
                  </div>
                </div>

              </div>
            </form>

            <!--/.Form-->
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Content -->
    </div>
    <!-- Mask & flexbox options-->

    <!-- Full Page Intro -->

  </div>
  <!-- Main navigation -->
</body>

</html>