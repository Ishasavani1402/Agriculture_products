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
  <title>View Products</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
            <h1>Manage product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">view All products</h3>
                <a href="Addproduct.php" class="btn float-right bg-gradient-primary">Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                if(isset($_GET["id"]))
                {
                  $id=$_GET["id"];
                  $result=mysqli_query($conn,"delete from product where product_id ='$id'")or die(mysqli_error($conn));
                  echo "<script>window.location='viewproduct.php';</script>";
                }
                ?>
                <table id="example1" class="table table-bordered table-striped" width="1000">
                  <thead>
                  <tr>
                    <!-- <th>#</th> -->
                    <!-- <th>Product id</th> -->
                    <th>SubCategory</th>
                    <th>title</th>

                    <th>Price</th>
                    <th>Image1</th>
                    <th>is active</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $result = mysqli_query($conn,"SELECT * FROM product as p left join subcategory as s on s.subcatid =p.subcatid where p.isactive='yes'  order by p.product_id desc") or die(mysqli_error($conn));
                    while($row=mysqli_fetch_assoc($result))
                    {
                    ?>
                    <tr>
                     <!-- <td>
                     <?php
                      echo $row["product_id"];
                      ?>
                     </td> -->
                     <td>
                      <?php
                      echo $row["subcatname"];
                      ?>
                     </td>
                     <td>
                      <?php
                      echo $row["title"];
                      ?>
                     </td>
                     <td>
                      <?php
                      echo $row["price"];
                      ?>
                     </td>
                     <td>
                       <img src="uploads/products/<?php
                      echo $row["img1"];
                      ?>" width="100"/>
                     </td>
                     <td>
                      <?php
                      echo $row["isactive"];
                      ?>
                     </td>
                     
                     <td style="display:flex">
                      
                      <a href="?id=<?php echo $row["product_id"];?>" class="btn bg-gradient-danger" style="margin:3px">Delete</a>
                      <a href="updateproduct.php?id=<?php echo $row["product_id"];?>" class="btn bg-gradient-warning" style="margin:3px">Edit</a>
                      <a href="singleproduct.php?id=<?php echo $row["product_id"];?>" class="btn bg-gradient-primary" style="margin:3px">ViewMore</a>
                      
                     </td>
                    </tr>
                  <!-- <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                  </tr> -->
                 <?php
                    }
                 ?>
                  </tbody>
                  <tfoot>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,"scrollX": true,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
