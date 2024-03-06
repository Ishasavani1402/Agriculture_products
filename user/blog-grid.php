<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blogs</title>
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
        section.blog
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
    <!-- blog starts -->
    <section class="blog blog-left"style="
    padding-top: 80px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pad-left-30 pull-right">
                    <div class="blog-main">
                        <div class="row">    
                        <?php
                    $result = mysqli_query($conn,"SELECT * FROM `artical` order by artical_id desc")or die(mysqli_error($conn));
                    while($row=mysqli_fetch_assoc($result))
                    {
                    ?>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 mar-bottom-30">
                                <div class="grid">
                                    <div class="grid-item">
                                        <div class="grid-image">
                                            <img src="../admin/uploads/Articals/<?php echo $row["img1"]; ?>" height="450" alt="blog">
                                        </div>
                                        <div class="gridblog-content">
                                            <div class="date mar-bottom-15"><i class="flaticon flaticon-calendar"></i>
                                        <?php echo date("M d Y",strtotime($row["add_datetime"])); ?>
                                        </div>
                                            <h3><a href="#"> <?php
                                            echo $row["title"];
                                            ?></a></h3>
                                            <p class="bold"> <?php echo substr($row["description"],1,200); ?>....</p>
                                            <a href="blog-single.php?id=<?php echo $row["artical_id"]; ?>" class="biz-btn biz-btn1">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                    }
                 ?>
                        </div>    
                    </div>
                </div>

             
            </div>
        </div>
    </section>
    <!-- blog Ends -->

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