<?php

include "common/header.php";
include "common/navigation.php";



?>

<div class=" row mt-5 mb-5 d-flex justify-content-center ">
    <div class="col-xl-6 col-lg-6 col-md-8  mt-5"  >
        
    <div class="card ">
   
    <!-- Default form register -->
<form class="text-center p-5" action="#!" id="SignUpForm" >

<p class="h4 mb-1 ">Sign up</p>
<span id="signUpValidationMessage"></span>
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

<!-- Sign up button -->
<button class="btn  deep-orange  my-4 btn-block" type="submit">Sign up</button>


<p>Already member?
        <a href="login.php">Login</a>
    </p>


</form>
</div>

</div>
</div>
<!-- Default form register -->
<?php
include "common/footer.php";

?>
<script>
$(document).ready(function() {
    $('#SignUpForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'validation/registration.php',
            data: $(this).serialize(),
            beforeSend:function()
            {
              $('#loader').show();
            },
            success: function(response)
            {
                // alert(response);
                var jsonResponse = JSON.parse(response);

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
                            $('#signUpValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.Message+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                        }
                        else
                        {
                            $('#emailValidationMessage').html('');
                            $('#passwordValidationMessage').html('');
                            $('#lastNameValidationMessage').html('');
                            $('#firstNameValidationMessage').html('');
                            $('#signUpValidationMessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert">'+jsonResponse.Message+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
                            setTimeout(function() {$('#loader').hide();window.location.href = "login.php";}, 2000);
                        }
                    }
                    else{
                        $('#loader').hide()
                        $('#emailValidationMessage').html('');
                        $('#passwordValidationMessage').html('');
                        $('#lastNameValidationMessage').html('');
                        $('#firstNameValidationMessage').html('');
                        $('#signUpValidationMessage').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">'+jsonResponse.Message+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>  </button></div>');
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