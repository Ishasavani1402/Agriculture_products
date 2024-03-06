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
    <section class="shop-main bg-grey">
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
                                        <ins><span>Rs.<?php echo $row["price"]; ?></span></ins>
                                    </div>
                                    <div class="product-detail">
                                        <p class="bold"><?php echo $row["description"]; ?></p>
                                    </div>

                                    <?php

if(isset($_POST["btnaddtowishlist"]))
{
    $pid=$_GET["id"];
    $userid=$_SESSION["userid"];
    $result=mysqli_query($conn,"insert into wishlist (user_id,product_id) values ('$userid','$pid')") or die(mysqli_error($conn));
    if($result)
    {
        echo '<div class="alert m-2 alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Success!</h5>
       Added to wishlist!
      </div>';
    }
    else
    {
        echo "Error";
    }
}



                                    if(isset($_POST["btnaddtocart"]))
                                    {
                                    $qty = $_POST["quantity"];
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
                                echo '<div class="alert m-2 alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Success!</h5>
                               Product added to cart!
                              </div>';
                            }
                            else
                            {
                                echo "error";
                            }
                        }
                                    ?>
                                    <?php
                              if(!isset($_SESSION["userid"]))
                              {
                                echo "<h4 style='margin-top:50px;color:red;'>Please Login First to add products to cart</h4>";
                              }
                              else
                              {
                              ?>
                                    <form class="cart mar-top-30" method="post">
                                        <div class="quantity-buttons">
                                            <label class="screen-reader-text">Quantity</label>
                                            <input type="number" class="quantity-input" name="quantity" min="1" max="100" placeholder="No.">
                                        </div>
                                        
                                        <button type="submit" name="btnaddtocart" class="biz-btn-black">Add to cart</button>
                                        
                                        <div class="addwishlist-buttons">
                                        <button type="submit" name="btnaddtowishlist" class="biz-btn-black">Add to Wishlist</button>
                                        </div>
                                    </form>

                                    <?php } ?>
                                    <!-- <div class="product-tags">
                                        <p>Packaging :</p>
                                        <a href="#"><?php echo $row["pkgtype"]; ?></a>
                                    </div> -->
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
                                            <ins><span>Rs.<?php echo $row["price"]; ?></span></ins>
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
            <div class="single-comments single-box">
                            <h3 class="mar-bottom-30" style="font-weight:bold">review</h3>
                            <?php
                                    $id = $_GET["id"];
                                    $result = mysqli_query($conn,"select * from review as r left join product as p on p.product_id=r.product_id left join user as u on u.user_id = r.user_id where r.product_id='$id' and r.isactive='yes' order by review_id desc")or die(mysqli_error($result));
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                    ?>
                            <div class="comment-box">
                                   
                                <div class="review-content">
                                    <h4 class=""><?php echo $row["name"];?></h4>
                                    <p class=""><?php echo $row["reviewdatetime"];?></p>
    
                                    
                                    <p class="review-text" style="font-weight:bold"><?php echo $row["review_text"];?></p>

                                </div>
                                
                            </div>
                            <?php }?>
                        </div>
    <!-- shop detail Ends -->
        </div>
    </section>
    
   

    <!-- related products starts -->
    <section class="related-products pad-bottom-70 bg-grey">
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

    <!-- search popup -->
    <div id="search1">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

   

   

    <!-- *Scripts* -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/custom-nav.js"></script>

</body>
</html>
<!-- https://www.youtube.com/embed/E-ruCDjCU4I -->