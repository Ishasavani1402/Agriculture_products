<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bloges</title>
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
        section.blogmain:after
        {
            width:100%;
            background-color:#e6ffee;
           
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
//    include "account.php";
   ?>
    <!-- header ends -->
    <section class="blogmain">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12 col-xs-12">
                    <div class="blog-single">
                    <?php
                    $id=$_GET["id"];
                        $result = mysqli_query($conn,"SELECT * FROM `artical` where artical_id='$id'  order by artical_id desc")or die(mysqli_error($conn));
                        $row=mysqli_fetch_assoc($result)
                    ?>
                        <div class="blog-image">
                            <img style="width:50%" src="../admin/uploads/Articals/<?php echo $row["img1"];?>" alt="image">
                        </div>
                        <!-- blog title -->
                        <div class="blog-content mar-bottom-30">
                            <h3 class="blog-title"><?php echo $row["title"];?></a></h3>

                            <!-- blog description -->
                           <p class="bold"> <?php echo $row["description"];?></p>
                            
                        </div>

                        <!-- blog blockquote -->
                        

                        <div class="blog-imagelist mar-bottom-30">
                            <div class="row">
                            <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="admin/uploads/Articals/<?php echo $row["img1"];?>" alt="image">
                            </div> -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <img src="../admin/uploads/Articals/<?php echo $row["img2"];?>" alt="image">
                            </div>
                            </div>
                        </div>    
 
                        <!-- blog comment list -->
                        

                        <!-- blog review -->
                        
                    </div>
                        </div> 
            </div>
        </div>
    </section>

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