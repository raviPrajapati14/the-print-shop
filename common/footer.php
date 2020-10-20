<?php
    // echo "footer.php";
        
?>
    <footer>


<!-- Footer -->
<footer class="text-white" style="background-color: #FFDCBB">

  <div style="background-color: #662900;">
    <div class="container text-white">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0">Get connected with us on social networks!</h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center  text-md-right">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter white-text mr-4"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g white-text mr-4"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram white-text"> </i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>
</div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5" style="color:#662900;">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Company Details</h6>
        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p class="text-dark">ND printing Press <br>
            Dehgam, Dist. Gandhinagar, 
            Gujarat Pin - 382305</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Useful links</h6>
        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <!-- <p>
          <a href="#!"  >Your Account </a>
        </p>
        <p>
          <a href="#!">Become an Affiliate </a>
        </p>
        <p>
          <a href="#!"> Shipping Rates </a>
        </p>
        <p>
          <a href="#!"> Help </a>
        </p> -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-5 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p class="text-dark">
          <i class="fas fa-home mr-3 "></i> Dehgam, Dist. Gandhinagar,</p>
        <p class="text-dark">
          <i class="fas fa-envelope mr-3"></i> ndpp@gmail.com</p>
          <p class="text-dark">
          <i class="fas fa-phone mr-3"></i> xx xx xx xx xx</p>
          <p class="text-dark">
          <i class="fas fa-phone mr-3"></i> xx xx xx xx xx </p>
        

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" style="background-color: #662900;" >© 2020 Copyright: New Dieshwari Printing Press

  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
        </footer>
<!-- Main navigation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js" integrity="sha256-+Q/z/qVOexByW1Wpv81lTLvntnZQVYppIL1lBdhtIq0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/fontawesome.min.js"></script>
<script src="./assets/MDB-Pro_4.7.5/js/jquery-3.3.1.min.js"></script> 
<script src="./assets/MDB-Pro_4.7.5/js/bootstrap.min.js"></script> 

<script src="./assets/MDB-Pro_4.7.5/js/mdb.min.js"></script> 
<script src="./assets/MDB-Pro_4.7.5/js/addons/datatables.min.js"></script> 

<script src="./assets/MDB-Pro_4.7.5/js/addons/datatables-select.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
<script >
$('.carousel').carousel({
interval: 2000
})
$(window).scroll(function(){
$('nav').toggleClass('scrolled', $(this).scrollTop() > 100);
});
$(function () {
var selectedClass = "";
$(".filter").click(function () {
selectedClass = $(this).attr("data-rel");
// $("#gallery").fadeTo(100, 0.1);
$("#gallery div").not("." + selectedClass).removeClass('animation');
setTimeout(function () {
  $("." + selectedClass).addClass('animation');
//   $("#gallery").fadeTo(300, 1);
}, 300);
});
});
</script>
</body>


</html>