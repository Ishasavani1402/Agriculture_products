<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>our shop</title>
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
        section.cruise-destinations
        {
            /* width:100%; */
            background-color:#f2f2f2;
            /* background-image:url("https://img.freepik.com/free-photo/green-field-with-sun_1160-878.jpg?w=2000");
            background-repeat: no-repeat;
            background-size: cover;  
            height: 100%; 
            opacity: 0.5;  */
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
    <!-- Destinations -->
    <section class="cruise-destinations" style="
    padding-top: 80px;">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12 col-sm-12">
                    <div class="blog-list car-list">

                    <a href="map.php" class="btn btn-info"style="float:right;">Map</a>
                    <div class="blog-list car-list">
                    <?php
                             $resulu = mysqli_query($conn,"select * from shop as s left join city as c on c.city_id= s.city_id order by s.shop_id desc")or die(mysqli_error($conn));
                            while($row=mysqli_fetch_assoc($resulu))
                            {
                            ?>
                        <div class="blog-full mar-bottom-30">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12 blog-height">
                                <i class="fa-sharp fa-regular fa-map-location"></i>
                                   <div class="blog-image">
                                      <img src="../admin/uploads/shop/<?php echo $row["shop_photo"]; ?>" width="650" height="350"/>
                                    </div> 
                                </div>

                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="blog-content">
                                        
                                        <h3 class="bold"><a href="#"><?php echo $row["shopname"];?></a></h3>

                                        <p class="bold"><?php echo $row["about_shop"];?></p>
                                        <p class="bold"><?php echo $row["address"];?>,<?php echo $row["landmark"];?>-<?php echo $row["city_name"];?>-<?php echo $row["pincode"];?></p>

                                        <div class="content">
                                            <p class="bold"><?php echo $row["contact_person"];?>-<?php echo $row["contact"];?></p>
                                        </div>
                                        <div class="email">
                                            <p class="bold"><?php echo $row["e-mail"];?></p>
                                        </div>

                                        
                                        
                                        
                                        <div class="cartrend-content display-flex space-between">
                                            
                                           <table border="1" class="table">
                                            <tr>
                                                <!-- <th>landmark</th> -->
                                                <!-- <th>pincode</th> -->
                                                <!-- <th>city</th> -->
                                                <!-- <th>latitude</th>
                                                <th>longitude</th> -->
                                                <!-- <th>email-id</th> -->
                                                <!-- <th>contact</th>
                                                <th>contact person</th> -->
                                                <!-- <th>about shop</th>
                                                <th>is active</th> -->

                                            </tr>
                                            <tr>
                                                <!-- <td><?php echo $row["landmark"];?></td> -->
                                                <!-- <td><?php echo $row["pincode"];?></td> -->
                                                <!-- <td><?php echo $row["city_name"];?></td> -->
                                                <!-- <td><?php echo $row["latitude"];?></td>
                                                <td><?php echo $row["longitude"];?></td> -->
                                                <!-- <td><?php echo $row["e-mail"];?></td> -->
                                                <!-- <td><?php echo $row["contact"];?></td>
                                                <td><?php echo $row["contact_person"];?></td> -->
                                                <!-- <td><?php echo $row["about_shop"];?></td>
                                                <td><?php echo $row["is_active"];?></td> -->
                                            </tr>

                                           </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } ?>
                    </div>

                       
                    
                    </div>
                </div>  

               
            </div>
        </div>
    </section>
    <!-- Destination Ends -->

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