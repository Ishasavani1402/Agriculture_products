<?php
include 'connection.php';
require('config.php');

session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
  


             $total = $_SESSION["txttotal"];
             $address = $_SESSION["adid"];
             $userid=$_SESSION["userid"];
             $payid=$_POST['razorpay_payment_id'];
             $result=mysqli_query($conn,"insert into tbl_orders (user_id,address_id,totalpayment,ispay,paymentmethod,trans_num,staus) values('$userid','$address','$total','yes','online','$payid','pending')") or die(mysqli_error($conn));

             $id=mysqli_insert_id($conn);
             $userid=$_SESSION["userid"];
$res = mysqli_query($conn,"SELECT * FROM cart as c where c.user_id='$userid' ") or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($res))
{
$pid=$row["product_id"];
$qty=$row["qty"];
mysqli_query($conn,"insert into items (order_id,product_id,qty) values('$id','$pid','$qty')");
}
$res = mysqli_query($conn,"delete FROM cart where user_id='$userid' ") or die(mysqli_error($conn));
echo "<script>window.location='myorder.php';</script>";
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
