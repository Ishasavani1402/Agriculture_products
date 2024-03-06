<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>myorder</title>
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
    <!-- table start -->
   
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="font-weight:bold">my order</h3>
                <!-- <a href="Addaddress.php" class="btn float-right bg-gradient-primary">Add</a> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <!-- <th>#</th> -->
                    <th>order_id</th>
                    <th>address</th>
                    <th>total payment</th>
                    <th>ispay</th>
                    <th>payment method</th>
                    <th>transaction number</th>
                    <!-- <th>status</th> -->
                    <th>orderdate</th>
                    <th>Items</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $id=$_SESSION["userid"];
                    $result = mysqli_query($conn,"select * from tbl_orders as o left join address as a on a.address_id= o.address_id where o.user_id='$id' order by o.order_id desc") or die(mysqli_error($conn));
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
                        echo $row["address"];
                        ?>
                      </td>
                      <td>
                        <?php
                        echo $row["totalpayment"];
                        ?>
                      </td>
                      <td>
                        <?php
                        echo $row["ispay"];
                        ?>
                      </td>
                      <td>
                        <?php
                        echo $row["paymentmethod"];
                        ?>
                      </td>
                      
                      <td>
                        <?php
                        echo $row["trans_num"];
                        ?>
                      </td>
                      <!-- <td>
                        <?php
                        echo $row["status"];
                        ?>
                      </td> -->
                      <td>
                        <?php
                        echo $row["orderdate"];
                        ?>
                      </td>
                      <td>
                      <a href="myiteam.php?id=<?php
                        echo $row["order_id"];
                        ?>" type="button" class="btn btn-info">Iteams</a>
                        
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