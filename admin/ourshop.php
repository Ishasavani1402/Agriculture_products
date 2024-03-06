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
    <!-- shop starts -->
    <section class="shop">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                    <div class="row">
                   
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="shop-item mar-bottom-30">
                                <div class="shop-image">
                                    <img src="admin/uploads/products/<?php echo $row["img1"]; ?>" alt="image">
                                </div>
                                <div class="shop-content">
                                    <h4></h4>
                                    <div class="shop-price">
                                        <ins><span>Rs.</span></ins>
                                    </div>
                                    <a class="biz-btn-black mar-top-20" href="productdetail.php">Details</a>
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
    <script src="js/color-switcher.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/custom-nav.js"></script>

</body>
</html>