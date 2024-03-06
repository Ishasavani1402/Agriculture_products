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
    <title>view more detail for Products</title>

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
                            <h1>view more Products</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">view more Products</li>
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
                                    <h3 class="card-title">view more detail Products</h3>
                                    <a href="viewproduct.php"
                                        class="btn btn-sm float-right bg-gradient-danger">View</a>
                                </div>
                                <!-- /.card-header -->
                <?php
                if(isset($_POST["btnsubmit"]))
                    {
                        $title = $_POST["txttitle"];
                        $description = $_POST["txtdesc"];
                        $spacification = $_POST["txtspacification"];
                        $packagetype = $_POST["txtpackage"];
                        $price = $_POST["txtprice"];
                        $subcatid = $_POST["subcatid"];
                        $id = $_GET["id"];
                        // $img1 = $_POST["txtfile1"];
                        // $img2 = $_POST["txtfile2"];
                        // $img3 = $_POST["txtfile3"];
                        $videourl = $_POST["txturl"];
                        $active = $_POST["active"];


                        if(empty($_FILES["txtfile1"]["name"]))
                        {
                            $filename1 = $_POST["txtoldimage"];
                        }
                        else
                        {
                            unlink("uploads/products/".$_POST["txtoldimage"]);
                            $ext = pathinfo($_FILES["txtfile1"]["name"],PATHINFO_EXTENSION);//jpg
                            $filename1 = time().rand(1111,9999).".".$ext;//412365214758789.jpg
                            move_uploaded_file($_FILES["txtfile1"]["tmp_name"],"uploads/products/".$filename1);
                        }

                        if(empty($_FILES["txtfile2"]["name"]))
                        {
                            $filename2 = $_POST["txtoldimage"];
                        }
                        else
                        {
                            unlink("uploads/products/".$_POST["txtoldimage"]);
                            $ext = pathinfo($_FILES["txtfile2"]["name"],PATHINFO_EXTENSION);//jpg
                            $filename2 = time().rand(1111,9999).".".$ext;//412365214758789.jpg
                            move_uploaded_file($_FILES["txtfile2"]["tmp_name"],"uploads/products/".$filename2);
                        }

                        if(empty($_FILES["txtfile3"]["name"]))
                        {
                            $filename3 = $_POST["txtoldimage"];
                        }
                        else
                        {
                            unlink("uploads/products/".$_POST["txtoldimage"]);
                            $ext = pathinfo($_FILES["txtfile3"]["name"],PATHINFO_EXTENSION);//jpg
                            $filename3 = time().rand(1111,9999).".".$ext;//412365214758789.jpg
                            move_uploaded_file($_FILES["txtfile3"]["tmp_name"],"uploads/products/".$filename3);
                        }

                        //update record
                        $result = mysqli_query($conn, "update product set title='$title',description='$description',spacification='$spacification',price='$price',video_url='$videourl',subcatid='$subcatid',img1='$filename1',img2='$filename2',img3='$filename3' where product_id ='$id'") or die(mysqli_error($conn));

                        if($result==true)
                        {
                            echo  "<script>window.location='viewproduct.php';</script>";
                        }
                        else{
                            echo '<div class="alert m-2alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                            record not updated!!
                            </div>';
                        }
                    }
                                ?>

                                <?php
                                $id = $_GET["id"];
                                $res = mysqli_query($conn,"select * from product where product_id ='$id'");
                                $updata = mysqli_fetch_assoc($res);
                                
                                ?>
                                <!-- form start -->
                                <form id="form1" method="post" enctype="multipart/form-data">
                                    <div class="card-body">

                                    <div class="form-group">
                                            <label for="txtshopname">discription</label>
                                            <p><?php echo $updata["description"];?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtshopname">spacification</label>
                                            <p><?php echo $updata["spacification"];?></p>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="txtimg2">img2</label>
                                            <br>
                                            <img src="uploads/products/<?php
                                            echo $updata["img2"];
                                            ?>" width="100"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtimg2">img3</label>
                                            <br>
                                            <img src="uploads/products/<?php
                                            echo $updata["img3"];
                                            ?>" width="100"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtshopname">video url</label>
                                            <p><?php echo $updata["video_url"];?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtshopname">is active</label>
                                            <p><?php echo $updata["isactive"];?></p>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                   
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'footer.php'; ?>
    </div>
    

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

    <!-- jquery file for validation -->
    <script src="plugins/jquery.validate.js"></script>
    <script src="plugins/additional-methods.js"></script>
    <!-- Page specific script -->
    <script>
    $(function() {
        bsCustomFileInput.init();
    });
    // validation
    $(document).ready(function(){
        $("#form1").validate({
            rules:
            {
                txttitle:
                {
                    required:true
                },
                txtdesc:
                {
                    required:true
                },
                txtspacification:
                {
                    required:true
                },
                txtprice:
                {
                    required:true
                },
                txturl:
                {
                    required:true
                },
            }
        });
    });
    </script>
</body>

</html>