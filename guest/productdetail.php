<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product details</title>
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

  

    <!-- Shop detail starts -->
    <section class="shop-main">
        <div class="container">
            <div class="row">

            <?php
            $id=$_GET["id"];
            $result = mysqli_query($conn,"SELECT * FROM product as p left join subcategory as s on s.subcatid =p.subcatid where p.product_id='$id' order by p.product_id desc") or die(mysqli_error($conn));
            $row=mysqli_fetch_assoc($result);
            ?>
                <div class="col-md-8 col-sm-12 pad-right-30">
                    <div class="shop-detail">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="thumbnail-images">
                                    <div class="slider-store">
                                        <div>
                                           <img src="../admin/uploads/products/<?php echo $row["img1"]; ?>" alt="1">
                                        </div>
                                        <div>
                                            <img src="../admin/uploads/products/<?php echo $row["img2"]; ?>" alt="1">
                                        </div>
                                        <div>
                                            <img src="../admin/uploads/products/<?php echo $row["img3"]; ?>" alt="1">
                                        </div>
                                        
                                    </div>
                                    <div class="slider-thumbs">
                                        <div>
                                           <img src="../admin/uploads/products/<?php echo $row["img1"]; ?>" alt="1">
                                        </div>
                                        <div>
                                            <img src="../admin/uploads/products/<?php echo $row["img2"]; ?>" alt="1">
                                        </div>
                                        <div>
                                            <img src="../admin/uploads/products/<?php echo $row["img3"]; ?>" alt="1">
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="single-content">
                                    <h3 class="bold"><?php echo $row["title"]; ?></h3>
                                    <div class="shop-price mar-bottom-20">
                                        <ins><span>Rs.<?php echo $row["price"]; ?>Kg</span></ins>
                                    </div>
                                    <div class="product-detail">
                                        <p class="bold"><?php echo $row["description"]; ?></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="store-tab-main" class="mar-top-60"> 
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#1" data-toggle="tab">Description</a></li>
                            <li><a href="#2" data-toggle="tab">Specifications</a></li>
                            <li><a href="#3" data-toggle="tab">Video</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="1">
                                <p class="bold"><?php echo $row["description"]; ?></p>
                            </div>

                            <div class="tab-pane" id="2">
                              <p class="bold"><?php echo $row["spacification"]; ?></p>
                            </div>

                            <div class="tab-pane" id="3">
                            <iframe width="560" height="315" src="<?php echo $row["video_url"]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>   
                </div>

              

                <div class="col-md-3 col-sm-12 col-xs-12 pad-left-30">
                    <div class="shop-sidebar">
                        <div class="shop-sidebar-box">
                            <div class="sidebar-title">
                                <h3 class="bold">Featured Products</h3>
                            </div>
                            <?php
                            $id=$_GET["id"];
                    $result = mysqli_query($conn,"SELECT * FROM product as p left join subcategory as s on s.subcatid =p.subcatid where p.product_id!='$id'  order by p.product_id desc limit 3") or die(mysqli_error($conn));
                    while($row=mysqli_fetch_assoc($result))
                    {
                    ?>
                            <div class="recent-item clearfix display-flex">
                                <div class="recent-image">
                                    <img src="../admin/uploads/products/<?php echo $row["img1"]; ?>" alt="image">
                                </div>
                                <div class="recent-content pad-left-15">
                                    <h5 class="bold"><a href="productdetail.php?id=<?php echo $row["product_id"]; ?>"><?php echo $row["title"]; ?></a></h5>
                                    <div class="post-detail">
                                        <div class="shop-price">
                                            <ins><span>Rs.<?php echo $row["price"]; ?>Kg</span></ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                        <div class="shop-sidebar-box">
                            <div class="sidebar-title">
                                <h3 class="bold">Categories</h3>
                            </div>
                            <div class="shop-sidebar-content">
                                <ul>
                                <?php
                            $result = mysqli_query($conn,"SELECT * FROM category") or die(mysqli_error($conn));
                            while($row=mysqli_fetch_assoc($result))
                            {
                            ?>
                                    <li class="bold"><a href="shop.php?catid=<?php echo $row["catid"]; ?>"><?php echo $row["catname"]; ?></a></li>
                                 <?php } ?>
                                </ul>
                            </div>
                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop detail Ends -->

    <!-- related products starts -->
    <section class="related-products pad-bottom-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Related <span>Products</span></h2>
                        <p class="bold">Related products are recommendations in addition to an item a customer is currently viewing. These goods are meant to help in the usage of the main product, supplement each other, increase enjoy from the product, smooth over its shortcomings; they are its replacement parts, etc.</p>
                    </div>
                </div>
            </div>
            <div class="row partner-slider">
            <?php
                            $id=$_GET["id"];
                    $result = mysqli_query($conn,"SELECT * FROM product as p left join subcategory as s on s.subcatid =p.subcatid where p.product_id!='$id'  order by p.product_id desc limit 5") or die(mysqli_error($conn));
                    while($row=mysqli_fetch_assoc($result))
                    {
                    ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="shop-item">
                        <div class="shop-image">
                            <img src="../admin/uploads/products/<?php echo $row["img1"]; ?>" alt="image">
                          
                        </div>
                        <div class="shop-content">
                            <h4 class="text-capitalize"><a href="productdetail.php?id=<?php echo $row["product_id"]; ?>"><?php echo $row["title"]; ?></a></h4>
                            <div class="shop-price">
                                <ins><span>Rs. <?php echo $row["price"]; ?></span></ins>
                            </div>
                            <a class="biz-btn-black mar-top-20" href="productdetail.php?id=<?php echo $row["product_id"]; ?>">Details</a>
                        </div>
                    </div>
                </div>

                <?php } ?>
               
            </div>
        </div>
    </section>
    <!-- related products Ends -->

    <!-- footer starts -->
    <?php
    include "footer.php";
    ?>
    <!-- footer ends -->
    <!-- *Scripts* -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/custom-nav.js"></script>

</body>
</html>
