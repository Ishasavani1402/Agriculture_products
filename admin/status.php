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
  <title>check status</title>

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
            <h1>check status</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">check status</li>
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
                <h3 class="card-title">check status</h3>
                <a href="vieworder.php" class="btn btn-sm float-right bg-gradient-danger">View</a>
              </div>
              <!-- /.card-header -->
              <?php
              $st = $_GET["status"];
                    if(isset($_POST["btnsubmit"]))
                    {
                        $id=$_GET["id"];
                        $status=$_POST["txtstatus"];
                        $result=mysqli_query($conn,"update tbl_orders set status='$status' where order_id='$id'");
                        if($result)
                        {
                            echo "<script>window.location='vieworder.php';</script>";
                        }
                        else
                        {
                            echo "Error";
                        }
                    }
              ?>
              <!-- form start -->
              <form id="form1"method="post" enctype="multipart/form-data">
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="txtcatname">Check status</label>
                    <select name="txtstatus"  class="form-control" id="reting" placeholder="status" >
                        <option <?php if($st=="pending") { ?> selected <?php } ?>>pending</option>
                        <option <?php if($st=="complete") { ?> selected <?php } ?>>complete</option>
                        <option <?php if($st=="cancel") { ?> selected <?php } ?>>cancel</option>
                    </select>
                  </div>
                  <!-- <div class="form-group">
                    <label for="txtfile">Category Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="txtfile" class="custom-file-input" id="txtfile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                     
                    </div>
                  </div> -->
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                  <button type="submit" name="btnsubmit"class="btn btn-primary">Save</button>
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
        txtstatus:
      {
        required:true
      },
    }
  });
});
</script>
</body>
</html>
