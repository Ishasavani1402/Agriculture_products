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
    <title>update Shop</title>

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
                            <h1>update Shop Detais</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">update Shop Detais</li>
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
                                    <h3 class="card-title">update Shop Detais</h3>
                                    <a href="viewshop.php"
                                        class="btn btn-sm float-right bg-gradient-danger">View</a>
                                </div>
                                <!-- /.card-header -->
                                <?php
                                if(isset($_POST["btnsubmit"]))
                                {
                                    $shopname = $_POST["txtshopname"];
                                    $address = $_POST["txtaddress"];
                                    $landmark = $_POST["txtlandmark"];
                                    $pincode = $_POST["txtpincode"];
                                    $latitude = $_POST["txtlatitude"];
                                    $longitude = $_POST["txtlogitude"];
                                    $emailid = $_POST["txtemail"];
                                    $contact = $_POST["txtcontact"];
                                    $contactperson = $_POST["txtcontactperson"];
                                    $aboutshop = $_POST["txtabout"];
                                    $active = $_POST["active"];
                                    $cityid = $_POST["cityid"];
                                    $id = $_GET["id"];

                                    //update image
                                    if(empty($_FILES["txtfile"]["name"]))
                                    {
                                      $filename = $_POST["txtoldimage"];
                                    }
                                    else
                                    {
                                      unlink("uploads/shop/".$_POST["txtoldimage"]);
                                      $ext = pathinfo($_FILES["txtfile"]["name"],PATHINFO_EXTENSION);//jpg
                                      $filename = time().rand(1111,9999).".".$ext;//412365214758789.jpg
                                      move_uploaded_file($_FILES["txtfile"]["tmp_name"],"uploads/shop/".$filename);
                                    }
                                    
                                    //update record
                                    $res = mysqli_query($conn,"update shop set `shopname`='$shopname',`address`='$address',`landmark`=' $landmark',`pincode`='$pincode',`city_id`='$cityid',`latitude`='$latitude',`longitude`='$longitude',`shop_photo`='$filename',`e-mail`='$emailid',`contact`='$contact',`contact_person`='$contactperson',`about_shop`='$aboutshop',`is_active`='$active' where `shop_id`='$id'") or die(mysqli_error($conn));

                                    if($res==true)
                                    {
                                        echo "<script>window.location='viewshop.php';</script>";
                                    }
                                    else
                                    {
                                        echo "not updated";
                                    }
                                }
                                ?>

                                <?php 
                                $id = $_GET["id"];
                                $res = mysqli_query($conn,"select * from shop where shop_id='$id'");
                                $updata = mysqli_fetch_assoc($res);
                                ?>
                                <!-- form start -->
                                <form method="post" id="form1"enctype="multipart/form-data">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="txtshopname">Shop name</label>
                                            <input type="text" name="txtshopname" class="form-control" id="txtshopname"value="<?php echo $updata["shopname"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtaddress">Address</label>
                                            <input type="txtaddress" name="txtaddress" class="form-control" id="txtaddress" value="<?php echo $updata["address"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtlandmark">landmark</label>
                                            <input type="text" name="txtlandmark" class="form-control" id="txtlandmark"value="<?php echo $updata["landmark"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtpincode">pincode</label>
                                            <input type="text" name="txtpincode" class="form-control" id="txtpincode"value="<?php echo $updata["pincode"];?>">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                            <label for="txtcity">city </label>
                                            <select class="form-control"  name="cityid" id="txtcity">
                                                <?php 
                                                $result = mysqli_query($conn,"select * from city order by city_id desc")or die(mysqli_error($conn));
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                ?>
                                                <option  <?php if($row["city_id"]==$updata["city_id"]) {  ?> selected <?php } ?>value="<?php echo $row["city_id"];?>"><?php echo $row["city_name"];?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="txtlatitude">Latitude</label>
                                            <input type="text" name="txtlatitude" class="form-control" id="txtlatitude"value="<?php echo $updata["latitude"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtlogitude">Logitude</label>
                                            <input type="text" name="txtlogitude" class="form-control" id="txtlogitude" value="<?php echo $updata["longitude"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtfile">Shop Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="txtfile" class="custom-file-input"
                                                        id="txtfile">
                                                        <input type="hidden" name="txtoldimage" class="form-control"  value="<?php echo $updata["shop_photo"];?>">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>

                                            </div>
                                            <br/>
                      <img src="uploads/shop/<?php
                      echo $updata["shop_photo"];
                      ?>" width="100"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtemail">email-id</label>
                                            <input type="email" name="txtemail" class="form-control" id="txtemail"value="<?php echo $updata["e-mail"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtcontact">contact</label>
                                            <input type="text" name="txtcontact" class="form-control" id="txtcontact"value="<?php echo $updata["contact"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtcontactperson">contact person</label>
                                            <input type="text" name="txtcontactperson" class="form-control" id="txtcontactperson"value="<?php echo $updata["contact_person"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtabout">About Shop</label>
                                            <input type="text" name="txtabout" class="form-control" id="txtabout"value="<?php echo $updata["about_shop"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="active">is Active</label>
                                            <select class="form-control"  name="active" id="active">
                                                <option value="yes">yes</option>
                                                <option value="no">no</option>
                                               
                                            </select>
                                        </div>
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
    <!-- Page specific script -->    
</body>

</html>