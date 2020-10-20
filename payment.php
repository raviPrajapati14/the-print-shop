<?php

include "common/header.php";
include "common/database.php";

//print_r($_SESSION);

if(isset($_SESSION['pro_sku']))  //buynow
{
  
  $product=array();
  $sku=$_SESSION['pro_sku'];
  
  $sql="select * from product where sku='$sku'";
  $res=mysqli_query($link,$sql);
  
  if(mysqli_num_rows($res)==1)
  {
    $product=mysqli_fetch_assoc($res);

    //gqtCategory
    $catId=$product['categoryId'];
    $cat="select * from category where categoryId=$catId";
    $catRes=mysqli_query($link,$cat);
    $product['category']=mysqli_fetch_assoc($catRes)['name'];
    
    $taxId=$product['taxId'];
    $tax="select * from tax where taxId=$taxId";
    $taxRes=mysqli_query($link,$tax);
    $product['tax']=mysqli_fetch_assoc($taxRes)['taxPercentage'];
    
    $product['taxNum']=substr($product['tax'],0,strlen($product['tax'])-1);
    $product['purchaseQty']=$_SESSION['pro_qty'];
    $product['taxAmount']=($product['discountPrice']*$product['taxNum'])/100;
    
    $product['totalTax']=$product['taxAmount']*$product['purchaseQty'];
    $product['totalAmount']=$product['discountPrice']*$product['purchaseQty'];
    $product['deliveryCharge']=100;
    $product['finalAmount']=$product['totalAmount']+$product['totalTax']+$product['deliveryCharge'];
    $_SESSION['payingAmount']=$product['finalAmount'];
    $product['savingAmount']=(($product['price']*$product['purchaseQty'])+((($product['price']*$product['taxNum'])/100)*$product['purchaseQty'])+$product['deliveryCharge'])-$product['finalAmount'];
    //gqttax
  }
  //print_r($product);
  
  $_SESSION['productPaymentDetails']=$product;
  
  
  
}
else if(isset($_SESSION['customer']))
{
  $product=$_SESSION['productCart'];
  
}
else
{
  header('location:index.php');
}

include "common/navigation.php";
?>


      <div class="d-flex align-items-center my-5 py-5 unique-color">
        <div class="container  text-center ">
          <h3 class="text-white">Payment</h3>
        </div>
      </div>

<div class="container">

      <!--Section: Block Content-->
      <section class="mt-5 mb-4">

        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div class="col-lg-8 mb-4">

            <!-- Card -->
            <div class="card wish-list pb-1">
              <div class="card-body">


      

<form id="paymentForm">

                <h4 class="mb-3"><strong>Payment</strong></h4>

<div class="d-block my-3">
  
  <div class="form-check pl-0">
    <input id="cod" name="paymentMethod" value="1" type="radio" class="form-check-input" required>
    <label class="form-check-label" for="cod">Cash On Delivery</label>
  </div>
  <div class="form-check pl-0">
    <input id="paypal" value="2" name="paymentMethod" type="radio" class="form-check-input" required>
    <label class="form-check-label" for="paypal">UPI</label>
  </div>
  <div class="form-check pl-0">
    <input id="credit" value="3" name="paymentMethod" type="radio" class="form-check-input"  required>
    <label class="form-check-label" for="credit">Credit card</label>
  </div>
  <div class="form-check pl-0">
    <input id="debit" value="4" name="paymentMethod" type="radio" class="form-check-input" required>
    <label class="form-check-label" for="debit">Debit card</label>
  </div>

</div>

<hr class="mb-4">
<button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
</form>
</div>
</div> 
      
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4">

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

                <!-- <a href="payment.php" class="btn btn-primary btn-block waves-effect waves-light">Make purchase</a> -->


              </div>
            </div>
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
include "common/footer.php";

?>
<script>
$(document).ready(function(){
  $('#paymentForm').submit(function(e){
    //alert("dfgh")
    e.preventDefault()

    $.ajax({
      url:'validation/paymentMethod.php',
      type:'post',
      data:$(this).serialize(),
      beforeSend(){
        $('#loader').show();
      },
      success:function(res)
      {
        //alert(res);
        console.log(res);
        let jsonRes=JSON.parse(res)

        if(jsonRes.Session==true)
        {
          if(jsonRes.InFirstIf==true)
          {
            if(jsonRes.Success==true)
            {
              setTimeout(function() {location.href='myorders.php';},100);
              
            }
          }

          if(jsonRes.InSecondIf==true)
          {
            if(jsonRes.Success==true)
            {
              setTimeout(function() {location.href='myorders.php';},100);
              
            }
          }
        }
        else
        {

        }


      },
      error:function(res)
      {
        //alert(res);
        console.log(res);
      }
    });
  });
});


</script>