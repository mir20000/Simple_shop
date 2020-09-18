<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</head>
<body style="background-image: url('img/back.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <!-- Main navigation -->
<div class="container-fluid mt-3 mb-5">
  
    <!-- Full Page Intro -->
    
      <!-- Mask & flexbox options-->
      <div class="mask d-flex justify-content-center align-items-center">
        <!-- Content -->
        <div class="container py-5 my-5">
            <center><img src="img/CWS.png" alt="" width="70" height="70" /></center>
          
          <br>
          <!--Grid row-->
          <div class="row d-flex align-items-center justify-content-center">
            <!--Grid column-->
            <div class="col-md-6 col-xl-5">
              <!--Form-->
              <div class="card">
                <div class="card-body z-depth-2 px-4">
                  <p class="lead text-center pt-2 mb-5">SIGN UP</p>
                  <form action="sign_up_insert.php" method="post">
                    <div class="md-form mt-3">
                      <input type="text" id="form3" class="form-control" placeholder="Your name" name="yname" required>
                    </div>
                    <br>
                    <div class="md-form">
                      <input type="email" id="form2" class="form-control" placeholder="Your email" name="yemail" required>
                      <?php
                      if (isset($_GET['error'])) {
                        $error= $_GET['error'];
                      if ($error == 'exist') {
                        echo "<p style='color:red'>Email is already exist</p>";
                      }
                      }
                      ?>
                    </div>
                    <br>
                    <div class="md-form">
                      <input type="password" id="form4" class="form-control" minlength="8" placeholder="Your password" name="pswd" required>
                    </div>
                    <div class="md-form mt-4">
                      <input type="password" id="form" class="form-control" minlength="8" placeholder="Re-enter Your Password" name="repswd" required>
                      <?php
                      if (isset($_GET['error'])) {
                        $error= $_GET['error'];
                      if ($error == 'notmatched') {
                        echo "<p style='color:red'>Please enter the same password</p>";
                      }
                      }
                      ?>
                    </div>
                    <div class="md-form mt-4">
                      <label >Date of Birth</label>
                      <input type="date" id="form" class="form-control" placeholder="Date of Birth" name="dob" required>
                    </div><br>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Gender</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="gender">
                        <option></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>                  
                    <div class="text-center my-3">
                      <button type="submit" class="btn btn-primary btn-block" name="submit" value="submit">Sign In</button>
                    </div>
                    <div align = "center">Existing User? <a href="login.php">Log in</a></div>
                  </form>
                </div>
              </div>
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