<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Address</title>
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
        .address
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

    <!-- header ends -->
    <?php
   include "header.php";
//    include "account.php";
   ?>

    <!-- login Starts -->
    <section class="address">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="Address-content">
                        <?php
                        if(isset($_POST["btnsubmit"]))
                        {
                            $address = $_POST["txtaddress"];
                            $landmark = $_POST["txtlandmark"];
                            $pincode = $_POST["txtpincode"];
                            $cityid = $_POST["txtcity"];
                            $userid= $_SESSION["userid"];
                            
                            $result = mysqli_query($conn,"INSERT INTO `address` (`address`, `landmark`, `pincode`,`city_id`,`user_id`) VALUES ('$address','$landmark','$pincode','$cityid','$userid')")or die(mysqli_error($conn));

                            if($result==true)
                            {
                                echo '<div class="alert m-2 alert-success alert-dismissible">
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
                        <h4>Add Address</h4>
                        <form method="post">
                            <div class="form-group">
                                <label for="txtaddress">Address</label>
                                <input type="text" name="txtaddress" placeholder="Enter Address">
                            </div>
                            <div class="form-group">
                                <label for="txtlandmark">landmark</label>
                                <input type="text" name="txtlandmark" placeholder="Enter landmark">
                            </div>
                            <div class="form-group">
                                <label for="txtpincode">pincode</label>
                                <input type="text" name="txtpincode" placeholder="Enter pincode">
                            </div>
                            <div class="form-group">
                                            <label for="txtcity">city</label>
                                            <select name="txtcity" class="form-control" id="txtcity">
                                                <?php
                                                $result = mysqli_query($conn,"select * from city order by city_id desc")or die(mysqli_error($conn));
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                ?>
                                                <option value="<?php
                                                echo $row["city_id"];
                                                ?>"><?php echo $row ["city_name"];?></option>
                                               <?php
                                               }
                                               ?>
                                            </select>
                                        </div>
                       
                        <div class="form-btn mar-bottom-20">
                            <button type="submit" name="btnsubmit" class="biz-btn biz-btn1">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>

                <!-- view address -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="login-content">
                     
                        <h4>My Address</h4>
                        <div class="grid">
                            <?php
                            if(isset($_GET["id"]))
                            {
                            $id = $_GET["id"];
                            $result = mysqli_query($conn,"delete from address where address_id='$id'")or die(mysqli_error($conn));
                            echo"<script>window.location='addaddress.php';</script>";
                            }
                            ?>
                        <?php
                        //session
                        $userid= $_SESSION["userid"];
                        $result = mysqli_query($conn,"select * from address as a left join city as c on c.city_id=a.city_id left join state as s on s.stat_id=c.stat_id where a.user_id='$userid' order by a.address_id desc")or die(mysqli_error($conn));
                    while($row=mysqli_fetch_assoc($result))
                    {
                    ?>
                                    <div class="grid-item bg-warning" style="margin-top:10px">
                                        
                                        <div class="gridblog-content" style="padding:10px">
                                            
                                            <h3><a href="#"><?php echo $row["address"] ?></a></h3>
                                            <p> <?php echo $row["landmark"] ?></p>
                                            <div class="date mar-bottom-15"><?php echo $row["pincode"] ?>,
                                            <?php echo $row["city_name"] ?>,<?php echo $row["stat_name"] ?></div>
                                            <a href="?id=<?php echo $row["address_id"] ?>" class="biz-btn biz-btn1">Delete</a>
                                           
                                        </div>
                                    </div>

                                    <?php } ?>
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

</body>
</html>