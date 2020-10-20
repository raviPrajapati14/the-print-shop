<?php


include "common/header.php";
if(isset($_SESSION['customer']))
{
    header('location:index.php');
}

include "common/navigation.php";



?>
<div class=" row mt-5 mb-5 d-flex justify-content-center ">
    <div class="col-xl-6 col-lg-6 col-md-8  mt-5"  >
        
    <div class="card ">
   
    
<!-- Default form login -->
<form class="text-center  p-5" id="SignInForm" action="">

    <p class="h4 mb-1">Sign in</p>
    <span id="signInValidationMessage"></span>

    <!-- Email -->
    <input type="email" id="defaultLoginFormEmail" class="form-control mt-4 mb-1" name="username" placeholder="E-mail">
    <span id="emailValidationMessage"></span>

    <!-- Password -->
    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="defaultLoginFormPassword" class="form-control mt-4 mb-1" name="password" placeholder="Password"  >
    <span id="passwordValidationMessage"></span>
    
    <div class="d-flex justify-content-around mt-4" >
        <!-- <div> -->
            <!-- Remember me -->
            <!-- <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div> -->
        <!-- </div> -->
        <div>
            <!-- Forgot password -->
            <a href="forgotpassword.php">Forgot password?</a>
        </div>
    </div>

    <!-- Sign in button -->
    <button class="btn indigo btn-block my-4" id="SignIn" type="submit">Sign in</button>

    <!-- Register -->
    <p>Not a member?
        <a href="registration.php">Register</a>
    </p>

    <!-- Social login -->
    <!-- <p>or sign in with:</p>

    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f indigo-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-twitter indigo-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in indigo-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-github indigo-text"></i></a>
     -->


</form>

</div>

</div>
</div>
<!-- Default form login -->

<?php
include "common/footer.php";

?>
<script>

$(document).ready(function() {
    $('#SignInForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'validation/login.php',
            data: $(this).serialize(),         
            beforeSend:function()
            {
              $('#loader').show();
            },
            success: function(response)
            {
                //alert(response);
                var jsonResponse = JSON.parse(response);

                // //alert(jsonResponse.validation);
                
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
                        setTimeout(function() {$('#loader').hide();
                            // window.history.back();
                            window.location=document.referrer;
                            // location.reload(); 
                        }, 2000);
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