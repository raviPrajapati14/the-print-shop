<?php
    // echo "navigation.php";

?>

<nav class="navbar fixed-top navbar-expand-sm navbar-light" style="display:; background-color: #FFDCBB; color:#662900;">

    <!-- <div class="container "> -->
  
    <a class="navbar-brand py-0" href="index.php"> <img src="images/logo-1.png" alt="" height="auto" width="200px">
        </a>
  
      <!-- Collapse button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="basicExampleNav">
  
        <!-- Links -->
        <ul class="navbar-nav ml-auto text-uppercase">
          <li class="nav-item active">
            <a class="nav-link " href="index.php">Home</a>
          </li>
          <ul class="navbar-nav  text-uppercase">
          <li class="nav-item ">
            <a class="nav-link " href="products.php">products</a>
          </li>
</li>

<li class="nav-item">
            <a class="nav-link" href="./designs.php">Gallary</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./services.php">Services</a>
          </li>

<?php
  if(!$activeSession == true)
  {

?>
          <li class="nav-item">
          <a class=" nav-link " href="./login.php">Login</a>
          </li>
          <li class="nav-item">
        <a class=" nav-link " href="./registration.php">Register</a>
          </li>

<?php 
  }
  else
  {  
?>
        <li class="nav-item">
        <a class=" nav-link " href="./cart.php">Cart</a>
        </li>
        <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php
                               // echo $fn." ".$ln;
                                ?>
                            </span>
                            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/30x30">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="myorders.php">
                                 My Orders
                            </a>
                            <a class="dropdown-item" href="myprofile.php">
                                My Profile
                            </a>
                           
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                            </a>
                        </div>
                    </li>

<?php
  }
?>

        </ul>
       
   
      </div>



      <!-- Collapsible content -->
  
    <!-- </div> -->
  
  </nav>
  <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSm">
  Launch demo modal
</button> -->

<!-- Central Modal Small -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-md" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Reday to Leave?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Are you sure you want to Logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm " data-dismiss="modal">Close</button>
        <a href="logout.php" class="btn btn-primary btn-sm ">logout</a>
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->
