<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>change password</title>
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
        .forgot-password
        {
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
   ?>
    <!-- header ends -->
    <!-- Forgot Password -->
    <section class="forgot-password">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="fp-content">
                        <p class="bold">please provide this detais to change password</p>
                        <?php
                        if(isset($_POST["btnsubmit"]))
                        {
                            $oldpassword=$_POST["txtoldpassword"];
                            $newpassword=$_POST["txtnewpassword"];
                            $confirmpassword=$_POST["txtconfirmpassword"];
                            $userid=$_SESSION["userid"];

                            if($newpassword == $confirmpassword)
                            {
                                $res = mysqli_query($conn,"select * from user where user_id='$userid' and password='$oldpassword'");
                                if(mysqli_num_rows($res)<=0)
                                {
                                    echo '<div class="alert m-2 alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Error!</h5>
                                old password not match!
                              </div>';
                                }
                                else
                                {
                                    $result = mysqli_query($conn,"update user set password='$newpassword' where user_id='$userid'");

                                    echo '<div class="alert m-2 alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Success!</h5>
                                Password updated!
                              </div>';

                                }
                            }
                            else
                            {
                                echo '<div class="alert m-2 alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Error!</h5>
                                New and confirm password must match!
                              </div>';
                            }
                        }
                        ?>
                        <form method="post">
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <label class="bold">Enter current password</label>
                                    <input type="password" class="form-control" name="txtoldpassword" placeholder="Enter current password">
                                </div>
                                <div class="form-group col-xs-12">
                                    <label class="bold">Enter new password</label>
                                    <input type="password" class="form-control" name="txtnewpassword" placeholder="Enter new password">
                                </div>
                                <div class="form-group col-xs-12">
                                    <label class="bold">Enter canfirm password</label>
                                    <input type="password" class="form-control" name="txtconfirmpassword" placeholder="Enter canfirm password">
                                </div>
                                <div class="col-xs-12">
                                    <button type="submit" name="btnsubmit" class="biz-btn biz-btn1">Reset Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Forgot Password Ends -->

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