<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>index</title>
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
        section.banner-form
        {
            background-color:#ffffff;
        }
        section.why-us
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
   <?php
   include "header.php";

   ?>
    <!-- header ends -->

    <!-- banner starts -->
    <section class="banner">
        <div class="slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slide-inner">
                           <div class="slide-image" style="background-image:url(images/slider/slide1.jpg)"></div>
                           <div class="swiper-content">
                                <h2 class="white">“To forget how to dig the earth and tend the soil is to forget ourselves."</h2>
                                <p class="mar-bottom-20">- This statement from Gandhi has a lot to learn for one to understand the basic philosophy behind farming. Agriculture is mainly a bodily labour. </p>
                            </div> 
                            <!-- <div class="overlay"></div> -->
                        </div> 
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-inner">
                            <div class="slide-image" style="background-image:url(images/slider/slide3.jpg)"></div>
                           <div class="swiper-content">
                                <h2 class="black"> "When tillage begins, other arts follow. The farmers, therefore, are the founders of human civilization"</h2>
                                <p class="mar-bottom-20" style="color:black">What is agriculture in Short Line?
                                Image result for agriculture quotes
                                Agriculture is the art and science of cultivating the soil, growing crops and raising livestock</p>
                                <!-- <a href="" class="biz-btn">Find More</a> -->
                            </div> 
                            <!-- <div class="overlay"></div> -->
                        </div> 
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-inner">
                           <div class="slide-image" style="background-image:url(images/slider/slide5.jpg)"></div>
                           <div class="swiper-content">
                                <h2 class="white">Without farmers, no country can progress.</h2>
                                <p class="mar-bottom-20">In India and around the world, agriculture is one of the most significant industries. This is particularly true in India, a country that is predominately agrarian and where farmers are revered on par with deities.</p>
                               
                            </div> 
                            <!-- <div class="overlay"></div> -->
                        </div> 
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            
        </div>
    </section>
    <!-- banner ends -->

    <!-- form starts -->
    <section class="banner-form">
        <div class="container">
            <div class="row display-flex">
                <div class="col-md-7 col-sm-12">
                    <div class="why-us-about">
                        <div class="why-about-inner" >
                            <img src="../guest/images/organic farm.jpg" alt="img1" height="500" width="500">

                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12">
                    <div class="why-us-about">
                        <div class="why-about-inner">
                           
                            <h3 class="bold">Organic farming</h3>
                            
                            <p class="bold" style="size:20px;">Organic farming is agriculture that makes healthy food, healthy soils, healthy plants, and healthy environments a priority, along with crop productivity. Organic farmers use biological fertilizer inputs and management practices such as cover cropping and crop rotation to improve soil quality and build organic soil matter. By increasing the amount of organic matter in the soil, organic farmers enhance the soil’s ability to absorb water, reducing the impacts of drought and flooding. Improving soil organic matter also helps it to absorb and store carbon and other nutrients need to grow healthy crops, which, in turn, are better able to resist insects and diseases.</p>

                            <h3 class="bold" style="margin: 10px;">why it's important?</h3>
                            <p class="bold" style="font:size 90px;">Organic production systems do not use genetically modified (GM) seed, synthetic pesticides or fertilizers. Some of the essential characteristics of organic systems include design and implementation of an organic system plan that describes the practices used in producing crops and livestock products; a detailed recordkeeping system that tracks all products from the field to point of sale; and maintenance of buffer zones to prevent inadvertent contamination by synthetic farm chemicals from adjacent conventional fields.</p>
                        </div>
                    </div>
                </div>
               
            </div>
            
        </div>
    </section>
    <!-- form ends -->

    <!-- why us starts -->
    <section class="why-us pad-top-0">
        <div class="container">
            <div class="section-title">
            <h2>Why Agriculture important</h2>
                <p class="bold">Agriculture provides most of the world's food and fabrics. Cotton, wool, and leather are all agricultural products. Agriculture also provides wood for construction and paper products. These products, as well as the agricultural methods used, may vary from one part of the world to another.</p>
            </div>
            <div class="why-us-box">
                <div class="row">
                    <div class="col-md-4">
                        <img src="../user/images/why impo1.jpg" width="500" height="250"alt="img1">
                        <div class="why-us-item text-center">
                            
                            <div class="why-us-content">
                            <h3 class="bold">It’s the main source of raw materials</h3>
                                <p class="bold" style="size:60px" >Many raw materials, whether it’s cotton, sugar, wood, or palm oil, come from agriculture.These materials are essential to major industries in ways many people aren’t even aware of, such as the manufacturing of pharmaceuticals, diesel fuel, plastic, and more</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    <img src="../user/images/why impo2.jpg" width="500" height="250"alt="img1">
                        <div class="why-us-item text-center">
                            <div class="why-us-content">
                            <h3 class="bold">It’s the main source of raw materials</h3>
                                <p class="bold" style="size:60px" >Many raw materials, whether it’s cotton, sugar, wood, or palm oil, come from agriculture.These materials are essential to major industries in ways many people aren’t even aware of, such as the manufacturing of pharmaceuticals, diesel fuel, plastic, and more</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="../user/images/why impo3.jpg" width="500" height="250"alt="img1">
                        <div class="why-us-item text-center">
                            
                            <div class="why-us-content">
                            <h3 class="bold">It’s the main source of raw materials</h3>
                                <p class="bold" style="size:60px" >Many raw materials, whether it’s cotton, sugar, wood, or palm oil, come from agriculture.These materials are essential to major industries in ways many people aren’t even aware of, such as the manufacturing of pharmaceuticals, diesel fuel, plastic, and more</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
       
        <div class="container">
            <div class="section-title">
                <h2 style="margin:60px">welcome to our farm.</h2>
                
            </div>
            <div class="dest-partner">
                <div class="row partner-slider">
                    <div class="col-md-2" >
                        <img src="../guest/images/vegitable.jpg" height="200" width="200"alt="partners" >
                        <div class="content">
                         <h3 class="bold">vegitable farming</h3>
                         <p class="bold">The most suitable vegetables are those producing a large yield per unit of area. Bean, cabbage, carrot, leek, lettuce, onion, parsley, pea, pepper, radish, spinach, and tomato are desirable home garden crops. </p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <img src="../guest/images/fruites.jpg" height="200" width="200" alt="partners">
                        <div class="content">
                         <h3 class="bold">fruites farming</h3>
                         <p class="bold">Fruit farming is one of the most promising branches of agriculture, which with a thorough approach to the whole process can provide very fruit growing. </p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <img src="../guest/images/dairyfarming.jpg" height="200" width="200"alt="partners">
                        <div class="content">
                         <h3 class="bold">dairy farming</h3>
                         <p class="bold">Dairy farming is a form of agriculture that is dedicated to the production of milk and dairy products from the care and feeding of cattle, mainly dairy cows. </p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <img src="../guest/images/plant.jpg" alt="partners" height="200" width="200">
                        <div class="content">
                            <h3 class="bold">plantation farming</h3>
                            <p class="bold">Plantation farming is the practice of clearing a large parcel of forest land and planting the desired crops in huge numbers on the cleared land. </p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <img src="../guest/images/CommercialFarming.jpg" height="200" width="200" alt="partners">
                        <div class="content">
                            <h3 class="bold">commertial farming </h3>
                            <p class="bold">Commercial farming is a method where the crops and livestock are raised to sell products in order to make money. </p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <img src="../guest/images/home farming.jpg" height="200" width="200"alt="partners">
                        <div class="content">
                            <h3 class="bold">home farming </h3>
                            <p class="bold">Hydroponic Farming at Home | Soilless Farming at Home | Vertical Hydroponics System. Discover Agriculture </p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <img src="../guest/images/subsistencefarming.jpg" height="200" width="200"alt="partners">
                        <div class="content">
                            <h3 class="bold">subsistence farming </h3>
                            <p class="bold">subsistence farming, form of farming in which nearly all of the crops or livestock raised are used to maintain the farmer and the farmer's family, leaving little, if any, surplus for sale or trade. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </section>
    <!-- why us ends -->
    <!-- footer starts -->
    <?php
    include "footer.php";
    ?>
    <!-- footer ends -->

    <!-- *Scripts* -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/f7a35ffcc8.js" crossorigin="anonymous"></script>
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/custom-swiper2.js"></script>
    <script src="js/custom-nav.js"></script>
    <script src="js/custom-date.js"></script>

</body>
</html>