<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>review</title>
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
        .reviewform
        {
            background-color:#ffffff;
        }
    </style>
</head>
<body>

    <!-- header starts -->
   <?php include "header.php";?>
    <!-- header ends -->
    

    <!-- contact starts -->
    <section class="reviewform"style="
    padding-bottom: 80px">
        

            <div class="contact-map">
                <div class="row">
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-md-6">
                        
                        <div class="contact-form" style="margin:auto">
                            <h3 class="bold">Review</h3>
                            <div id="contactform-error-msg"></div>

                            <?php
                            if(isset($_POST["btnsubmit"]))
                            {
                             $rating = $_POST["txtreting"];
                             $review = $_POST["txtreview"];
                             $pid=$_GET["pid"];
                             $oid=$_GET["oid"];
                             $userid=$_SESSION["userid"];
                             
                             $result = mysqli_query($conn,"insert into review (product_id,order_id,user_id,rating,review_text,isactive) values ('$pid','$oid','$userid','$rating','$review','no')");
                             if($result)
                             {
                                echo "<script>window.location='myiteam.php?id=".$oid."';</script>";
                             }
                             else
                             {
                                echo "Error";
                             }
                            }
                            ?>

                            <form method="post" >
                                <div class="form-group">
                                    <select name="txtreting"  class="text-white bg-dark" id="reting" placeholder="rating" style="background-color:black">
                                        <option style="color:white">1</option>
                                        <option style="color:white">2</option>
                                        <option style="color:white">3</option>
                                        <option style="color:white">4</option>
                                        <option style="color:white">5</option>
                                    </select>
                                </div>
                                <div class="textarea">
                                    <textarea name="txtreview" placeholder="Enter a message"></textarea>
                                </div>
                                <div class="comment-btn text-right mar-top-15">
                                    <input type="submit" name="btnsubmit"class="biz-btn" id="submit" value="Send review">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact Ends -->

    <!-- footer starts -->
    <?php
    include "footer.php";
    // include "account.php";
    ?>
    <!-- footer ends -->

    <!-- Back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    <!-- Back to top ends -->


    <!-- *Scripts* -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/custom-nav.js"></script>
     <script src="js/map.js"></script>
    <!-- google map Jquery -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4JwWo5VPt9WyNp3Ne2uc2FMGEePHpqJ8&amp;callback=initMap" async defer></script> -->

</body>
</html>
