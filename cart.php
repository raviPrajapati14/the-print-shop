<?php

include "common/header.php";
include "common/database.php";

if(isset($_SESSION['customer']))
{
  // echo "SET";
  // if(isset($_SESSION[]))


  unset($_SESSION['pro_qty'] );
  unset($_SESSION['pro_sku'] );
  unset($_SESSION['FromBuyNow'] );
  // [customer] => 2
    // [customeremail] => Jsp@gmail.com
    unset($_SESSION['deliveryAddress']);
    unset($_SESSION['payingAmount']);
    unset($_SESSION['productPaymentDetails']);

  include "common/navigation.php";
//get cxart 

?>
 <div class="d-flex align-items-center my-5 py-5 unique-color">
        <div class="container  text-center ">
          <h1 class="text-white">Cart</h1>
        </div>
      </div>
<?php

$customerId=$_SESSION['customer'];
  $sqlCart="select * from usercart where customerid=$customerId";
  $res=mysqli_query($link,$sqlCart);
  if(mysqli_num_rows($res)!=0)
  {
    $carts=array();
    $index=0;
    $count=mysqli_num_rows($res);
    while($row=mysqli_fetch_assoc($res))
    {
      $product=array();
      $carts[$index]=$row;
      $productId=$row['productId'];

      $getImage="select * from productimage where productId=$productId";
      $resProIm=mysqli_query($link,$getImage);
      if(mysqli_num_rows($resProIm)==1)
      {
        $rowProIm=mysqli_fetch_assoc($resProIm);

        $carts[$index]['ProImage']=$base_url."/admin/".$rowProIm['imageLocation'];

      }


      $getProduct="select * from product where productId=$productId";
      $resPro=mysqli_query($link,$getProduct);
      if(mysqli_num_rows($resPro)==1)
      {
        $rowPro=mysqli_fetch_assoc($resPro);

        $carts[$index]['productInfo']=$rowPro;

        $categoryId=$rowPro['categoryId'];
        $taxId=$rowPro['taxId'];

        $getCat="select * from category where categoryId=$categoryId";
        $resProCat=mysqli_query($link,$getCat);
        if(mysqli_num_rows($resProCat)==1)
        {
          $rowProCat=mysqli_fetch_assoc($resProCat);
  
          $carts[$index]['productCategory']=$rowProCat;
  
        }
        
      $gettax="select * from tax where taxId=$taxId";
      $resProtax=mysqli_query($link,$gettax);
      if(mysqli_num_rows($resProtax)==1)
      {
        $rowProtax=mysqli_fetch_assoc($resProtax);

        $carts[$index]['productTax']=$rowProtax;

      }  
      
    
    

    }

    

    $product['taxNum']=(substr($rowProtax['taxPercentage'],0,strlen($rowProtax['taxPercentage'])-1));
    $product['purchaseQty']=$carts[$index]['quantity'];
    $product['taxAmount']=($rowPro['discountPrice']*$product['taxNum'])/100;

    $product['totalTax']=$product['taxAmount']*$product['purchaseQty'];
    $product['totalAmount']=$rowPro['discountPrice']*$product['purchaseQty'];
    $product['deliveryCharge']=100;
    $product['finalAmount']=$product['totalAmount']+$product['totalTax']+$product['deliveryCharge'];
    $product['savingAmount']=(($rowPro['price']*$product['purchaseQty'])+((($rowPro['price']*$product['taxNum'])/100)*$product['purchaseQty'])+$product['deliveryCharge'])-$product['finalAmount'];

    $carts[$index]['Calculation']=$product;



      // //print_r($product);







      

      $index++;
    }
    // print_r($carts);




  









?>

<div class="container mt-5  ">

      <!--Section: Block Content-->
      <section class="mt-5 mb-4">

        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div class="col-lg-8">

            <!-- Card -->
            <div class="card wish-list mb-4">
              <div class="card-body">

                <h5 class="mb-4">Cart (<span><?php echo $count; ?></span> items)</h5>


<?php
foreach($carts as $cartItem)
{

?>

                <div class="row mb-4">
                  <div class="col-md-5 col-lg-3 col-xl-3">
                    <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                      <img class="img-fluid w-100" src="<?php echo $cartItem['ProImage']; ?>" alt="Sample">
                      <a href=".!">
                        <div class="mask waves-effect waves-light">
                          <img class="img-fluid w-100" src="<?php echo $cartItem['ProImage']; ?>">
                          <div class="mask rgba-black-slight waves-effect waves-light"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-7 col-lg-9 col-xl-9">
                    <div>
                      <div class="d-flex justify-content-between">
                        <div>
                          <h5><?php echo $cartItem['productInfo']['productName'];  ?></h5>
                          <p class="mb-3 text-muted text-uppercase small"><?php echo "Category :".$cartItem['productCategory']['name'];  ?></p>
                          <p class="mb-2 text-muted text-uppercase small"><?php echo "tax :".$cartItem['productTax']['taxName']."  ".$cartItem['productTax']['taxPercentage'] ;  ?></p>
                          <?php
                          if($cartItem['withPrint']==1)
                          {
                          ?>
                          <p class="mb-3 text-muted text-uppercase small"><?php echo "<a href='".$cartItem['file']."' target='_blank'>Attached File </a>";  ?></p>

                          <?php 
                          }
                          ?>
                        </div>
                        <div>

                        <div class="def-number-input number-input safari_only mb-0 w-100">
                        <button  class="minus Minus"></button>
                        <input class="quantity Qty" min="<?php echo $cartItem['productInfo']['minimumQty']; ?>"  name="quantity" value="<?php echo $cartItem['quantity']; ?>" max="<?php echo $cartItem['productInfo']['quantity']; ?>" type="number" data-proId="<?php echo($cartItem['productInfo']['sku']);?>">
                        <button  class="plus Plus"></button>
                      </div>
                      
                          
                        
                        </div>
                      </div>
                      <span class='QuantityMsg'>

                      </span>
                      
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <a href="" type="button" class="card-link-secondary small text-uppercase mr-3"><i class="fas fa-trash-alt mr-1"></i> Remove item </a>
                          
                        </div>
                        <p class="mb-0"><span><strong><?php echo $cartItem['productInfo']['discountPrice']; ?> ₹  </strong></span><del class="text-danger"><strong><?php echo $cartItem['productInfo']['price']; ?> ₹</strong></del></p>
                        <!-- <p class="mb-0"></p> -->
                      </div>
                    </div>
                  </div>
                </div>

                <hr class="mb-4">

                <?php
  
  
}



?>

                
         

              </div>
            </div>
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-4">
              <div class="card-body">

                <h5 class="mb-4">Expected shipping delivery</h5>

                <p class="mb-0"> Thu., 12.03. - Mon., 16.03.</p>
              </div>
            </div>
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-4">
              <div class="card-body">

                <h5 class="mb-4">We accept</h5>

                <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg" alt="Visa">
                <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg" alt="American Express">
                <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg" alt="Mastercard">
                <img class="mr-2" width="45px" src="https://z9t4u9f6.stackpathcdn.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png" alt="PayPal acceptance mark">
              </div>
            </div>
            <!-- Card -->

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4">
<?php 
$cartsFinal['final']=$carts[0]['Calculation'];
// //print_r($carts);

$inde1x=0;
foreach($carts as $cartw)
{
  $calc=$cartw['Calculation'];
  // //print_r($calc);
  if(!$inde1x==0)
  {
    // //print_r($cartw['Calculation']['totalTax']);
    // //print_r($carts['final']['totalTax']);
    $cartsFinal['final']['totalTax']+=$calc['totalTax'];
    $cartsFinal['final']['totalAmount']+=$cartw['Calculation']['totalAmount'];
    $cartsFinal['final']['finalAmount']+=$cartw['Calculation']['finalAmount'];
    $cartsFinal['final']['savingAmount']+=$cartw['Calculation']['savingAmount'];
    $cartsFinal['final']['deliveryCharge']+=$cartw['Calculation']['deliveryCharge'];
    // $carts['final']['totalTax']=$cart['Calculation']['totalTax'];

  }

// echo $inde1x;
$inde1x++;
}
// echo $inde1x;
// echo "<br><br>";
// //print_r($carts['final']);


$product=$cartsFinal['final'];
$_SESSION['productCart']=$product;
$_SESSION['cartDetails']=$carts;
$_SESSION['FromCart']=true;
?>
            <!-- Card -->
            <div class="card mb-4">
              <div class="card-body">

                <h5 class="mb-3">The total amount of</h5>

                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                  Total Amount
                    <span>
                    <?php echo $product['totalAmount']+$product['savingAmount']."₹"; ?>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                    Shipping Charges
                    <span>
                    <?php echo "+".$product['deliveryCharge']."₹"; ?>
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 ">
                    <div>
                      <strong>Discount Amount </strong>
                      
                    </div>
                    <span><strong>
                    <?php echo "-".$product['savingAmount']."₹"; ?>
                    </strong></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                    <div>
                      <strong>
                        <p class="">(including GST)</p>
                      </strong>
                      <strong>The final amount of</strong>
                    </div>
                    <span>
                    <strong>
                    <p><?php echo "+".$product['totalTax']."₹"; ?></p>
                      </strong>
                    <strong>                    
                    <?php echo $product['finalAmount']."₹"; ?>
                    </strong>
                    </span>
                  </li>
                  
                </ul>

                <a href="checkout.php" class="btn btn-primary btn-block waves-effect waves-light">Proceed to Checkout</a>


              </div>
            </div>     <!-- Card -->

            <!-- Card -->
           
            <!-- Card -->

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </section>
      <!--Section: Block Content-->

    </div>
<?php
}
else
{
  ?>
<div class="container mt-5 pt-5">

<!--Section: Block Content-->
<section class="mt-5 mb-4">

<!--Grid row-->
<div class="row">

  <!--Grid column-->
  <div class="col">

    <!-- Card -->
    <div class="card wish-list mb-4">
      <div class="card-body text-white blue darken-3">
      <h1 class="text-center ">
No Items in Your Cart
      </h1>
    </div>
  </div>
  <a href="products.php" class="float-right btn btn-lg purple">Continue Shopping >></a>
</div>
</div>
</section>
</div>

  <?php
}




  }
else
{
  include 'common/navigation.php';
  // echo "NOT SET";
  ?>
<div class="container mt-5 pt-5">

<!--Section: Block Content-->
<section class="mt-5 mb-4">

  <!--Grid row-->
  <div class="row">

    <!--Grid column-->
    <div class="col">

      <!-- Card -->
      <div class="card wish-list mb-4">
        <div class="card-body text-white blue-gradient">
        <h1 class="text-center ">
        You Must Login to Access Cart.
        </h1>
</div>
</div>
</div>
</div>
</section>
</div>

  <?php


}

// <?php
include "common/footer.php";

?>
<script>
  $('.Minus').click(function(e){
  e.preventDefault();

  oldVal=$('.Qty').val();
  $sku=$('.Qty').attr('data-proid');

newVal=$('.Qty').val(oldVal-1);

// //alert("fd")
  $.ajax({
    url:'validation/PlusMinus.php',
    method:'post',
    data:{action:"Minus",qty:$('.Qty').val(),sku:$sku},
    success:function(res)
    {
      console.log(res);
      if(res==1)
      {
        $('.Qty').val(oldVal);
        $('.QuantityMsg').html('<div class="alert alert-danger"><strong><i class="fas fa-exclamation-circle"></i></strong> Quantity is Must be in between Range</div>')
      }
      else
      {
        $('.QuantityMsg').html('');
      }
    },
    error:function(res)
    {
      console.log(res);
    }
  });
})
$('.Plus').click(function(e){
  e.preventDefault();


  
oldVal=$('.Qty').val();
$sku=$('.Qty').attr('data-proid');
newVal=oldVal
$('.Qty').val((++newVal));
// //alert("fd")
  $.ajax({
    url:'validation/PlusMinus.php',
    method:'post',
    data:{action:"Plus",qty:$('.Qty').val(),sku:$sku},
    success:function(res)
    {
      console.log(res);
      if(res==1)
      {
        $('.Qty').val(oldVal);
        $('.QuantityMsg').html('<div class="alert alert-danger"><strong><i class="fas fa-exclamation-circle"></i></strong> Quantity is Must be in between Range</div>')
      }
      else
      {
        $('.QuantityMsg').html('');
      }
    },
    error:function(res)
    {
      console.log(res);
    }
  });
})
$oldVal=$('.Qty').val();
$('.Qty').change(function(e){
  // e.preventDefault()
// //alert("fd")

// ldVal=$('.Qty').val();
// newVal=$('.Qty').val(oldVal-1);
$sku=$('.Qty').attr('data-proid');

  $.ajax({
    url:'validation/PlusMinus.php',
    method:'post',
    data:{action:"PluMinus",qty:$('.Qty').val(),sku:$sku},
    success:function(res)
    {
      console.log(res);
      if(res==1)
      {
        $('.Qty').val($oldVal);
        $('.QuantityMsg').html('<div class="alert alert-danger"><strong><i class="fas text-danger fa-exclamation-circle"></i></strong>  Quantity is Must be in between Range</div>')
      }
      else
      {
        $oldVal=$('.Qty').val()
        $('.QuantityMsg').html('');
      }
      
    },
    error:function(res)
    {
      console.log(res);
    }
  });
})
</script>