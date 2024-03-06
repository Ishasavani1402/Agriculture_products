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
    <style>
        .fpassword
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
    <section class="fpassword">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-md-3 m-auto"></div>
                <div class="col-md-6 m-auto">
                    <div class="login-content">
                        <h3 class="bold">set new password here!!</h3>

                        <?php
                        if(isset($_POST["btnverify"]))
                        {
                            $email = $_POST["txtemail"];
                            $res = mysqli_query($conn,"select * from user where emailid='$email'");
                            if(mysqli_num_rows($res)<=0)
                            {
                                echo '<div class="alert m-2 alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Error!</h5>
                                Email id not found!
                              </div>';
                            }
                            else
                            {
                                $password="";
                                $res = mysqli_query($conn,"select * from user where emailid='$email'");
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $password = $row["password"];
                                }
                                //Email
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
$mail->Subject = 'Email from Agzone'; 
 
// Mail body content 
$bodyContent = '<h1>Your PAssword : '.$password.'</h1>'; 
$mail->Body    = $bodyContent; 
 
// Send email 
if(!$mail->send()) { 
    echo "PAssword sent to your registered email id";
} else { 
    echo "mail not sent";
}
                                //Email
                            }
                        }
                        ?>
                        
                        <form method="post" id="form1">
                            <div class="form-group">
                                <input type="text" name="txtemail" placeholder="Enter email-id">
                            </div>

                            <div class="form-btn mar-top-20">
                            <button type="submit" name="btnverify" class="biz-btn biz-btn1 mar-bottom-20">submit</button>
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