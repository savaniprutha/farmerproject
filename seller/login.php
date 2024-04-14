<?php
session_start();
include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Farmer project - Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Farmer</b>Project</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php

      if(isset($_POST["btnlogin"]))
      {
        $username = $_POST["txtusername"];
        $password = $_POST["txtpassword"];

        $result = mysqli_query($conn,"select * from tbl_seller where user_name='$username' and password='$password'") or die(mysqli_error($conn));


        if(mysqli_num_rows($result)<=0)
        {
          echo "Login Failed!";
        }
        else
        {
          $_SESSION["islogin"]="yes";
          while($row=mysqli_fetch_assoc($result))
          {
            $_SESSION["seller_id"]=$row["seller_id"];
             $_SESSION["name"]=$row["name"];
          }
          echo "<script>window.location='dashboard.php';</script>";
        }

      }
      ?>

      <form  method="post">
        <div class="input-group mb-3">
          <input type="text" name="txtusername" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="txtpassword" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="btnlogin" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
          
        </div>

        <br>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              
              <label for="newuser">   
                New User ? ---
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="btnlogin" class="btn btn-primary btn-block" ><a href = "registerseller.php" style="color: white">Sign Up</a> </button>
          </div>
          <!-- /.col -->
          
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
