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
  <title>update Category</title>

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
            <h1>Add Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Category</li>
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
                <h3 class="card-title">Add Catagory</h3>
                <a href="viewcategory.php" class="btn btn-sm float-right bg-gradient-danger">View</a>
              </div>
              <!-- /.card-header -->
              <?php
if(isset($_POST["btnsubmit"]))
{
$catagoryname = $_POST["txtcatname"];
$id = $_GET["id"];

if(empty($_FILES["txtfile"]["name"]))
{
  $filename = $_POST["txtoldimage"];
}
else
{
  unlink("uploads/category/".$_POST["txtoldimage"]);
  $ext = pathinfo($_FILES["txtfile"]["name"],PATHINFO_EXTENSION);//jpg
  $filename = time().rand(1111,9999).".".$ext;//412365214758789.jpg
  move_uploaded_file($_FILES["txtfile"]["tmp_name"],"uploads/category/".$filename);
}


$result = mysqli_query($conn, "update category set catname='$catagoryname',catimage='$filename' where catid = '$id'") or die(mysqli_error($conn));

if($result==true)
{
  echo  "<script>window.location='viewcategory.php';</script>";
}
else
{
  echo "not inserted";
}
}
?>

<?php
$id = $_GET["id"];
$res = mysqli_query($conn,"select * from category where catid = '$id'");
$updata = mysqli_fetch_assoc($res);
?>
              <!-- form start -->
              <form id="form1"method="post" enctype="multipart/form-data">
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="txtcatname">Category Name</label>
                    <input type="text" name="txtcatname" class="form-control" id="txtcatname" value="<?php echo $updata["catname"];?>">
                    <input type="hidden" name="txtoldimage" class="form-control"  value="<?php echo $updata["catimage"];?>">
                  </div>
                  <div class="form-group">
                    <label for="txtfile">Category Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="txtfile" class="custom-file-input" id="txtfile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                    <br/>
                      <img src="uploads/category/<?php
                      echo $updata["catimage"];
                      ?>" width="100"/>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                  <button type="submit" name="btnsubmit"class="btn btn-primary">update</button>
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
      txtcatname:
      {
        required:true
      },
    }
  });
});
</script>
</body>
</html>
