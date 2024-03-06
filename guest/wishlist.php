<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>my wishlist</title>
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
    <div id="search1">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <!-- table start -->

    <?php
    if(isset($_GET["id"]))
    {
      $qty = "1";
      $pid=$_GET["id"];
      $userid=$_SESSION["userid"];

$check = mysqli_query($conn,"select * from cart where user_id='$userid' and product_id='$pid'");

if(mysqli_num_rows($check)>=1)
{
  $result = mysqli_query($conn,"update cart set qty=qty+$qty where user_id='$userid' and product_id='$pid'") or die(mysqli_qeury($conn));
}
else
{
  $result = mysqli_query($conn,"insert into cart (user_id,product_id,qty) values ('$userid','$pid','$qty')") or die(mysqli_qeury($conn));
}
      


if($result)
{
  $wid=$_GET["wid"];
  mysqli_query($conn,"delete from wishlist where wislst_id='$wid'");
  echo "<script>window.location='cart.php';</script>";
}
    }
    ?>
   
    <section class="content">
      <div class="container-fluid">
      <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                    <div class="row">
                    <?php
                    $id=$_SESSION["userid"];
                    $result = mysqli_query($conn,"SELECT * FROM product as p left join wishlist as w on w.product_id=p.product_id where w.user_id='$id'") or die(mysqli_error($conn));
                    if(mysqli_num_rows($result)<=0)
                    {
                        echo "<h1 style='text-align:center;'>Empty wishlist!</h1>";
                    }
                   
                    while($row=mysqli_fetch_assoc($result))
                    {
                    ?>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="shop-item mar-bottom-30">
                                <div class="shop-image">
                                    <img src="../admin/uploads/products/<?php echo $row["img1"]; ?>" alt="image">
                                </div>
                                <div class="shop-content">
                                    <h4><?php
                      echo $row["title"];
                      ?></a></h4>
                                    <div class="shop-price">
                                        <ins><span>Rs. <?php
                      echo $row["price"];
                      ?></span></ins>
                                    </div>
                                    <a class="biz-btn-black mar-top-20" href="wishlist.php?id=<?php echo $row["product_id"]; ?>&wid=<?php echo $row["wislst_id"]; ?>">Add to cart</a>
                                </div>
                            </div>
                        </div>
                       <?php } ?>
                       
                    </div>
                </div>
              
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