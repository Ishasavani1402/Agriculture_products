<?php
session_start();
include "connection.php";
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception; 
 
// Include library files 
require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php'; 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>
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
        .register
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
  
   ?>

    <!-- login Starts -->
    <section class="register" style="
    padding-top: 80px;">
        <div class="container">
            <div class="row">
            <div class="col-md-3 m-auto"></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="login-content margin:10px">
                        <h3 class="bold">Create An Account</h3>
                        
<?php
                    if(isset($_POST["btnregister"]))
                    {
                        // echo "clicked";
                        $username=$_POST["txtusername"];
                        $email=$_POST["txtemail"];
                        $password=$_POST["txtpassword"];
                        $contact=$_POST["txtcontact"];

                        $otp = rand(1111,9999);
                        $_SESSION["otp"]=$otp;

                        //Email

                        //Email

                        $result = mysqli_query($conn,"INSERT INTO `user` (`name`, `emailid`, `password`, `contactnumber`, `otp`, `isverify`) VALUES ('$username', '$email', '$password', '$contact', '$otp', 'no');")or die(mysqli_error($conn));

                        $_SESSION["regid"] = mysqli_insert_id($conn);

                        if($result==true)
                        {
                            
// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer; 
 
// Server settings 
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
$mail->isSMTP();                            // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;                     // Enable SMTP authentication 
$mail->Username = 'savaniisha57@gmail.com';       // SMTP username 
$mail->Password = 'fijzwvmdxmuuvdov';         // SMTP password 
$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 465;                          // TCP port to connect to 
 
// Sender info 
$mail->setFrom('savaniisha57@gmail.com', 'Isha'); 
$mail->addReplyTo('savaniisha57@gmail.com', 'Isha'); 
 
// Add a recipient 
$mail->addAddress($email); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'Email from Agzone for user registration..'; 
 
// Mail body content 
$bodyContent = '<h1>Your OTP : '.$otp.'</h1>'; 
$mail->Body    = $bodyContent; 
 
// Send email 
if(!$mail->send()) { 
    echo "<script>window.location='otp.php';</script>";
} else { 
    echo "<script>window.location='otp.php';</script>";
}
                          
                        }
                        else
                        {
                            echo"not inserted";
                        }
                    }
                    ?>
                        <form method="post" id="form1">
                            <div class="form-group">
                                <input type="text" name="txtusername" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <input type="email" name="txtemail" placeholder="Enter email address">
                            </div>
                            <div class="form-group">
                                <input type="password" name="txtpassword" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <input minlength="10" maxlength="10" type="tel" name="txtcontact" placeholder="Enter phone number">
                            </div>
                        <div class="form-btn mar-bottom-20">
                            <button type="submit" name="btnregister" class="biz-btn biz-btn1">SIGN UP</button>
                        </div>
                        <p class="bold" style="padding-bottom: 20px;">all ready have Account?<a href="login.php"> <ins>login</ins></a></p>
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
    <script src="https://kit.fontawesome.com/f7a35ffcc8.js" crossorigin="anonymous"></script>
   
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
                    txtusername:
                    {
                        required:true
                    },
                    txtemail:
                    {
                        required:true
                    },
                    txtpassword:
                    {
                        required:true
                    },
                    txtcontact:
                    {
                        required:true
                    },
                }
            });
        });
    </script>

</body>
</html>