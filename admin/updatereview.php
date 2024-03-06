<?php
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>update review</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'header.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage review</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">manage review</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 m-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">manage review</h3>
                <a href="viewreview.php" class="btn btn-sm float-right bg-gradient-danger">View</a>
              </div>
              <!-- /.card-header -->
              <?php
            if(isset($_POST["btnsubmit"]))
            {
                $id=$_GET["id"];
                $isactive = $_POST["txtactive"];
                $result = mysqli_query($conn,"update review set isactive='$isactive' where review_id='$id'");
                if($result)
                {
                    echo "<script>window.location='viewreview.php';</script>";
                }
                else
                {
                    echo "Error";
                }
            }
  ?>
              <!-- form start -->
              <?php
                                $id = $_GET["id"];
                                $res = mysqli_query($conn,"select * from review where review_id  ='$id'");
                                $updata = mysqli_fetch_assoc($res);
                                
                                ?>
              <form id="form1"method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="txtstatename">is active</label>
                    <select class="form-control"  name="txtactive" id="active">
                                                <option <?php if($updata["isactive"]=="yes") { ?>selected <?php }?> value="yes">yes</option>
                                                <option <?php if($updata["isactive"]=="no") {?>selected <?php } ?> value="no">no</option>
                                                
                                            </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                  <button type="submit" name="btnsubmit" class="btn btn-primary">update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.php'; ?>

 
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->

    <!-- jquery file for validation -->
<script src="plugins/jquery.validate.js"></script>
<script src="plugins/additional-methods.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
$(document).ready(function(){
  $("#form1").validate({
    rules:
    {
      txtstatename:
      {
        required:true
      }, 
    }
  })
})
</script>
</body>
</html>
