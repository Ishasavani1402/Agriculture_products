<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>contact us</title>
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
        section.contact-main
        {
            background-color:#ffffff;
        }
        .biz-btn
        {
            background-color:#ff6e7b;
        }
    </style>
</head>
<body>

    

    <!-- header starts -->
   <?php include "header.php";?>
    <!-- header ends -->
    <!-- contact starts -->
    <section class="contact-main"style="
    padding-top: 80px;">
        <div class="container">
            <div class="contact-map">
                <div class="row">
                    <div class="col-md-6">
                        <div style="height: 535px; width: 100%;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.1326202082755!2d72.80556491493533!3d21.186889985912845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f8852ff9247%3A0x9148f6fc3f571e51!2sSmt.%20Tanuben%20%26%20Dr.%20Manubhai%20Trivedi%20College%20of%20Information%20Science%2C%20Surat!5e0!3m2!1sen!2sin!4v1680703777908!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="contact-form" style="margin:20px">
                            <h3 style="font-weight:bold"><ins>get in touch with us by filling form below</ins></h3>
                            <div id="contactform-error-msg"></div>
                            <?php
                        if(isset($_POST["btnsubmit"]))
                        {
                            $name = $_POST["txtname"];
                            $phone = $_POST["txtphone"];
                            $email = $_POST["txtemail"];
                            $message = $_POST["txtmessage"];

                            $result = mysqli_query($conn,"insert into feedback(name,contact,email,message)values('$name','$phone','$email','$message')")or die(mysqli_error($conn));

                            if($result == true)
                            {
                                echo '<div class="alert m-2 alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Success!</h5>
                                Data inserted successfully!
                              </div>';
                            }
                            else
                            {
                                echo'<div class="alert m-2 alert-dangure alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Success!</h5>
                                Data not inserted!
                              </div>';
                            }
                        }                 
                        
                        ?>

                            <form method="post" >
                                <div class="form-group">
                                    <input type="text" name="txtname" class="form-control" id="fname" placeholder="Name">
                                </div>
                               
                                <div class="form-group">
                                    <input type="text" name="txtphone" class="form-control" id="phnumber" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="txtemail"  class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="textarea">
                                    <textarea name="txtmessage" placeholder="Enter a message"></textarea>
                                </div>
                                <div class="comment-btn text-right mar-top-15">
                                    <input type="submit" name="btnsubmit"class="biz-btn" id="submit" value="Send Message">
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
     <script src="js/map.js"></script>
    <!-- google map Jquery -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4JwWo5VPt9WyNp3Ne2uc2FMGEePHpqJ8&amp;callback=initMap" async defer></script> -->

</body>
</html>
