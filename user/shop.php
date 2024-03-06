<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shop</title>
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
        .star-rating::before {
        /* What also works: "⭐⭐⭐⭐⭐" or "💛💛💛💛💛" or other characters. */
        content: "⭐⭐⭐⭐⭐";
        }

        .star-rating {
            display: inline-block;
            background-clip: text;
            -webkit-background-clip: text;
            color: rgba(0, 0, 0, 0.1);
        }
        section.shop
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

    
    
    <!-- shop starts -->
    <section class="shop"style="
    padding-top: 80px;">
        <div class="container">
            <div style="text-align:center">
                <form method="post">
                    <input type="search" name="txtsearch" class=""/>
                    <button type="submit" name="btnsearch" class="biz-btn-black mar-top-20 mar-bottom-20">Search</button>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                    <div class="row">
                        
                    <?php

                    if(isset($_POST["btnsearch"]))
                    {
                        $search = $_POST["txtsearch"];
                        $result = mysqli_query($conn,"SELECT *,(select AVG(rating) from review where product_id=p.product_id) as totalrating FROM product as p left join subcategory as s on s.subcatid =p.subcatid where p.title like '%$search%'  order by p.product_id desc") or die(mysqli_error($conn));
                    }
                    else if(isset($_GET["catid"]))
                    {
                        $cid=$_GET["catid"];
                        $result = mysqli_query($conn,"SELECT *,(select AVG(rating) from review where product_id=p.product_id) as totalrating FROM product as p left join subcategory as s on s.subcatid =p.subcatid where s.catid='$cid' order by p.product_id desc") or die(mysqli_error($conn));
                    }
                    else
                    {
                        $result = mysqli_query($conn,"SELECT *,(select AVG(rating) from review where product_id=p.product_id) as totalrating FROM product as p left join subcategory as s on s.subcatid =p.subcatid  order by p.product_id desc") or die(mysqli_error($conn));
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
                                    <h4 class="bold"><?php
                      echo $row["title"];
                      ?></a></h4>
                                    <div class="shop-price">
                                        <ins><span>Rs. <?php
                      echo $row["price"];
                      ?></span></ins>
                                    </div>
                                    <p>

                                    <?php
                                $total = $row["totalrating"] * 100  / 5;

                                    ?>
                                    <div
  class="star-rating"
  style="background-image: linear-gradient(
      to right,
      gold 0%,
      gold <?php echo $total; ?>%,
      transparent <?php echo $total; ?>%,
      transparent 100%);
  "
><!-- Don't forget to add an accessible alternative! --></div>    
                                    </p>
                                    <a class="biz-btn-black mar-top-20" href="productdetail.php?id=<?php echo $row["product_id"]; ?>">Details</a>
                                </div>
                            </div>
                        </div>
                       <?php } ?>
                       
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

   

    <!-- search popup -->
   

    <!-- *Scripts* -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/rating.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/custom-nav.js"></script>

</body>
</html>