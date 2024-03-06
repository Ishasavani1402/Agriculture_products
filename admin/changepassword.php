<?php 
session_start();
if(!isset($_SESSION["islogin"]))
{
  echo "<script>window.location='index.php';</script>";
}
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change password</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                            <h1>Reset password</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Reset password</li>
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
                                    <h3 class="card-title">forgot password?..Reset here.</h3>
                                    
                                </div>
                                <!-- /.card-header -->
                                <?php
                                if(isset($_POST["btnsubmit"]))
                                {
                                    $oldpassword = $_POST["txtoldpassword"];
                                    $newpassword = $_POST["txtnewpassword"];
                                    $confirmpassword = $_POST["txtconfirmpassword"];
                                    $adminid = $_SESSION["admin_id"];

                                    if($newpassword==$confirmpassword)
                                    {
                                        $res = mysqli_query($conn,"select * from admin where admin_id='$adminid' and password='$oldpassword'");
                                        if(mysqli_num_rows($res)<=0)
                                        {
                                          echo '<div class="alert m-2 alert-danger alert-dismissible">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                          <h5><i class="icon fas fa-check"></i> Error!</h5>
                                          old password not match!
                                        </div>';
                                        }
                                        else
                                        {
                                          $res = mysqli_query($conn,"update admin set password='$newpassword' where admin_id='$adminid'");

                                          echo '<div class="alert m-2 alert-success alert-dismissible">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                          <h5><i class="icon fas fa-check"></i> Success!</h5>
                                          Password updated!
                                        </div>';
                                        }
                                    }
                                    else
                                    {
                                    echo '<div class="alert m-2 alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Error!</h5>
                                    New and confirm password must match!
                                  </div>';
                                    }

                                }
                        ?>

                                <!-- form start -->
                                <form id="form1"method="post">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="txtcityname">Enter old password</label>
                                            <input type="password" name="txtoldpassword" class="form-control" id="txtcityname">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtcityname">Enter new password</label>
                                            <input type="password" name="txtnewpassword" class="form-control" id="txtcityname">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtcityname">Enter confirm password</label>
                                            <input type="password" name="txtconfirmpassword" class="form-control" id="txtcityname">
                                        </div>                                        


                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer text-center">
                                        <button name="btnsubmit" type="submit" class="btn btn-primary">Reset</button>
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
    $(function() {
        bsCustomFileInput.init();
    });
    $(document).ready(function(){
        $("#form1").validate({
            rules:
            {
                txtcityname:
                {
                    required:true
                },
            }
        });
    });
    </script>
</body>

</html>