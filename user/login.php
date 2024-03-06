<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>
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
        .error
        {
            color:#ff0000;
        }
        .userlogin
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

    <!-- header ends -->
    <?php
   include "header.php";
//    include "account.php";
   ?>

    <!-- login Starts -->
    <section class="userlogin" style="
    padding-top: 80px;">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-md-3 m-auto"></div>
                <div class="col-md-6 m-auto">
                    <div class="login-content">
                        <h3 class="bold">Hello! Sign into your account</h3>
                        <?php
                            if(isset($_POST["btnlogin"]))
                            {
                                $email = $_POST["txtemail"];
                                $password = $_POST["txtpassword"];
                                $result=mysqli_query($conn,"select * from user where emailid='$email' and password='$password' and isverify='yes'") or die(mysqli_error($conn));

                                if(mysqli_num_rows($result)<=0)
                                {
                                    echo '<div class="alert m-2 alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h5><i class="icon fas fa-check"></i> Error!</h5>
                                            Login Failed !
                                          </div>';
                                }
                                else
                                {
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $_SESSION["userid"] = $row["user_id"];
                                        $_SESSION["name"] = $row["name"];
                                        echo "<script>window.location='index.php';</script>";
                                    }
                                }
                            }
                        ?>
                        <form method="post" id="form1">
                            <div class="form-group">
                                <input type="email" name="txtemail" placeholder="Enter email address">
                            </div>
                            <div class="form-group">
                                <input type="password" name="txtpassword" placeholder="Enter password">
                            </div>
                            <div class="form-btn mar-top-20">
                            <button type="submit" name="btnlogin" class="biz-btn biz-btn1 mar-bottom-20">LOGIN</button>
                            <p class="bold">Need an Account?<a href="register.php"><ins> Create your account</ins></a></p>

                            <p class="bold"style="
    padding-bottom: 20px;">fogot password?<a href="forgotpassword.php"><ins> reset here</ins></a></p>
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