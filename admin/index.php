<?php
session_start();
include "connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Agriculture Project</title>

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
  <div class="login-logo">
    <a href="#"><b>Agriculture</b> - Admin login </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
     
      <?php
      if(isset($_POST["btnsubmit"]))
      {
        $email=$_POST["txtemail"];
        $password=$_POST["txtpassword"];

        $result=mysqli_query($conn,"select * from admin where emailid='$email' and password='$password'");
        if(mysqli_num_rows($result)<=0)
        {
          echo '<div class="alert m-2 alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
          <h5><i class="icon fas fa-check"></i> Error!</h5>
          Email or password not found!
        </div>';
        }
        else
        {
          $result=mysqli_query($conn,"select * from admin where emailid='$email' and password='$password'");
          while($row=mysqli_fetch_assoc($result))
          {
            $_SESSION["admin_id"]=$row["admin_id"];
          }
          $_SESSION["islogin"]="yes";
          echo "<script>window.location='dashboard.php';</script>";
        }
      }
      ?>

      <form  method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="email" name="txtemail" class="form-control" placeholder="Email">
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
          
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="btnsubmit"class="btn btn-primary btn-block">Sign In</button>
            <!-- <p class="bold">Need an Account?<a href="../vendor/registration.php"> Create your account</a></p> -->
          </div>
          <!-- /.col -->
        </div>
      </form>

      

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
