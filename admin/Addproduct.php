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
    <title>Add Products</title>

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
                            <h1>Add Products</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add Products</li>
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
                                    <h3 class="card-title">Add Products</h3>
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
                        // $packagetype = $_POST["txtpackage"];
                        $price = $_POST["txtprice"];
                        $subcatid = $_POST["subcatid"];
                        // $img1 = $_POST["txtfile1"];
                        // $img2 = $_POST["txtfile2"];
                        // $img3 = $_POST["txtfile3"];
                        $videourl = $_POST["txturl"];
                        $active = $_POST["active"];

                        //upload image1
                        $ext = pathinfo($_FILES["txtfile1"]["name"],PATHINFO_EXTENSION);//jpg
                        $filename1 = time().rand(1111,9999).".".$ext;
                        //412365214758789.jpg
                        move_uploaded_file($_FILES["txtfile1"]["tmp_name"],"uploads/products/".$filename1);

                        //upload image2
                        $ext = pathinfo($_FILES["txtfile2"]["name"],PATHINFO_EXTENSION);//jpg
                        $filename2 = time().rand(1111,9999).".".$ext;
                        //412365214758789.jpg
                        move_uploaded_file($_FILES["txtfile2"]["tmp_name"],"uploads/products/".$filename2);

                        //upload image3
                        $ext = pathinfo($_FILES["txtfile3"]["name"],PATHINFO_EXTENSION);//jpg
                        $filename3 = time().rand(1111,9999).".".$ext;
                        //412365214758789.jpg
                        move_uploaded_file($_FILES["txtfile3"]["tmp_name"],"uploads/products/".$filename3);

                        //insert record
                        $result = mysqli_query($conn, "INSERT INTO `product` (`title`, `description`, `spacification`, `price`,`img1`,`img2`,`img3`,`video_url`, `isactive`,`subcatid`) VALUES ('$title',' $description','$spacification','$price','$filename1','$filename2','$filename3','$videourl','$active','$subcatid')") or die(mysqli_error($conn));

                        if($result==true)
                        {
                            echo '<div class="alert m-2 alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            Data inserted successfully!
                            </div>';
                        }
                        else{
                            echo '<div class="alert m-2alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                            record not inserted!!
                            </div>';
                        }
                    }
                                ?>
                                <!-- form start -->
                                <form id="form1" method="post" enctype="multipart/form-data">
                                    <div class="card-body">

                                       <div class="form-group">
                                            <div class="form-group">
                                            <label for="subcatid">Subcatagory </label>
                                            <select class="form-control"  name="subcatid" id="subcatid">
                                                <?php
                                                $result = mysqli_query($conn,"select * from subcategory order by subcatid desc")or die(mysqli_error($conn));
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                ?>
                                                <option value="<?php
                                                echo $row["subcatid"]?>">
                                                <?php
                                                echo $row["subcatname"]
                                                ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="txttitle">Title</label>
                                            <input type="text" name="txttitle" class="form-control" id="txttitle">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtdesc">Description</label>
                                            <input type="text" name="txtdesc" class="form-control" id="txtdesc">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtcatname">Spacification</label>
                                            <input type="text" name="txtspacification" class="form-control" id="txtcatname">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="txtprice">Price</label>
                                            <input type="text" name="txtprice" class="form-control" id="txtprice">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtfile1">Image1</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="txtfile1" class="custom-file-input"
                                                        id="txtfile1">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtcatname">Image2</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="txtfile2" class="custom-file-input"
                                                        id="txtfile2">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtcatname">Image3</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="txtfile3" class="custom-file-input"
                                                        id="txtfile3">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtvideo">Video Url</label>
                                            <input type="text" name="txturl" class="form-control" id="txturl">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                            <label for="txtactive">is Active</label>
                                            <select class="form-control"  name="active" id="active">
                                                <option value="yes">yes</option>
                                                <option value="no">no</option>
                                                
                                            </select>
                                        </div>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer text-center">
                                        <button type="submit" name="btnsubmit"class="btn btn-primary">Save</button>
                                    </div>
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