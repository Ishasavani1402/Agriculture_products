<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>my iteam</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--Default CSS-->
    <link href="css/default.css" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!--Color Switcher CSS-->
    <link rel="stylesheet" href="css/color/color-default.css">
    <!--Plugin CSS-->
    <link href="css/plugin.css" rel="stylesheet" type="text/css">
    <!--Flaticons CSS-->
    <link href="fonts/flaticon.css" rel="stylesheet" type="text/css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <style>
       .content
      {
        background-color:#ffffff;
      }
    </style>
</head>
<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <!-- Preloader Ends -->

    <!-- header starts -->
   <?php
   include "header.php";
   ?>
    <!-- header ends -->

    <!-- Breadcrumb -->
    <!-- BreadCrumb Ends -->
    
    <!-- iteam starts -->
   
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                
                <!-- <a href="Additeam.php" class="btn float-right bg-gradient-primary">Add</a> -->
              </div>
              <!-- /.card-header -->
             
              <div class="card-body container">
                <div class="row">
                <div class="col-md-1"></div>
                  <div class="col-md-10">
                  <h3 class="card-title" style="font-weight:bold">All Iteams</h3>
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <!-- <th>#</th> -->
                    
                    <th>Order id</th>
                    <th>Product</th>
                    <th>Quntity</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $id=$_GET["id"];
                    $result = mysqli_query($conn,"select * from items as i left join product as p on p.product_id=i.product_id where i.order_id='$id'order by item_id desc")or die(mysqli_error($conn));
                    while($row=mysqli_fetch_assoc($result))
                    {
                    ?>
                  <tr>
                    
                    <td>
                      <?php
                      echo $row["order_id"];
                      ?>
                    </td>
                    <td>
                      <?php
                      echo $row["title"];
                      ?>
                    </td>
                    <td>
                      <?php
                      echo $row["qty"];
                      ?>
                    </td>
                    <td>

                    <?php
                    $pid=$row["product_id"];
                    $oid=$row["order_id"];
                      $res = mysqli_query($conn,"select * from review where product_id='$pid' and order_id='$oid'");
                      if(mysqli_num_rows($res)<=0)
                      {
                    ?>
                    <a href="review.php?pid=<?php
                      echo $row["product_id"];
                      ?>&oid=<?php
                      echo $row["order_id"];
                      ?>" type="button" class="btn btn-info">review</a>

                      <?php } else {

                        echo "Already Given";
                      }?>
                    </td>
                    
                  </tr>
                 <?php
                    }
                 ?>
                  </tbody>
                  <tfoot>
                  
                  </tfoot>
                </table>
                  </div>
                </div>
              </div>
              
            </div>
            
          </div>
         
        </div>
        
      </div>

    </section>
    <!-- Shop Ends -->

   <!-- footer starts -->
   <?php
   include "footer.php";
   ?>
    <!-- footer ends -->

    <!-- Back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    <!-- Back to top ends -->

    <!-- search popup -->
   

    <!-- *Scripts* -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/custom-nav.js"></script>

</body>
</html>