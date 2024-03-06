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
    <title>Add Articals</title>

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
                            <h1>Add Articals</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="br
                                eadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add Articals</li>
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
                                    <h3 class="card-title">Add Articals</h3>
                                    <a href="viewArticals.php"
                                        class="btn btn-sm float-right bg-gradient-danger">View</a>
                                </div>
                                <!-- /.card-header -->
                                <?php
                                    if(isset($_POST["btnsubmit"]))
                                    {
                                        $title = $_POST["txttitle"];
                                        $desctription = $_POST["txtdes"];
                                        $active = $_POST["txtactive"];
                                        $reference = $_POST["txtref"];
                                        
                                        //upload image1
    $ext = pathinfo($_FILES["txtfile1"]["name"],PATHINFO_EXTENSION);//jpg
$filename1 = time().rand(1111,9999).".".$ext;//412365214758789.jpg
move_uploaded_file($_FILES["txtfile1"]["tmp_name"],"uploads/Articals/".$filename1);
                                        //upload image2
                                        $ext = pathinfo($_FILES["txtfile2"]["name"],PATHINFO_EXTENSION);//jpg
$filename2 = time().rand(1111,9999).".".$ext;//412365214758789.jpg
move_uploaded_file($_FILES["txtfile2"]["tmp_name"],"uploads/Articals/".$filename2);
                                        //record inserted
                                        $result = mysqli_query($conn,"insert into artical (title,description,img1,img2,isactive,ref_website) values('$title','$desctription','$filename1','$filename2','$active','$reference')") or die(mysqli_error($conn));
                                        if($result == true)
                                        {
                                            echo '<div class="alert m-2 alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                                            Data inserted successfully!
                                          </div>';
                                        }
                                        else{
                                            echo '<div class="alert m-2 alert-dangure alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                                            Data not successfully!
                                          </div>';
                                        }

                                    }
                                ?>
                                <!-- form start -->
                                <form method="post" id="form1"enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="txttitle">Title</label>
                                            <input type="text" name="txttitle" class="form-control" id="txttitle">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtdes">Description</label>
                                            <input type="text" name="txtdes" class="form-control" id="txtdes">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtfile1">Image 1</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="txtfile1" class="custom-file-input" id="txtfile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                     </div>
                                                </div>
                                        </div>
                 
                                        <div class="form-group">
                                            <label for="txtfile2">Image 2</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="txtfile2" class="custom-file-input" id="txtfile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                     </div>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                            <label for="txtactive">is Active</label>
                                            <select class="form-control"  name="txtactive" id="txtactive">
                                                <option value="yes">yes</option>
                                                <option value="no">no</option>
                                                
                                            </select>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtref">Reference website</label>
                                            <input type="text" name="txtref" class="form-control" id="txtref">
                                        </div>
                                       
                                        


                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer text-center">
                                        <button name="btnsubmit" type="submit" class="btn btn-primary">Save</button>
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
                txttitle:
                {
                    required:true
                },
                txtdes:
                {
                    required:true
                },
                txtref:
                {
                    required:true
                },  
            }
        });
    });
    </script>
</body>

</html>