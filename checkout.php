<?php

include "common/header.php";
include "common/database.php";

// print_r($_SESSION);



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

    $product['taxNum']=(substr($product['tax'],0,strlen($product['tax'])-1));
    $product['purchaseQty']=$_SESSION['pro_qty'];
    $product['taxAmount']=($product['discountPrice']*$product['taxNum'])/100;

    $product['totalTax']=$product['taxAmount']*$product['purchaseQty'];
    $product['totalAmount']=$product['discountPrice']*$product['purchaseQty'];
    $product['deliveryCharge']=100;
    $product['finalAmount']=$product['totalAmount']+$product['totalTax']+$product['deliveryCharge'];
    $product['savingAmount']=(($product['price']*$product['purchaseQty'])+((($product['price']*$product['taxNum'])/100)*$product['purchaseQty'])+$product['deliveryCharge'])-$product['finalAmount'];
    //gqttax
  }
  // print_r($product);




}
else if(isset($_SESSION['customer']))
{
  //cart 

  $product=$_SESSION['productCart'];


}
else
{
  header('location:index.php');
}
include "common/navigation.php";
// print_r($_SESSION);


// echo base_url();

?>

<!-- <form> -->
      <div class="d-flex align-items-center my-5 py-5 unique-color">
        <div class="container  text-center ">
          <h3 class="text-white">Checkout</h3>
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

                <h5 class="mb-2">Billing details</h5>

<?php
if(!isset($_SESSION['customer']))
{


?>
<form id="RegisterPayment">
                <div class="form-row mb-1 mt-4">
    <div class="col">
        <!-- First name -->
        <input type="text" id="defaultRegisterFormFirstName" class="form-control mb-1" placeholder="First name" name="firstname">
        <span id="firstNameValidationMessage"></span>
    </div>
    <div class="col">
        <!-- Last name -->
        <input type="text" id="defaultRegisterFormLastName" class="form-control mb-1" placeholder="Last name" name="lastname">
        <span id="lastNameValidationMessage"></span>
    </div>
</div>

<!-- E-mail -->
<input type="email" name="username" id="defaultRegisterFormEmail" class="form-control mb-1 mt-4" placeholder="E-mail">
<span id="emailValidationMessage"></span>
<!-- Password -->
<input type="password" name="password" id="defaultRegisterFormPassword" class="form-control mb-1 mt-4" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
<span id="passwordValidationMessage"></span>

                <!-- Grid row -->
                <!-- Grid row -->
                <div class="row">
      <!-- First column -->
      <div class="col-md-6">
       
    
        <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="housenumber" placeholder="House Number ">
    <span id="houseNumberMessage"></span>

      </div>

      <!-- Second column -->
      <div class="col-md-6">
       
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="recidencename" placeholder="Recidence Name/ Apartment Name">
    <span id="recidenceNameMessage"></span>

      </div>

    </div>


    <div class="row">
      <!-- First column -->
      <div class="col-md-6">
     
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="streetname" placeholder="Street Name/ Society Name  ">
    <span id="streetNameMessage"></span>

        

      </div>

      <!-- Second column -->
      <div class="col-md-6">
       
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="landmark" placeholder="Landmark">
    <span id="landmarkMessage"></span>
      </div>

    </div>

    <div class="row">
      <!-- First column -->
      <div class="col-md-6">
        
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="areaname" placeholder="Area Name">
    <span id="areaNameMessage"></span>
      </div>

      <!-- Second column -->
      <div class="col-md-6">
        
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="city" value="Ahmedabad"  placeholder="City" readonly>
    <span id="cityMessage"></span>
      </div>

    </div>

    <div class="row">
      <!-- First column -->
      <div class="col-md-6">
       
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="state" value="Gujarat" placeholder="State" readonly>
    <span id="stateMessage"></span>

      </div>

      <!-- Second column -->
      <div class="col-md-6">
        
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" value="India" name="country" placeholder="Country" readonly>
    <span id="countryMessage"></span>

      </div>

    </div>
                      <div class="row">
                        <div class="col-md-6">
                          <input type="number" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="pincode" placeholder="Pin Code">
                          <span id="pincodeMessage"></span>
                        </div>
               
                         </div>

                         
                      <div class="row">
                        <div class="col mt-2">
                          <button type="submit" class="btn btn-block btn-green  btn-lg"> Create Account and Proceed to Payment </button>
                          <span id="checkoutRegisterMessage"></span>
                          <!-- <span class="text-centre">or</span> -->
                          OR
                          <a id="loginCheckout" href="login.php"  class='btn btn-link '>Already have Account?</a>
                        </div>
                        </div>
  
</form>
              
<?php

}
else
{
  
  $customerid=$_SESSION['customer'];
  $customerData=array();
  $customerProfile=array();
  $res = mysqli_query($link, "select * from customer where customerId=$customerid");
        
  if (mysqli_num_rows($res)==1) {  
    // customere data
      $row=mysqli_fetch_assoc($res);
      $customerid=$row['customerId'];
      $customerData=$row;

      $getProfileId=mysqli_query($link, "select * from customerprofile where customerId=$customerid");

      // if true
      if(mysqli_num_rows($getProfileId)==1)
      {
          $rowq=mysqli_fetch_assoc($getProfileId);
          $customerProfile=$rowq;
          $customerProfileId=$rowq['customerProfileId'];
      }

      $getAddressId=mysqli_query($link, "select * from customerAddress where customerId=$customerid");

        
          $index=0;
          $addresses=array();
          while($rowadds=mysqli_fetch_assoc($getAddressId))
          {
            // print_r($rowadds);
            $addressId=$rowadds['addressId'];
            $getAddress=mysqli_query($link, "select * from address where addressId=$addressId");
            $rowAddress=mysqli_fetch_assoc($getAddress);

            $addresses[$index]=$rowAddress;
            $index++;
          }
          // print_r($addresses);
          // $customerAddresses=$rowq;
          // foreach()
          
      

  }
  // print_r($customerData);
  // print_r($customerProfile);

  ?>

  
<form id="BuyNowFormLogin">
<p>Product Receiver Details :</p>
<div class="row">

<div class="col">
        <!-- First name -->
        <input type="text" id="defaultRegisterFormFirstName" class="form-control  mb-1" disabled value="<?php echo $customerData['firstName']; ?>"  placeholder="First name" name="firstname">
        <span id="firstNameValidationMessage"></span>
    </div>
    <div class="col">
        <!-- Last name -->
        <input type="text" id="defaultRegisterFormLastName" class="form-control  mb-1" disabled  placeholder="Last name" value="<?php echo $customerData['lastName']; ?>" name="lastname">
        <span id="lastNameValidationMessage"></span>
    </div>
</div>

<div class="row ">
<div class="col-md-6">
<input type="number" id="defaultRegisterFormFirstName" class="form-control mt-4 mb-4" disabled placeholder="Phone Number" value="<?php echo $customerData['contactNo']; ?>" name="firstname">
        <span id="firstNameValidationMessage"></span>
</div>
<div class="col-md-6">
<input type="email" disabled id="defaultRegisterFormFirstName" class="form-control mt-4 mb-4" placeholder="Email" value="<?php echo $customerData['email']; ?>" name="Email">
        <span id="firstNameValidationMessage"></span>
</div>
</div>

<p>Your Delivery Address :</p>
<select class="browser-default custom-select" name="delAddress" >
  <option value="-1" selected >Select your Delivery Address</option>
  <?php
  foreach($addresses as $address)
  {
        echo "<option value='".$address['addressId']."'>".$address['houseNo'].", ".$address['recidenceName'].", ".$address['streetName'].", ".$address['areaName'].", ".$address['city'].", ".$address['state'].", ".$address['country']." - ".$address['zipCode']."</option>";
  }
  ?>
</select>
<span id="AddressValidationMessage"></span>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Add New Address
</button>


<!-- Collapse buttons -->

<!-- / Collapse buttons -->

<!-- Collapsible element -->


  <!-- <div class="m-3"> -->

                <!-- </form> -->
              <!-- </div> -->
         
              <button type="submit"  class="btn btn-primary btn-block waves-effect waves-light">
Make Purchase
</button>
</form>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="" id="AddressForm">
  <div class="modal-dialog modal-lg  " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Address Details</h5>
        <button type="button" class="close" data-dismiss="m`odal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     

  <div class="row">
      <!-- First column -->
      <div class="col-md-6">
       
    
        <input type="text" id="defaultLoginFormEmail" class="form-control  mb-1" name="housenumber" placeholder="House Number ">
    <span id="houseNumberMessage"></span>

      </div>

      <!-- Second column -->
      <div class="col-md-6">
       
      <input type="text" id="defaultLoginFormEmail" class="form-control  mb-1" name="recidencename" placeholder="Recidence Name/ Apartment Name">
    <span id="recidenceNameMessage"></span>

      </div>

    </div>


    <div class="row">
      <!-- First column -->
      <div class="col-md-6">
     
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="streetname" placeholder="Street Name/ Society Name  ">
    <span id="streetNameMessage"></span>

        

      </div>

      <!-- Second column -->
      <div class="col-md-6">
       
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="landmark" placeholder="Landmark">
    <span id="landmarkMessage"></span>
      </div>

    </div>

    <div class="row">
      <!-- First column -->
      <div class="col-md-6">
        
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="areaname" placeholder="Area Name">
    <span id="areaNameMessage"></span>
      </div>

      <!-- Second column -->
      <div class="col-md-6">
        
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="city" value="Ahmedabad"  placeholder="City" readonly>
    <span id="cityMessage"></span>
      </div>

    </div>

    <div class="row">
      <!-- First column -->
      <div class="col-md-6">
       
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="state" value="Gujarat" placeholder="State" readonly>
    <span id="stateMessage"></span>

      </div>

      <!-- Second column -->
      <div class="col-md-6">
        
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" value="India" name="country" placeholder="Country" readonly>
    <span id="countryMessage"></span>

      </div>

    </div>
                      <div class="row">
                        <div class="col-md-6">
                          <input type="number" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="pincode" placeholder="Pin Code">
                          <span id="pincodeMessage"></span>
                        </div>
                        
                        
                    </div>
                    <!-- <button class="btn indigo btn-block my-4" id="SaveProfile" type="submit">Save</button> -->
                  <!-- </div>   -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
  </form>
</div>
  <?php
}
?>

              </div>
            </div>
            <!-- Card -->

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4">

          <!-- <div class="card mb-4">
              <div class="card-body">
</div></div> -->
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

$(document).ready(function() {


  $('#BuyNowFormLogin').submit(function(e){
    e.preventDefault();
    //alert("Form On Submit")

    $.ajax({
            type: "POST",
            url: 'validation/buyNowCheckoutLogin.php',
            data: $(this).serialize(),         
            beforeSend:function()
            {
              $('#loader').show();
            },
            success: function(response)
            {
                //alert(response);
                AddressValidationMessage

                var jsonResponse = JSON.parse(response);

                if(jsonResponse.AddressError)
                    {
                        $('#loader').hide()
                        // $('#addressMessage').html('');
                        $('#AddressValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.AddressError+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else if(jsonResponse.Success)
                    {
                        $('#loader').hide()
                        // $('#addressMessage').html('');
                        $('#AddressValidationMessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+"Success "+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');

                        
                        setTimeout(function() {location.href="payment.php";},100);
                    }
                    else
                    {
                      $('#loader').hide()
                        // $('#addressMessage').html('');
                        $('#AddressValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+"Something Went Wrong "+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
            },error:function(response)
            {

              //alert(response);
            }
    });
    

  });
$('#AddressForm').submit(function(e) {
      //alert("Form On Submit")
      console.log("ggierthiurugtgu");
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'validation/address.php',
            data: $(this).serialize(),         
            beforeSend:function()
            {
              $('#loader').show();
            },
            success: function(response)
            {
                //alert(response);
                $('#loader').hide()
                var jsonResponse = JSON.parse(response);

                // //alert(jsonResponse.validation);
                if(jsonResponse.sessionActive == true)
                {
                  //
                  if(jsonResponse.validation==false)
                  {
                    //valiodation messages
                    if(jsonResponse.PincodeErrorInvalid)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#pincodeMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.PincodeErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else if(jsonResponse.PincodeErrorRequired)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#pincodeMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.PincodeErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');                        
                        $('#pincodeMessage').html('');
                    }
                    if(jsonResponse.AreaNameErrorInvalid)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#areaNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.AreaNameErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else if(jsonResponse.AreaNameErrorRequired)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#areaNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.AreaNameErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');                        
                        $('#areaNameMessage').html('');
                        
                    }
                    if(jsonResponse.RecidenceNameErrorInvalid)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#recidenceNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.RecidenceNameErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else if(jsonResponse.RecidenceNameErrorRequired)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#recidenceNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.RecidenceNameErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');                        
                        $('#recidenceNameMessage').html('');
                        

                      }

                    if(jsonResponse.StreetNameErrorInvalid)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#streetNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.StreetNameErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else if(jsonResponse.StreetNameErrorRequired)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#streetNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.StreetNameErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else{
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#streetNameMessage').html('');
                        
                    }
                   
                    if(jsonResponse.HouseNumberErrorRequired)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#houseNumberMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.HouseNumberErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else{
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#houseNumberMessage').html('');
                        
                    }

                  }
                  else
                  {
                    //success
                    if(jsonResponse.success==true)
                    {
                        //success
                             
                            // $('#loader').hide()
                            $('#loader').show()
                            $('#houseNumberMessage').html('');
                            $('#areaNameMessage').html('');
                            $('#pincodeMessage').html('');
                            $('#recidenceNameMessage').html('');
                            $('#streetNameMessage').html('');
                            $('#addressMessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+"Profile Updated Successfully"+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                            location.reload();
                            // setTimeout(function() {location.reload();},100);
                            // $('#passwordValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.PasswordErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                   
                    }
                    else{
                        $('#loader').hide()
                        $('#houseNumberMessage').html('');
                        $('#areaNameMessage').html('');
                        $('#pincodeMessage').html('');
                        $('#recidenceNameMessage').html('');
                        $('#streetNameMessage').html('');               
                        $('#addressMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+"Error Updating Profile: Database Error."+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    
                  }
                }
                else
                {
                  //invalid session load login page
                  $('#loader').hide()
                  $('#houseNumberMessage').html('');
                  $('#areaNameMessage').html('');
                  $('#pincodeMessage').html('');
                  $('#recidenceNameMessage').html('');
                  $('#streetNameMessage').html('');             
                  $('#addressMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.Message+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                }
                $('#loader').hide()
           },
           error: function(response){
                $('#houseNumberMessage').html('');
                $('#areaNameMessage').html('');
                $('#pincodeMessage').html('');
                $('#recidenceNameMessage').html('');
                $('#streetNameMessage').html('');
                $('#addressMessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert">OOPs..! Something Went Wrong <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');                        
            }
       });
     });

     $('#RegisterPayment').submit(function(e){
      e.preventDefault();

      $.ajax({
        method:'POST',
        url:'validation/RegisterValid.php',
        data:$(this).serialize(),
        success:function(res){
          //alert(res);
          var jsonResponse = JSON.parse(res);

console.log(jsonResponse);

if(jsonResponse.validation == false)
{
    if(jsonResponse.FirstnameErrorInvalid)
    {
        $('#loader').hide()
        $('#signUpValidationMessage').html('');
        $('#firstNameValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.FirstnameErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
    }
    else if(jsonResponse.FirstnameErrorRequired)
    {
        $('#loader').hide()
        $('#signUpValidationMessage').html('');
        $('#firstNameValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.FirstnameErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
    }
    else
    {
        $('#loader').hide()
        $('#signUpValidationMessage').html('');
        $('#firstNameValidationMessage').html('');
    }

    if(jsonResponse.LastnameErrorInvalid)
    {
        $('#loader').hide()
        $('#signUpValidationMessage').html('');
        $('#lastNameValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.LastnameErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
    }
    else if(jsonResponse.LastnameErrorRequired)
    {
        $('#loader').hide()
        $('#signUpValidationMessage').html('');
        $('#lastNameValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.LastnameErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
    }
    else
    {
        $('#loader').hide()
        $('#signUpValidationMessage').html('');
        $('#lastNameValidationMessage').html('');
    }

    if(jsonResponse.UsernameErrorInvalid)
    {
        $('#loader').hide()
        $('#signInValidationMessage').html('');
        $('#emailValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.UsernameErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
    }
    else if(jsonResponse.UsernameErrorRequired)
    {
        $('#loader').hide()
        $('#signInValidationMessage').html('');
        $('#emailValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.UsernameErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
    }
    else
    {
        $('#loader').hide()
        $('#signInValidationMessage').html('');
        $('#emailValidationMessage').html('');
    }

    if(jsonResponse.PasswordErrorInvalid)
    {
        $('#loader').hide()
        $('#signInValidationMessage').html('');
        $('#passwordValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.PasswordErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
    }
    else if(jsonResponse.PasswordErrorRequired)
    {
        $('#loader').hide()
        $('#signInValidationMessage').html('');
        $('#passwordValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.PasswordErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
    }
    else{
        $('#loader').hide()
        $('#signInValidationMessage').html('');
        $('#passwordValidationMessage').html('');
    }

    // if(jsonResponse.FirstnameErrorInvalid)
    //                 {
    //                     $('#loader').hide()
    //                     $('#profileMessage').html('');
    //                     $('#firstNameValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.FirstnameErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
    //                 }
    //                 else if(jsonResponse.FirstnameErrorRequired)
    //                 {
    //                     $('#loader').hide()
    //                     $('#profileMessage').html('');
    //                     $('#firstNameValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.FirstnameErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
    //                 }
    //                 else
    //                 {
    //                     $('#loader').hide()
    //                     $('#profileMessage').html('');                        
    //                     $('#firstNameValidationMessage').html('');
    //                 }

    //                 if(jsonResponse.LastnameErrorInvalid)
    //                 {
    //                     $('#loader').hide()
    //                     $('#profileMessage').html('');
    //                     $('#lastNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.LastnameErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
    //                 }
    //                 else if(jsonResponse.LastnameErrorRequired)
    //                 {
    //                     $('#loader').hide()
    //                     $('#profileMessage').html('');
    //                     $('#lastNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.LastnameErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
    //                 }
    //                 else{
    //                     $('#loader').hide()
    //                     $('#profileMessage').html('');
    //                     $('#lastNameMessage').html('');
    //                 }

    if(jsonResponse.PincodeErrorInvalid)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#pincodeMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.PincodeErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else if(jsonResponse.PincodeErrorRequired)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#pincodeMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.PincodeErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');                        
                        $('#pincodeMessage').html('');
                    }
                    if(jsonResponse.AreaNameErrorInvalid)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#areaNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.AreaNameErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else if(jsonResponse.AreaNameErrorRequired)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#areaNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.AreaNameErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');                        
                        $('#areaNameMessage').html('');
                        
                    }
                    if(jsonResponse.RecidenceNameErrorInvalid)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#recidenceNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.RecidenceNameErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else if(jsonResponse.RecidenceNameErrorRequired)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#recidenceNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.RecidenceNameErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');                        
                        $('#recidenceNameMessage').html('');
                        

                      }

                    if(jsonResponse.StreetNameErrorInvalid)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#streetNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.StreetNameErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else if(jsonResponse.StreetNameErrorRequired)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#streetNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.StreetNameErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else{
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#streetNameMessage').html('');
                        
                    }
                   
                    if(jsonResponse.HouseNumberErrorRequired)
                    {
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#houseNumberMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.HouseNumberErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else{
                        $('#loader').hide()
                        $('#addressMessage').html('');
                        $('#houseNumberMessage').html('');
                        
                    }
                    // if(jsonResponse.AlternativeEmailErrorInvalid)
                    // {
                    //     $('#loader').hide()
                    //     $('#profileMessage').html('');
                    //     $('#alternativeEmailMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.AlternativeEmailErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    // }
                    // else{
                    //     $('#loader').hide()
                    //     $('#profileMessage').html('');
                    //     $('#alternativeEmailMessage').html('');
                    // }
                    // if(jsonResponse.MobileNoErrorInvalid)
                    // {
                    //     $('#loader').hide()
                    //     $('#profileMessage').html('');
                    //     $('#mobileNoMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.MobileNoErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    // }
                    // else{
                    //     $('#loader').hide()
                    //     $('#profileMessage').html('');
                    //     $('#mobileNoMessage').html('');
                    // }
                    // if(jsonResponse.AlternativeMobileNoErrorInvalid)
                    // {
                    //     $('#loader').hide()
                    //     $('#profileMessage').html('');
                    //     $('#alternativeMobileNoMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.AlternativeMobileNoErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    // }
                    // else{
                    //     $('#loader').hide()
                    //     $('#profileMessage').html('');
                    //     $('#alternativeMobileNoMessage').html('');
                    // }
                    // if(jsonResponse.GenderErrorInvalid)
                    // {
                    //     $('#loader').hide()
                    //     $('#profileMessage').html('');
                    //     $('#genderMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.GenderErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    // }
                    // else{
                    //     $('#loader').hide()
                    //     $('#profileMessage').html('');
                    //     $('#genderMessage').html('');
                    // }
                    // if(jsonResponse.DOBInvalid)
                    // {
                    //     $('#loader').hide()
                    //     $('#profileMessage').html('');
                    //     $('#dobMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.DOBInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    // }
                    // else{
                    //     $('#loader').hide()
                    //     $('#profileMessage').html('');
                    //     $('#dobMessage').html('');
                    // }

}
else
{
    if(jsonResponse.Success == true)
    {   
        if(jsonResponse.AlreadyRegistred == true)
        {
            $('#loader').hide()
            $('#emailValidationMessage').html('');
            $('#passwordValidationMessage').html('');
            $('#lastNameValidationMessage').html('');
            $('#firstNameValidationMessage').html('');
            $('#houseNumberMessage').html('');
                            $('#areaNameMessage').html('');
                            $('#pincodeMessage').html('');
                            $('#recidenceNameMessage').html('');
                            $('#streetNameMessage').html('');
            $('#checkoutRegisterMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.Message+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
        }
        else
        {
            $('#emailValidationMessage').html('');
            $('#passwordValidationMessage').html('');
            $('#lastNameValidationMessage').html('');
            $('#firstNameValidationMessage').html('');
            $('#houseNumberMessage').html('');
                            $('#areaNameMessage').html('');
                            $('#pincodeMessage').html('');
                            $('#recidenceNameMessage').html('');
                            $('#streetNameMessage').html('');
            $('#checkoutRegisterMessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+jsonResponse.Message+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
            setTimeout(function() {$('#loader').hide();window.location.href = "payment.php";}, 2000);
        }
        // if(jsonResponse.success1==true)
        //                 {                            
        //                     // $('#loader').hide()
        //                     $('#loader').show()
        //                     $('#emailValidationMessage').html('');
        //     $('#passwordValidationMessage').html('');
        //     $('#lastNameValidationMessage').html('');
        //     $('#firstNameValidationMessage').html('');
        //     $('#houseNumberMessage').html('');
        //                     $('#areaNameMessage').html('');
        //                     $('#pincodeMessage').html('');
        //                     $('#recidenceNameMessage').html('');
        //                     $('#streetNameMessage').html('');
        //                     $('#checkoutRegisterMessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+"Successfull"+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
        //                     // location.reload();
        //                     // setTimeout(function() {location.reload();},100);
        //                     // $('#passwordValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.PasswordErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
        //                 }
        //                 else{
        //                     $('#loader').hide()
        //                     $('#emailValidationMessage').html('');
        //     $('#passwordValidationMessage').html('');
        //     $('#lastNameValidationMessage').html('');
        //     $('#firstNameValidationMessage').html('');
        //     $('#houseNumberMessage').html('');
        //                     $('#areaNameMessage').html('');
        //                     $('#pincodeMessage').html('');
        //                     $('#recidenceNameMessage').html('');
        //                     $('#streetNameMessage').html('');
        //                     $('#checkoutRegisterMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+"Error Updating Profile: Database Error."+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                            
        //                 } 
    }
    else{
        $('#loader').hide()
        $('#emailValidationMessage').html('');
            $('#passwordValidationMessage').html('');
            $('#lastNameValidationMessage').html('');
            $('#firstNameValidationMessage').html('');
            $('#houseNumberMessage').html('');
                            $('#areaNameMessage').html('');
                            $('#pincodeMessage').html('');
                            $('#recidenceNameMessage').html('');
                            $('#streetNameMessage').html('');
        $('#checkoutRegisterMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.Message+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
    }


}
        },
        error:function(res){
          //alert(res);
          $('#emailValidationMessage').html('');
            $('#passwordValidationMessage').html('');
            $('#lastNameValidationMessage').html('');
            $('#firstNameValidationMessage').html('');
            $('#houseNumberMessage').html('');
                            $('#areaNameMessage').html('');
                            $('#pincodeMessage').html('');
                            $('#recidenceNameMessage').html('');
                            $('#streetNameMessage').html('');

                            $('#checkoutRegisterMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.Message+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
        },
      })


     });
});
</script>