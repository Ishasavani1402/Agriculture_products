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
            background-color:#e6ffe6;
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
    <section class="blogmain" style="background-color:#f5f5f5;width:100%;">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12 col-xs-12">
                    <div class="blog-single">
                    <?php
                    $id=$_GET["id"];
                        $result = mysqli_query($conn,"SELECT * FROM `artical` where artical_id='$id'  order by artical_id desc")or die(mysqli_error($conn));
                        $row=mysqli_fetch_assoc($result)
                    ?>
                    <div class="blog-grid">
                        <div class="blog-image">
                            <img style="width:50%" src="../admin/uploads/Articals/<?php echo $row["img1"];?>" alt="image">
                        </div>
                        
                        </div>
                        <!-- blog title -->
                        <div class="blog-content mar-bottom-30">
                            <h3 class="blog-title"><?php echo $row["title"];?></a></h3>

                            <!-- blog description -->
                            <p class="bold"><?php echo $row["description"];?> </p>     
                        </div>

                        <!-- blog blockquote -->
                        

                        <div class="blog-imagelist mar-bottom-30">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12" >
                                    <img src="../admin/uploads/Articals/<?php echo $row["img2"];?> "  alt="image">
 
                                </div>
                            </div>
                        </div>    
 
                        <!-- blog comment list -->
                        <div class="single-comments single-box">
                            <h3 class="mar-bottom-30" style="font-weight:bold">Showing  comments</h3>
                            <?php
                            $id=$_GET["id"];
                    $_result = mysqli_query($conn,"select * from comments as c left join user as u on u.user_id=c.user_id where c.artical_id='$id' order by comm_id desc")or die(mysqli_error($conn));
                    while($row=mysqli_fetch_assoc($_result))
                    {
                    ?>
                            <div class="comment-box">
                                <div class="comment-content">
                                    <h4 class="bold"><?php echo $row["name"]; ?></h4>
                                    <p class="bold"><?php echo $row["com_datetime"]; ?></p>
                                   
                                    
                                    <p class="bold"><?php echo $row["commtext"]; ?></p>
                                    
                                </div>
                            </div>

                            <?php } ?>
                        </div>

                        <!-- blog review -->
                        <div class="single-add-review pad-top-30">
                            <?php
                            if(isset($_POST["btnsubmit"]))
                            {
                                $comment = $_POST["txtcomment"];
                                $artical = $_GET["id"];
                                $userid = $_SESSION["userid"];

                                $result = mysqli_query($conn,"INSERT INTO `comments` (`user_id`, `artical_id`, `commtext`) VALUES ('$userid','$artical','$comment')")or die(mysqli_error($conn));

                                if($result == true)
                                {
                                    echo  '<div class="alert m-2 alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                                    Data inserted successfully!
                                    </div>';
                                }
                                else
                                {
                                    echo '<div class="alert m-2alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                    record not inserted!!
                                    </div>';
                                }
                            }
                            ?>
                            <h3 class="bold">Write a comment</h3>
                            <form method="post">
                                <div class="row">
                                    
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="txtcomment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-btn">
                                            <button type="submit" name="btnsubmit" class="biz-btn biz-btn1">Submit </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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