<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>checkout</title>
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
        #checkout-main
        {
            background-color: #ffffff;
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
    <!-- checkout starts -->
   
    <section id="checkout-main" class="checkout-main">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="checkout-inner">
                
                <div class="checkout-info">
                    <h3 class="mar-bottom-20"style="font-weight:bold">Billing details</h3>
                    <div class="row">
                   
                        <div class="col-sm-12 col-xs-12">
                            <div class="checkout-billing">
                               
                                    <div class="row">
                                        <div class="col-sm-12s col-xs-12">
                                            <div class="form-group">
                                                <label style="font-weight:bold">Address : <abbr class="required" title="required">*</abbr></label>

                                                <a href="addaddress.php">Add Address</a>
                                                <select onchange="setaddresss(this.value)" name="txtaddress" class="form-control">

                                                <option>Please Select your Address</option>

                                                <?php
                                                $userid=$_SESSION["userid"];
                    $result = mysqli_query($conn,"SELECT * FROM `address` as a left join city as c on a.city_id=c.city_id where a.user_id='$userid' order by a.address_id desc")or die(mysqli_error($conn));
                    while($row=mysqli_fetch_assoc($result))
                    {
                    ?>

                    <option value="<?php echo $row["address_id"]; ?>"><?php echo $row["address"].",".$row["landmark"].",".$row["pincode"]."-".$row["city_name"]; ?></option>

                    <?php }?>

                                                </select>
                                            </div>  
                                        </div>


                                    </div>

                             
                            </div>    
                        </div>
                        
                    </div>
                </div>

                <div class="checkout-order mar-top-15">
                    <h3 class="mar-bottom-20" style="font-weight:bold">Order</h3>
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

                <div class="checkout-place-order mar-top-15">
                    <p class="mar-bottom-15" style="font-weight:bold">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">privacy policy</a>.
                    </p>
                        <form id="checkout-selection" action="pay.php" method="POST">		
						<input type="hidden" name="item_name" value="My Test Product">
                        <input type="hidden" id="myaddress" name="myaddress"/>
                    <input type="hidden" name="txttotal" value="<?php echo $total; ?>"/>
						<input type="hidden" name="item_description" value="My Product Description">
						<input type="hidden" name="item_number" value="3456">
						<input type="hidden" name="amount" value="<?php echo $total; ?>">
						<input type="hidden" name="address" value="ABCD Address">
						<input type="hidden" name="currency" value="INR">	
						<input type="hidden" name="cust_name" value="phpzag">								
						<input type="hidden" name="email" value="test@phpzag.com">	
						<input type="hidden" name="contact" value="9999999999">								
                        <button type="submit" name="btncheckout" class="biz-btn biz-btn1" style="pading:20px">Place order</button>				
					</form>		    
                </div>
                    </div>
                </div>
            </div>        
        </div>
    </section>
  
    <!-- checkout Ends -->

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
    <script>
        function setaddresss(id)
        {
            $("#myaddress").val(id);
        }
    </script>

</body>
</html>