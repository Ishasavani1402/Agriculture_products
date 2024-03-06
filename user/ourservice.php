<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>our services</title>
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
   <?php
   include "header.php";
//    include "account.php";
   ?>
    <!-- header ends -->

    <!-- Breadcrumb -->
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="white">Services Detail</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Services Detail</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="overlay">
     
        </div>
    </section>
    <!-- BreadCrumb Ends -->


    <!-- Service Detail Starts -->
    <section class="service-detail bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <div class="detail-content">
                        <div class="title mar-bottom-30">
                            <h4>Spend Your Dream Holidays</h4>
                            <h2>The luxury room in <span>Istanbul</span></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
                        </div>
                        <div class="detail-image mar-bottom-15">
                            <img src="images/reservationbg.jpg" alt="Image">
                        </div>
                        <div class="detail-desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            <p><strong>Lorem ipsum dolor sit amet</strong>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>

                            <div class="about-para mar-top-30">
                                <h5 class="text-capitalize">eque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incid dolor sit amet, consectetur, adipisci velit</h5>
                                <div class="about-para-list mar-top-20">
                                    <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <div class="about-icon"><i class="fa fa-chess-queen"></i> Awesome Nature</div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <div class="about-icon"><i class="fa fa-chess-queen"></i> Awaded Best Hotel</div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <div class="about-icon"><i class="fa fa-chess-queen"></i> Online Booking</div>
                                    </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-12 sidebar">
                    <div class="list-sidebar">
                        <div class="sidebar-item">
                            <h3>Services</h3>
                            <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                                <input type="checkbox" />
                                <div class="state p-warning-o">
                                    <label>24/7 Reception</label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                                <input type="checkbox" />
                                <div class="state p-warning-o">
                                    <label>Parking</label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                                <input type="checkbox" />
                                <div class="state p-warning-o">
                                    <label>Bar</label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                                <input type="checkbox" />
                                <div class="state p-warning-o">
                                    <label>Restaurant</label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                                <input type="checkbox" />
                                <div class="state p-warning-o">
                                    <label>Satellite Television</label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse mar-bottom-15">
                                <input type="checkbox" />
                                <div class="state p-warning-o">
                                    <label>Lift/ELevator</label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse">
                                <input type="checkbox" />
                                <div class="state p-warning-o">
                                    <label>Luggage Storage </label>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-item">
                            <div class="map-box mar-0">
                                <i class="fa fa-map-marker"></i>
                                <a href="#">Show on Map</a>
                            </div>
                        </div>
                        <div class="sidebar-item">
                            <h3>Star Rating</h3>
                            <div class="pretty p-default p-thick p-pulse">
                                <input type="checkbox" />
                                <div class="state">
                                    <label>
                                        <div class="star-rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse">
                                <input type="checkbox" />
                                <div class="state">
                                    <label>
                                        <div class="star-rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse">
                                <input type="checkbox" />
                                <div class="state">
                                    <label>
                                        <div class="star-rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse">
                                <input type="checkbox" />
                                <div class="state">
                                    <label>
                                        <div class="star-rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse">
                                <input type="checkbox" />
                                <div class="state">
                                    <label>
                                        <div class="star-rating">
                                            <span class="fa fa-star checked"></span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-item">
                            <h3>Price Range($)</h3>
                            <div class="range-slider">
                                <div data-min="0" data-max="2000" data-unit="$" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
                                    <span class="min-value">0 $</span> 
                                    <span class="max-value">2000 $</span>
                                    <div class="ui-slider-range ui-widget-header ui-corner-all full" style="left: 0%; width: 100%;"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="sidebar-item">
                            <h3>City</h3>
                            <div class="pretty p-default p-thick p-pulse">
                                <input type="checkbox" />
                                <div class="state">
                                    <label>
                                        Amsterdam<span class="number">749</span>
                                    </label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse">
                                <input type="checkbox" checked />
                                <div class="state">
                                    <label>
                                        Rotterdam<span class="number">630</span>
                                    </label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse">
                                <input type="checkbox" />
                                <div class="state">
                                    <label>
                                        Copenghan<span class="number">58</span>
                                    </label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse">
                                <input type="checkbox" />
                                <div class="state">
                                    <label>
                                        New Delhi<span class="number">29</span>
                                    </label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse">
                                <input type="checkbox" />
                                <div class="state">
                                    <label>
                                        New York<span class="number">29</span>
                                    </label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse">
                                <input type="checkbox" />
                                <div class="state">
                                    <label>
                                        Kathmandu<span class="number">29</span>
                                    </label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse">
                                <input type="checkbox" />
                                <div class="state">
                                    <label>
                                        Brisbane<span class="number">29</span>
                                    </label>
                                </div>
                            </div>
                            <div class="pretty p-default p-thick p-pulse">
                                <input type="checkbox" />
                                <div class="state">
                                    <label>
                                        Tokyo<span class="number">29</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Detail Ends -->

    <!-- related rooms starts -->
    <section class="related-tour bg-grey">
        <div class="container">
            <div class="section-title">
                <h2>Explore <span>Packages</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
            </div>

            <div class="trend-box">
                <div class="row team-slider">
                    <div class="col-md-4">
                        <div class="trend-item">
                            <div class="ribbon ribbon-top-left"><span>25% OFF</span></div>
                            <div class="trend-image">
                                <img src="images/trending1.jpg" alt="image">
                                <div class="trend-tags">
                                    <a href="#"><i class="flaticon-like"></i></a>
                                </div>
                                <div class="trend-price">
                                    <p class="price">From <span>$350.00</span></p>
                                </div>
                            </div>
                            <div class="trend-content">
                                <p><i class="flaticon-location-pin"></i> United Kingdom</p>
                                <h4><a href="#">Stonehenge, Windsor Castle, and Bath from London</a></h4>
                                <div class="rating mar-bottom-15">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <span class="mar-left-5">38 Reviews</span>
                                <p class="mar-0"><i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2 night</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="trend-item">
                            <div class="trend-image">
                                <img src="images/trending2.jpg" alt="image">
                                <div class="trend-tags">
                                    <a href="#"><i class="flaticon-like"></i></a>
                                </div>
                                <div class="trend-price">
                                    <p>Multi-day Tours</p>
                                    <p class="price">From <span>$899.00</span></p>
                                </div>
                            </div>
                            <div class="trend-content">
                                <p><i class="flaticon-location-pin"></i> Germany</p>
                                <h4><a href="#">Bosphorus Strait and Black Sea Half-Day Cruise from Istanbul</a></h4>
                                <div class="rating mar-bottom-15">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-half checked"></span>
                                    <span class="fa fa-star-half checked"></span>
                                </div>
                                <span class="mar-left-5">48 Reviews</span>
                                <p class="mar-0"><i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2 night</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="trend-item">
                            <div class="ribbon ribbon-top-left"><span>Featured</span></div>
                            <div class="trend-image">
                                <img src="images/trending3.jpg" alt="image">
                                <div class="trend-tags">
                                    <a href="#"><i class="flaticon-like"></i></a>
                                </div>
                                <div class="trend-price">
                                    <p>Attraction Tickets</p>
                                    <p class="price">From <span>$350.00</span></p>
                                </div>
                            </div>
                            <div class="trend-content">
                                <p><i class="flaticon-location-pin"></i> Denmark</p>
                                <h4><a href="#">NYC One World Observatory Skip-the-Line Ticket</a></h4>
                                <div class="rating mar-bottom-15">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <span class="mar-left-5">32 Reviews</span>
                                <p class="mar-0"><i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2 night</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="trend-item">
                            <div class="trend-image">
                                <img src="images/trending4.jpg" alt="image">
                                <div class="trend-tags">
                                    <a href="#"><i class="flaticon-like"></i></a>
                                </div>
                                <div class="trend-price">
                                    <p class="price">From <span>$350.00</span></p>
                                </div>
                            </div>
                            <div class="trend-content">
                                <p><i class="flaticon-location-pin"></i> Japan</p>
                                <h4><a href="#">Stonehenge, Windsor Castle, and Bath from London</a></h4>
                                <div class="rating mar-bottom-15">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-half checked"></span>
                                </div>
                                <span class="mar-left-5">21 Reviews</span>
                                <p class="mar-0"><i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2 night</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="trend-item">
                            <div class="ribbon ribbon-top-left"><span>25% OFF</span></div>
                            <div class="trend-image">
                                <img src="images/trending5.jpg" alt="image">
                                <div class="trend-tags">
                                    <a href="#"><i class="flaticon-like"></i></a>
                                </div>
                                <div class="trend-price">
                                    <p>Multi-day Tours</p>
                                    <p class="price">From <span>$899.00</span></p>
                                </div>
                            </div>
                            <div class="trend-content">
                                <p><i class="flaticon-location-pin"></i> Italy</p>
                                <h4><a href="#">Bosphorus Strait and Black Sea Half-Day Cruise from Istanbul</a></h4>
                                <div class="rating mar-bottom-15">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-half checked"></span>
                                    <span class="fa fa-star-half checked"></span>
                                </div>
                                <span class="mar-left-5">48 Reviews</span>
                                <p class="mar-0"><i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2 night</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="trend-item">
                            <div class="trend-image">
                                <img src="images/trending6.jpg" alt="image">
                                <div class="trend-tags">
                                    <a href="#"><i class="flaticon-like"></i></a>
                                </div>
                                <div class="trend-price">
                                    <p>Attraction Tickets</p>
                                    <p class="price">From <span>$350.00</span></p>
                                </div>
                            </div>
                            <div class="trend-content">
                                <p><i class="flaticon-location-pin"></i> Turkey</p>
                                <h4><a href="#">NYC One World Observatory Skip-the-Line Ticket</a></h4>
                                <div class="rating mar-bottom-15">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <span class="mar-left-5">18 Reviews</span>
                                <p class="mar-0"><i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2 night</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </section>
    <!-- related rooms Ends -->

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

    <div class="modal fade" id="login" role="dialog">
        <div class="modal-dialog">
            <div class="login-content">
                <div class="login-title section-border">
                    <h3>Login</h3>                    
                </div>
                <div class="login-form section-border">
                    <form>
                        <div class="form-group">
                            <input type="email" placeholder="Enter email address">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Enter password">
                        </div>
                    </form>
                    <div class="form-btn">
                        <a href="#" class="biz-btn biz-btn1">LOGIN</a>
                    </div>
                    <div class="form-group form-checkbox">
                        <input type="checkbox"> Remember Me
                        <a href="#">Forgot password?</a>
                    </div>
                </div>
                <div class="login-social section-border">
                    <p>or continue with</p>
                    <a href="#" class="btn-facebook"><i class="fab fa-facebook" aria-hidden="true"></i> Facebook</a>
                    <a href="#" class="btn-twitter"><i class="fab fa-twitter" aria-hidden="true"></i> Twitter</a>
                </div>
                <div class="sign-up">
                    <p>Do not have an account?<a href="#">Sign Up</a></p>
                </div>                
            </div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
    </div>

    <div class="modal fade" id="register" role="dialog">
        <div class="modal-dialog">
            <div class="login-content">
                <div class="login-title section-border">
                    <h3>Register</h3>                    
                </div>
                <div class="login-form section-border">
                    <form>
                        <div class="form-group">
                            <input type="text" placeholder="User Name">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password">
                        </div>
                    </form>
                    <div class="form-btn">
                        <a href="#" class="biz-btn biz-btn1">REGISTER</a>
                    </div>
                    <div class="form-group form-checkbox">
                        <input type="checkbox"> Remember Me
                        <a href="#">Forgot password?</a>
                    </div>
                </div>
                <div class="login-social section-border">
                    <p>or continue with</p>
                    <a href="#" class="btn-facebook"><i class="fab fa-facebook" aria-hidden="true"></i> Facebook</a>
                    <a href="#" class="btn-twitter"><i class="fab fa-twitter" aria-hidden="true"></i> Twitter</a>
                </div>
                <div class="sign-up">
                    <p>Do not have an account?<a href="#">Sign Up</a></p>
                </div>                
            </div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
    </div>

    <!-- *Scripts* -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/color-switcher.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/custom-nav.js"></script>

</body>
</html>