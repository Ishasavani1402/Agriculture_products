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
    <title>Update City</title>

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
                            <h1>Add City</h1>
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
                                    <h3 class="card-title">Add City</h3>
                                    <a href="viewcity.php" class="btn btn-sm float-right bg-gradient-danger">View</a>
                                </div>
                                <!-- /.card-header -->
                                <?php
        if(isset($_POST["btnsubmit"]))
        {
            $cityname = $_POST["txtcityname"];
            $stateid=$_POST["state"];
            $id=$_GET["id"];

            $result = mysqli_query($conn,"update city set city_name='$cityname',stat_id='$stateid' where city_id='$id'") or die(mysqli_error($conn));

            if($result==true)
            {
                echo "<script>window.location='viewcity.php';</script>";
            }
            else
            {
            echo "not update";
            }

        }
?>


<?php
$id=$_GET["id"];
$res = mysqli_query($conn,"select * from city where city_id='$id'");
$updata = mysqli_fetch_assoc($res);
?>
                                <!-- form start -->
                                <form id="form1"method="post">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="txtcityname">City Name</label>
                                            <input type="text" 
                                            name="txtcityname" class="form-control" id="txtcityname"
                                            value="<?php echo $updata["city_name"]; ?>"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label for="state">State </label>
                                            <select class="form-control" name="state" id="state">
                                    <?php
                                    $result = mysqli_query($conn,"select * from state order by stat_id desc")or die(mysqli_error($conn));
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                    <option <?php if($row["stat_id"]==$updata["stat_id"]) {  ?> selected <?php } ?> value="<?php echo $row["stat_id"]?>"><?php echo $row["stat_name"]?></option>
                                    <!-- <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option> -->
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </div>


                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer text-center">
                                        <button name="btnsubmit" type="submit" class="btn btn-primary">Update</button>
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