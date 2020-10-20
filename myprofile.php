<?php

include "common/header.php";
include "common/database.php";
// //print_r($_SESSION);

if(!isset($_SESSION['customer']))
{
  // echo "HHFRIRHI";
    header('location:login.php');
}
else
{
  $username=$_SESSION['customer'];
  $customerData=array();
  $customerProfile=array();
  $res = mysqli_query($link, "select * from customer where customerId='$username'");
        
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
            // //print_r($rowadds);
            $addressId=$rowadds['addressId'];
            $getAddress=mysqli_query($link, "select * from address where addressId=$addressId");
            $rowAddress=mysqli_fetch_assoc($getAddress);

            $addresses[$index]=$rowAddress;
            $index++;
          }
          // //print_r($addresses);
          // $customerAddresses=$rowq;
          // foreach()
          
      

  }
  // //print_r($customerData);
  // //print_r($customerProfile);
  
}

include "common/navigation.php";


?>

<div class="d-flex align-items-center my-5 py-5  unique-color">
  <div class="container  text-center">
    <h3 class="text-white">My Profile</h3>
  </div>
</div> 
<div class="container">
  <section class="mt-5 mb-4">
    <div class="container-fluid"> 
      <section class="section">
        <div class="row">
          <div class="col-lg-6  mb-4">
            <div class="card card-cascade narrower mb-4">
              <div class="view view-cascade gradient-card-header  unique-color">
                <h5 class="mb-0 font-weight-bold">Edit Account</h5>
            
              </div>
              <div class="card-body card-body-cascade text-center">
              <span id="profileMessage"></span>
                <form class="ProfileFrm" id="ProfileForm">
                  <div class="row">                    
                    <div class="col-md-6">
                      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="firstname" value="<?php echo $customerData['firstName'];?>" placeholder="First Name" >
                      <span id="firstNameMessage"></span>
                    </div>
                    <div class="col-md-6">            
                      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="lastname" value="<?php echo $customerData['lastName'];?>" placeholder="Last Name">
                      <span id="lastNameMessage"></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <input type="number" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="mobileno" placeholder="Mobile No" value="<?php echo $customerData['contactNo'];?>">
                      <span id="mobileNoMessage"></span>    
                    </div>
                    <?php
                    // print_r($customerData);
                    // print_r($customerProfile);
                    ?>
                    <div class="col-md-6">
                      <input type="email" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="alternativeemail" placeholder="Alternative Email" value="<?php if(isset($customerProfile['altEmail'])){ echo $customerProfile['altEmail'];}?>" >
                      <span id="alternativeEmailMessage"></span>
                    </div>
                  </div>
                  <div class="row mt-4 mb-1 ">
                    <div class="col-md-4">
                      Gender:   
                    </div>
                    <div class="col-md-4 ">
                      <div class="form-check">
                        <input type="radio" class="form-check-input" id="materialUnchecked" value="0" name="gender" <?php if(isset($customerProfile['gender'])){ if($customerProfile['gender']==0) echo "checked";}?> >
                        <label class="form-check-label" for="materialUnchecked">Male</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-check">
                        <input type="radio" class="form-check-input" id="materialChecked" value="1" name="gender" <?php if(isset($customerProfile['gender'])){ if($customerProfile['gender']==1) echo "checked"; }?>  >
                        <label class="form-check-label" for="materialChecked">Female</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <input type="number"  name="alternativemobileno" placeholder="Alternative Mobile No"  value="<?php if(isset($customerProfile['altPhone'])){  echo $customerProfile['altPhone'];}?>" class="form-control mt-4 mb-1">
                      <span id="alternativeMobileNoMessage"></span>
                    </div>
                    <div class="col">
                      <input type="date" id="birthday" name="dob" value="<?php if(isset($customerProfile['dateOfBirth'])){ echo $customerProfile['dateOfBirth'];}?>"  class="form-control mt-4 mb-1">
                      <span id="dobMessage"></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <button class="btn indigo btn-block my-4" id="SaveProfile" type="submit">Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

<div class="col">
            <div class="card card-cascade narrower ">

<!-- Card image -->
<div class="view view-cascade gradient-card-header  unique-color">
  <h5 class="mb-0 font-weight-bold"> Saved Address</h5>
</div>
<!-- Card image -->

<!-- Card content -->
<div class="card-body card-body-cascade text-center">
  
  <span id="addressMessage"></span>
  <!-- Edit Form -->
  <form id="AddressForm">

<div class="row">
<div class="col-md-12 mt-2 mb-2 text-uppercase">
<?php


  foreach($addresses as $address)
  {
    echo $address['houseNo'].", ".$address['recidenceName'].", ".$address['streetName'].", ".$address['areaName'].", ".$address['city'].", ".$address['state'].", ".$address['country']." - ".$address['zipCode']."<hr>";
  }
?>

</div>
</div>
   
<!-- Collapse buttons -->
<div class="d-flex justify-content-end">
  <a class="btn btn-primary " data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Add Address
  </a>
</div>
<!-- / Collapse buttons -->

<!-- Collapsible element -->
<div class="collapse" id="collapseExample">
  <div class="mt-3">
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
                    <button class="btn indigo btn-block my-4" id="SaveProfile" type="submit">Save</button>
                  </div>  
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>
</div>


<?php
include "common/footer.php";

?>
<script>
// console.log("Frome Script ")
// //alert("from Script")

$(document).ready(function() {
  // //alert("Page Ready");
    $('#ProfileForm').submit(function(e) {
      //alert("Form On Submit")
      console.log("ggierthiurugtgu");
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'validation/profile.php',
            data: $(this).serialize(),         
            beforeSend:function()
            {
              $('#loader').show();
            },
            success: function(response)
            {
                alert(response);
                console.log(response);
                $('#loader').hide()
                var jsonResponse = JSON.parse(response);

                // //alert(jsonResponse.validation);
                if(jsonResponse.sessionActive == true)
                {
                  //
                  if(jsonResponse.validation==false)
                  {
                    //valiodation messages
                    if(jsonResponse.FirstnameErrorInvalid)
                    {
                        $('#loader').hide()
                        $('#profileMessage').html('');
                        $('#firstNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.FirstnameErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else if(jsonResponse.FirstnameErrorRequired)
                    {
                        $('#loader').hide()
                        $('#profileMessage').html('');
                        $('#firstNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.FirstnameErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else
                    {
                        $('#loader').hide()
                        $('#profileMessage').html('');                        
                        $('#firstNameMessage').html('');
                    }

                    if(jsonResponse.LastnameErrorInvalid)
                    {
                        $('#loader').hide()
                        $('#profileMessage').html('');
                        $('#lastNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.LastnameErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else if(jsonResponse.LastnameErrorRequired)
                    {
                        $('#loader').hide()
                        $('#profileMessage').html('');
                        $('#lastNameMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.LastnameErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else{
                        $('#loader').hide()
                        $('#profileMessage').html('');
                        $('#lastNameMessage').html('');
                    }
                    if(jsonResponse.AlternativeEmailErrorInvalid)
                    {
                        $('#loader').hide()
                        $('#profileMessage').html('');
                        $('#alternativeEmailMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.AlternativeEmailErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else{
                        $('#loader').hide()
                        $('#profileMessage').html('');
                        $('#alternativeEmailMessage').html('');
                    }
                    if(jsonResponse.MobileNoErrorInvalid)
                    {
                        $('#loader').hide()
                        $('#profileMessage').html('');
                        $('#mobileNoMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.MobileNoErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else{
                        $('#loader').hide()
                        $('#profileMessage').html('');
                        $('#mobileNoMessage').html('');
                    }
                    if(jsonResponse.AlternativeMobileNoErrorInvalid)
                    {
                        $('#loader').hide()
                        $('#profileMessage').html('');
                        $('#alternativeMobileNoMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.AlternativeMobileNoErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else{
                        $('#loader').hide()
                        $('#profileMessage').html('');
                        $('#alternativeMobileNoMessage').html('');
                    }
                    if(jsonResponse.GenderErrorInvalid)
                    {
                        $('#loader').hide()
                        $('#profileMessage').html('');
                        $('#genderMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.GenderErrorInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else{
                        $('#loader').hide()
                        $('#profileMessage').html('');
                        $('#genderMessage').html('');
                    }
                    if(jsonResponse.DOBInvalid)
                    {
                        $('#loader').hide()
                        $('#profileMessage').html('');
                        $('#dobMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.DOBInvalid+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    else{
                        $('#loader').hide()
                        $('#profileMessage').html('');
                        $('#dobMessage').html('');
                    }

                  }
                  else
                  {
                    //success
                    if(jsonResponse.success==true)
                    {
                        //success
                        if(jsonResponse.success1==true)
                        {                            
                            // $('#loader').hide()
                            $('#loader').show()
                            $('#genderMessage').html('');
                            $('#dobMessage').html('');
                            $('#alternativeMobileNoMessage').html('');
                            $('#mobileNoMessage').html('');
                            $('#alternativeEmailnMessage').html('');
                            $('#lastNameMessage').html('');
                            $('#firstNameMessage').html('');
                            $('#profileMessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+"Profile Updated Successfully"+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                            // location.reload();
                            // setTimeout(function() {location.reload();},100);
                            // $('#passwordValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.PasswordErrorRequired+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                        }
                        else{
                            $('#loader').hide()
                            $('#genderMessage').html('');
                            $('#dobMessage').html('');
                            $('#alternativeMobileNoMessage').html('');
                            $('#mobileNoMessage').html('');
                            $('#alternativeEmailnMessage').html('');
                            $('#lastNameMessage').html('');
                            $('#firstNameMessage').html('');
                            $('#profileMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+"Error Updating Profile: Database Error."+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                            
                        } 
                    }
                    else{
                        $('#loader').hide()
                        $('#genderMessage').html('');
                        $('#dobMessage').html('');
                        $('#alternativeMobileNoMessage').html('');
                        $('#mobileNoMessage').html('')
                        $('#alternativeEmailnMessage').html('');
                        $('#lastNameMessage').html('');
                        $('#firstNameMessage').html('');                
                        $('#profileMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+"Error Updating Profile: Database Error."+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                    }
                    
                  }
                }
                else
                {
                  //invalid session load login page
                  $('#loader').hide()
                  $('#genderMessage').html('');
                  $('#dobMessage').html('');
                  $('#alternativeMobileNoMessage').html('');
                  $('#mobileNoMessage').html('')
                  $('#alternativeEmailnMessage').html('');
                  $('#lastNameMessage').html('');
                  $('#firstNameMessage').html('');                    
                  $('#profileMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.Message+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                }
                $('#loader').hide()
           },
           error: function(response){
                $('#genderMessage').html('');
                $('#dobMessage').html('');
                $('#alternativeMobileNoMessage').html('');
                $('#mobileNoMessage').html('')
                $('#alternativeEmailnMessage').html('');
                $('#lastNameMessage').html('');
                $('#firstNameMessage').html('');  
                $('#profileMessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert">OOPs..! Something Went Wrong <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');                        
            }
       });
     });
     //address
     // //alert("Page Ready");
    $('#AddressForm').submit(function(e) {
      //alert("Form On Submit")
      console.log("Add");
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

});

</script>