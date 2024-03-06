<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>otp</title>
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

    <!-- header ends -->
    <?php
   include "header.php";
//    include "account.php";
   ?>

    <!-- login Starts -->
    <section class="otp">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-md-3 m-auto"></div>
                <div class="col-md-6 m-auto">
                    <div class="login-content">
                        <h3 class="bold">Hello! Do Not Share Your Otp With Others</h3>
                        <?php
                    
                            if(isset($_POST["btnverify"]))
                            {
                                $otp = $_POST["txtotp"];
                                $userid=$_SESSION["regid"];

                                $result=mysqli_query($conn,"select * from user where otp='$otp' and user_id='$userid'");

                                if(mysqli_num_rows($result)<=0)
                                {
                                    echo "OTP not match";
                                }
                                else
                                {
                                    mysqli_query($conn,"update user set isverify='yes' where user_id='$userid'");
                                    echo "<script>window.location='login.php';</script>";
                                }
                            }
                        ?>
                        <form method="post" id="form1">
                            <div class="form-group">
                                <input type="text" name="txtotp" placeholder="Enter otp">
                            </div>

                            <div class="form-btn mar-top-20">
                            <button type="submit" name="btnverify" class="biz-btn biz-btn1 mar-bottom-20">Verify</button>
                            <!-- <p>Need an Account?<a href="register.php"> Create your account</a></p> -->
                        </div>
                        </form>
                     
                        
                    </div>
                </div>
              
            </div>
        </div>
    </section>
    <!-- Login Ends -->
    <?php
    include "footer.php";
    ?>
    
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
    <!-- validation -->
    <script src="admin/plugins/jquery.validate.js"></script>
    <script src="admin/plugins/additional-methods.js"></script>
    <script>
        $(document).ready(function(){
            $("#form1").validate({
                rules:
                {
                    txtemail:
                    {
                        required:true
                    },
                    txtpassword:
                    {
                        required:true
                    },
                }
            });
        });
    </script>

    

</body>
</html>