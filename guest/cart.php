<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cart</title>
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
   ?>
    <!-- header ends -->
    <!-- cart -->
    <section id="cart-main" class="cart-main bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                <?php
$userid=$_SESSION["userid"];
$result = mysqli_query($conn,"SELECT * FROM cart as c left join product as p on p.product_id=c.product_id where c.user_id='$userid' ") or die(mysqli_error($conn));
if(mysqli_num_rows($result)<=0)
{
    echo "<h1 style='text-align:center;'>Empty cart!</h1>";
}
else
{
                ?>
                    <div class="cart-inner">
                        <div class="cart-table-list">
                            <div class="order-list">

                                <?php
                                     if(isset($_GET["id"]))
                                     {
                                      $id=$_GET["id"];
                                      $result = mysqli_query($conn,"delete from cart where cart_id='$id'")or die(mysqli_error($conn));
                                      echo"<script>window.location='cart.php';</script>";
                                     }
                                ?>
                                <table class="shop_table rt-checkout-review-order-table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     $userid=$_SESSION["userid"];
  $result = mysqli_query($conn,"SELECT * FROM cart as c left join product as p on p.product_id=c.product_id where c.user_id='$userid'") or die(mysqli_error($conn));
  while($row=mysqli_fetch_assoc($result))
  {                                      ?>
                                        <tr>
                                            <td>
                                                
                                            <a href="?id=<?php echo $row["cart_id"] ?>"><i class="fa fa-times"></i></a></td>

                                            <td class="cart_item">
                                                <span class="product-name"><?php echo $row["title"]; ?></span> 
                                            </td>

                                            <td><span class="rt-Price-amount"><span>Rs</span><?php echo $row["price"]; ?></span></td>

                                            <td>
                                                <span class="quantity-buttons">
                                                <?php echo $row["qty"]; ?>
                                                </span>
                                            </td>

                                             <td class="cart-subtotal">
                                                <span class="rt-Price-amount"><span>Rs</span> <?php echo $row["price"]*$row["qty"]; ?></span>
                                            </td>
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="checkout-order">
                            <h4 class="mar-bottom-20">Cart Totals</h4>
                            <div class="order-list">
                                <table class="shop_table rt-checkout-review-order-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total=0;
                                        $userid=$_SESSION["userid"];
  $result = mysqli_query($conn,"SELECT * FROM cart as c left join product as p on p.product_id=c.product_id where c.user_id='$userid' ") or die(mysqli_error($conn));
  

  
  while($row=mysqli_fetch_assoc($result))
  {                                      ?>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                <?php echo $row["title"]; ?>&nbsp; <strong class="product-quantity">× <?php echo $row["qty"]; ?></strong> </td>
                                                <td class="product-total">
                                                    <span class="rt-Price-amount"><span>Rs</span> <?php echo $row["price"] * $row["qty"];
                                                    $total=$total + ($row["price"] * $row["qty"]);
                                                    ?></span>
                                                </td>
                                            </tr>

                                            <?php } ?>
                                        </tbody>
                                        <tfoot>


                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td><strong><span class="rt-Price-amount"><span>Rs</span> <?php echo $total; ?></span></strong> </td>
                                            </tr>

                                        </tfoot>
                                    </table>
                            </div>
                        </div>

                        <div class="checkout-place-order">
                            <p class="mar-bottom-15">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">privacy policy</a>.
                            </p>
                            <a href="checkout.php" class="biz-btn biz-btn1">Proceed to Checkout</a>

                            
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>        
        </div>
    </section>
    <!-- End store -->

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
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/custom-nav.js"></script>

</body>
</html>