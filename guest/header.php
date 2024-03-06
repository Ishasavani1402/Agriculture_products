
<header class="main_header_area">
        <div class="header-content">
            <div class="container">
                <div class="links links-left">
                    <ul>
                        <!-- <li><i class="fa fa-phone-alt"></i> 8799316931</a></li>
                        <li><i class="fa fa-envelope-open"></i> savaniisha57@gmail.com</a></li> -->
                       
                    </ul>
                </div>
                <div class="links links-right pull-right">
                    <ul>
                        <li>
                            <!-- translation -->
                        <div id="google_translate_element"></div>
                            
                        </li>
                        <?php
                              if(!isset($_SESSION["userid"]))
                              {
                              ?>
                        <li class="bold"><a href="register.php"><i class="fa fa-sign-out-alt"></i> Register</a></li>

                        <?php } ?>
                        
                    </ul>
                </div>
            </div>
        </div>
        <!-- Navigation Bar -->
        <div class="header_menu affix-top">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-flex">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a class="navbar-brand" href="index.php">
                                <img src="images/logoes.jpg" width="200" alt="image">
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" id="responsive-menu">
                                <li class="">
                                    <a href="index.php"  role="button" aria-haspopup="true" aria-expanded="false" style="font-weight:bold">Home</a>
                                   
                                </li>
                                <li class="">
                                    <a href="aboutus.php"  role="button" aria-haspopup="true" aria-expanded="false"style="font-weight:bold">About Us</a>
                                   
                                </li>
                                
                                <li class="">
                                    <a href="shop.php"  role="button" aria-haspopup="true" aria-expanded="false"style="font-weight:bold">Our Products</a>
                                   
                                </li>    
                                <!-- <li class="">
                                    <a href="shop.php"  role="button" aria-haspopup="true" aria-expanded="false">Our Shops</a>
                                   
                                </li>     -->
                                <li class="">
                                    <a href="ourshop.php"  role="button" aria-haspopup="true" aria-expanded="false"style="font-weight:bold">our shop</a>
                                    
                                </li>                                
                                
                                <li class="">
                                    <a href="blog-grid.php"  role="button" aria-haspopup="true" aria-expanded="false"style="font-weight:bold">Blog</a>
                                    
                                </li>
                                <li class="">
                                    <a href="contactus.php"  role="button" aria-haspopup="true" aria-expanded="false"style="font-weight:bold">Contact us</a>
                                   
                                </li>  

                             
                               
                              <?php
                              if(isset($_SESSION["userid"]))
                              {
                              ?>
                               
                                <li class="submenu dropdown">
                                    <a href="dashboard.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, <?php echo $_SESSION["name"]; ?> <i class="fa fa-angle-down" aria-hidden="true"></i></a> 
                                    <ul class="dropdown-menu">
                                    <!-- <li><a href="changepassword.php">Change Password</a></li> -->
                                   
                                        <li><a href="logout.php">Log out</a></li>
                                   
                                    </ul>
                                </li>

                              
                                
                              
                                <!-- <li class="dropdown">
                                    <a href="cart.php" class="mt_cart"><i class="fa fa-shopping-cart"></i><span class="number-cart">
                                        <?php
                                        $userid=$_SESSION["userid"];
                                        $check = mysqli_query($conn,"select * from cart where user_id='$userid'");
                                        echo mysqli_num_rows($check);
                                        ?>
                                    </span></a>
                                </li>   -->

                                <?php } ?>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                        <div id="slicknav-mobile"></div>
                    </div>
                </div><!-- /.container-fluid --> 
            </nav>
        </div>
 
        <!-- Navigation Bar Ends -->
    </header>