<?php

include "common/header.php";
include "common/navigation.php";



?>

<div class="d-flex align-items-center my-5 py-5 unique-color">
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
              <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                <h5 class="mb-0 font-weight-bold">Edit Account</h5>
                <span id="profileMessage"></span>
              </div>
              <div class="card-body card-body-cascade text-center">
                <form class="ProfileFrm" id="ProfileForm">
                  <div class="row">                    
                    <div class="col-md-6">
                      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="firstname" placeholder="First Name">
                      <span id="firstNameMessage"></span>
                    </div>
                    <div class="col-md-6">            
                      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="lastname" placeholder="Last Name">
                      <span id="lastNameMessage"></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <input type="number" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="mobileno" placeholder="Mobile No">
                      <span id="mobileNoMessage"></span>    
                    </div>
                    <div class="col-md-6">
                      <input type="email" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="mobileno" placeholder="Alternative Email">
                      <span id="alternativeEmailMessage"></span>
                    </div>
                  </div>
                  <div class="row mt-4 mb-1 ">
                    <div class="col-md-4">
                      Gender:   
                    </div>
                    <div class="col-md-4 ">
                      <div class="form-check">
                        <input type="radio" class="form-check-input" id="materialUnchecked" value="0" name="gender">
                        <label class="form-check-label" for="materialUnchecked">Male</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-check">
                        <input type="radio" class="form-check-input" id="materialChecked" value="1" name="gender" >
                        <label class="form-check-label" for="materialChecked">Female</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <input type="number" id="birthday" name="alternativemobileno" placeholder="Alternative Mobile No" class="form-control mt-4 mb-1">
                      <span id="alternativeMobileNoMessage"></span>
                    </div>
                    <div class="col">
                      <input type="date" id="birthday" name="dob" value="Date of Birth" class="form-control mt-4 mb-1">
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
<div class="view view-cascade gradient-card-header mdb-color lighten-3">
  <h5 class="mb-0 font-weight-bold"> Saved Address</h5>
  <span id="addressMessage"></span>
</div>
<!-- Card image -->

<!-- Card content -->
<div class="card-body card-body-cascade text-center">

  <!-- Edit Form -->
  <form>

<div class="row">
<div class="col-md-12 mt-2 mb-2 text-uppercase">
c/74, Maruti Park Society, Near Nikol Road, Naroda, Ahmedabad, Gujarat, India - 382330.
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
        
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="city" value="Ahmedabad" disabled="" placeholder="City">
    <span id="cityMessage"></span>
      </div>

    </div>

    <div class="row">
      <!-- First column -->
      <div class="col-md-6">
       
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="state" value="Gujarat" placeholder="State" disabled="">
    <span id="stateMessage"></span>

      </div>

      <!-- Second column -->
      <div class="col-md-6">
        
      <input type="text" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" value="India" name="country" placeholder="Country" disabled="">
    <span id="countryMessage"></span>

      </div>

    </div>
                      <div class="row">
                        <div class="col-md-6">
                          <input type="number" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="pincode" placeholder="Pin Code">
                          <span id="pincodeMessage"></span>
                        </div>
                        <div class="col-md-6 my-4">
                          <span class="waves-input-wrapper waves-effect waves-light">
                            <input type="submit" value="Save" class="btn btn-info ">
                          </span>
                        </div>  
                      </div>
                    </div>
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
console.log("Frome Script ")
alert("from Script")

$(document).ready(function() {
  alert("Page Ready");
    $('#SaveProfile').click(function(e) {
      alert("Form On Submit")
      console.log("ggierthiurugtgu");
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'validation/demo.php',
            data: $(this).serialize(),         
            beforeSend:function()
            {
              $('#loader').show();
            },
            success: function(response)
            {
                alert(response);
                // var jsonResponse = JSON.parse(response);

                // alert(jsonResponse.validation);
                
                if(jsonResponse.validation == false)
                {
                    
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
                }
                else
                {
                    if(jsonResponse.validUser == true)
                    {   
                        $('#emailValidationMessage').html('');
                        $('#passwordValidationMessage').html('');
                        $('#signInValidationMessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+jsonResponse.Message+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');                        
                        setTimeout(function() {$('#loader').hide();window.location.href = "index.php";}, 2000);
                    }
                    else{
                        $('#loader').hide()
                        $('#emailValidationMessage').html('');
                        $('#passwordValidationMessage').html('');
                        $('#signInValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.Message+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                        

                    }

                
                }
           },
           error: function(response){
                $('#signInValidationMessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert">OOPs..! Something Went Wrong <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');                        
            }
       });
     });
});

</script>