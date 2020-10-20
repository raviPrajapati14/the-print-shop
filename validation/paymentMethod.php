<?php
// Note : This process will remain same for any scenario
// login or not
// buy now 
    // it get product details by session
    // flag Session FromBuyNow
// add to cart
    // it get products from cart
    // flag Sewssion FromCart

// if buynow is not success then it will add product into cart
// if product is exist then it not update
// Note: // if same product available in cart with buy now then  addtocart is changed to gotocart
//if user visits add to cart after buy now
    //then update cart with buynow product
    //destroy session information |pro_sku,FromBuyNow,etc
    //set FromCart
session_start();
include '../common/database.php';
//suppose user already login
//but if session is expired

// addtocart --set FromCart|
// checkout --set Address information
//--if not login then create user and login user
// payment --set payment method

// buynow --set product information
// checkout --set Address information
//--if not login then create user and login user
// payment --set payment method

$result=array();

if(isset($_SESSION['customer']))
{
    //for BuyNow
    $result['Session']=true;

    if(isset($_SESSION['pro_sku']) && isset($_SESSION['FromBuyNow']))
    {

        
        $result['InFirstIf']=true;
        // echo "FROMbUY";
//payment        
        $amount=$_SESSION['payingAmount'];
        $method=$_POST['paymentMethod'];
        $paymentStatus=2;//successfull
//order        
        $customerId=$_SESSION['customer'];
        $orderStatus=2;//delivered
        $orderPrice=$_SESSION['productPaymentDetails']['totalAmount']+$_SESSION['productPaymentDetails']['savingAmount'];
        $orderDiscount=$_SESSION['productPaymentDetails']['savingAmount'];
        $orderTotalTax=$_SESSION['productPaymentDetails']['totalTax'];
        $ordetTotalPrice=$_SESSION['productPaymentDetails']['finalAmount'];
        $deliveryCharges=$_SESSION['productPaymentDetails']['deliveryCharge'];
        $address=$_SESSION['deliveryAddress'];
        $orderEmail=$_SESSION['customeremail'];
        $orderContact=null;
//orderproduct
        $productId=$_SESSION['productPaymentDetails']['productId'];
        $productSku=$_SESSION['productPaymentDetails']['sku'];
        $quantity=$_SESSION['productPaymentDetails']['purchaseQty'];
        $price=$_SESSION['productPaymentDetails']['price'];
        $discount=$price-$_SESSION['productPaymentDetails']['discountPrice'];//discount Amount
        $finalPrice=$_SESSION['productPaymentDetails']['discountPrice'];//discount price $orig-dis
        $taxPrice=$_SESSION['productPaymentDetails']['taxAmount'];//tax amount per qty
        $totalPrice=$finalPrice+$taxPrice;//
        if(isset($_SESSION['pro_printing']))
        {
            $withPrint=1;
            $file=$_SESSION['pro_doc'];
        }
        else
        {
            $withPrint=0;
            $file=null;
        }



        $paymentSql="insert into payment values('','$amount','".date("Y-m-d")."',$method,$paymentStatus)";
        // $paymentQry=

        if(mysqli_query($link,$paymentSql))
        {
            $paymentId=mysqli_insert_id($link);

            $orderSql="insert into orders values('',$customerId,$orderStatus,$paymentId,$orderPrice,$orderDiscount,'".date("Y-m-d")."','".date("Y-m-d")."',$address,'$orderEmail','$orderContact',$orderTotalTax,$ordetTotalPrice,$deliveryCharges)";

            if(mysqli_query($link,$orderSql)){

                
                $orderId=mysqli_insert_id($link);
                
                $orderProductSql="insert into orderproduct values('',$orderId,$productId,$quantity,$price,$discount,$finalPrice,$taxPrice,$totalPrice,'$productSku',$withPrint,'$file')";
                
                if(mysqli_query($link,$orderProductSql))
                {
                    $result['Success']=true;
                    
                }
                else{
                    $result['step3Error']=true;
                    $result['step3ErrorMessage']="Error : ".$orderProductSql.mysqli_error($link);
                }
            }
            else
            {
                $result['step2Error']=true;
                $result['step2ErrorMessage']="Error : ".$orderSql.mysqli_error($link);
            }
        }   
        else
        {
            $result['step1Error']=true;
            $result['step1ErrorMessage']="Error : ".$paymentSql.mysqli_error($link);
        }
        

        //payment Table
            //get cutomer Id
            //get Amount
            //Default we make status as successfull
            //method 
            //date
            //return payment Id
        
            //order //payment
        
        
            //from Session
            //price detais
            //address
            //date
            //user details
            //return order id
        
            //order product  //order
            //product details
            
    }
    elseif((isset($_SESSION['FromCart']) && !isset($_SESSION['FromBuyNow'])) || (!isset($_SESSION['pro_sku']) && isset($_SESSION['FromCart'])))
    {
        $result['InSecondIf']=true;


//payment        
$amount=$_SESSION['productCart']['finalAmount'];  
$method=$_POST['paymentMethod'];
$paymentStatus=2;//successfull
//order        
$customerId=$_SESSION['customer'];
$orderStatus=2;//delivered
$orderPrice=$_SESSION['productCart']['totalAmount']+$_SESSION['productCart']['savingAmount'];
$orderDiscount=$_SESSION['productCart']['savingAmount'];
$orderTotalTax=$_SESSION['productCart']['totalTax'];
$ordetTotalPrice=$_SESSION['productCart']['finalAmount'];
$deliveryCharges=$_SESSION['productCart']['deliveryCharge'];
$address=$_SESSION['deliveryAddress'];
$orderEmail=$_SESSION['customeremail'];
$orderContact=null;
//orderproduct




$index=0;
foreach($_SESSION['cartDetails'] as $cart)
{
    $usercartId[$index]=$cart['userCartId'];
    $productId[$index]=$cart['productId'];
    $productSku[$index]=$cart['productInfo']['sku'];
    $quantity[$index]=$cart['quantity'];
    $price[$index]=$cart['productInfo']['price'];
    $discount[$index]=$price[$index]-$cart['productInfo']['discountPrice'];//discount Amount
    $finalPrice[$index]=$cart['productInfo']['discountPrice'];//discount price $orig-dis
    $taxPrice[$index]=$cart['Calculation']['taxAmount'];//tax amount per qty
    $totalPrice[$index]=$finalPrice[$index]+$taxPrice[$index];
    if(isset($_SESSION['withPrint']))
    {
        $withPrint[$index]=1;
        $file[$index]=$_SESSION['file'];
    }
    else
    {
        $withPrint[$index]=0;
        $file[$index]=null;
    }
$index++;

}    



$paymentSql="insert into payment values('','$amount','".date("Y-m-d")."',$method,$paymentStatus)";
// $paymentQry=

if(mysqli_query($link,$paymentSql))
{
    $paymentId=mysqli_insert_id($link);

    $orderSql="insert into orders values('',$customerId,$orderStatus,$paymentId,$orderPrice,$orderDiscount,'".date("Y-m-d")."','".date("Y-m-d")."',$address,'$orderEmail','$orderContact',$orderTotalTax,$ordetTotalPrice,$deliveryCharges)";

    if(mysqli_query($link,$orderSql)){

        
        $orderId=mysqli_insert_id($link);
        
        $index1=0;
        foreach($productId as $producti)
        {   

            $orderProductSql="insert into orderproduct values('',$orderId,$producti,$quantity[$index1],$price[$index1],$discount[$index1],$finalPrice[$index1],$taxPrice[$index1],$totalPrice[$index1],'$productSku[$index1]',$withPrint[$index1],'$file[$index1]')";
            
            if(mysqli_query($link,$orderProductSql))
            {
                $result['Success']=true;



// empty cart
                foreach($usercartId as $cart)
                {

                    $delCartSql="delete from usercart where userCartId=$cart";
                    if(mysqli_query($link,$delCartSql))
                    {
                        
                    }

                }
                

                
            }
            else{
                $result['step3Error']=true;
                $result['step3ErrorMessage']="Error : ".$orderProductSql.mysqli_error($link);
            }
            $index1++;
        }


    }
    else
    {
        $result['step2Error']=true;
        $result['step2ErrorMessage']="Error : ".$orderSql.mysqli_error($link);
    }
}   
else
{
    $result['step1Error']=true;
    $result['step1ErrorMessage']="Error : ".$paymentSql.mysqli_error($link);
}






        
        // addtocart --> checkout --> payment
        //destroy sess
        //product details comes from cart
        //other from session
    }
    else
    {
        $result['InThirdIf']=true;
        //session error

        //Session has Expired 
        // Show Session Expire Message and rdirect to Login page
        session_destroy();
        header('location:../login.php');
    }

}
else
{
    $result['Session']=false;
    //Session has Expired 
    // Show Session Expire Message and rdirect to Login page
    session_destroy();
    header('location:../login.php');
}

// print_r($_POST)

echo json_encode($result);

?>