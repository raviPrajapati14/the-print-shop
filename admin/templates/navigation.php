

<?php
// print_r($_SESSION);

?>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav navbar-dark black sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">
            <?php
                    echo "Welcome Admin";
                
            ?>
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
        <?php 
            // if($role==0)
            // {
                
            ?>
            
            <!-- <a class="nav-link" href="admin_dashboard"> -->
                
                <?php
            // }
            // elseif($role==1)
            // {
                ?>
            <!-- <a class="nav-link" href="index"> -->
       <?php
            // }
            // elseif($role==2)
            // {
                     ?>
                          <a class="nav-link" href="index.php">
       <?php
            // }
            ?> <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        
 <!-- Nav Item - Charts -->
 <?php
//   if($role==0) {
     ?>
<li class="nav-item">
           <a class="nav-link" href="./manage_products.php">
           <i class="fas fa-building"></i>
               <span>Manage Products</span></a>
       </li>
        <li class="nav-item">
           <a class="nav-link" href="manage_category.php">
           <i class="fas fa-user-graduate "></i>
               <span>Manage Category</span></a>
       </li>
       
      
       <li class="nav-item">
        <a class="nav-link " href="managecustomer.php" >
        <i class="fas fa-donate"></i>
          <span>Manage Customers</span>
        </a>

        <li class="nav-item">
        <a class="nav-link " href="manage_taxes.php" >
        <i class="fas fa-donate"></i>
          <span>Manage Taxes</span>
        </a>

        <li class="nav-item">
        <a class="nav-link " href="manage_cart.php" >
        <i class="fas fa-donate"></i>
          <span>Manage Cart</span>
        </a>

        <li class="nav-item">
        <a class="nav-link " href="manage_order.php" >
        <i class="fas fa-donate"></i>
          <span>Manage Orders</span>
        </a>

        <li class="nav-item">
        <a class="nav-link " href="manage_orderProduct.php" >
        <i class="fas fa-donate"></i>
          <span>Manage Order Product</span>
        </a>

        <li class="nav-item">
        <a class="nav-link " href="manage_payment.php" >
        <i class="fas fa-donate"></i>
          <span>Manage payment</span>
        </a>


        <li class="nav-item">
        <a class="nav-link " href="contactus.php" >
        <i class="fas fa-donate"></i>
          <span>Manage Contacts</span>
        </a>
        <!-- <div id="collapsedon" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Donors</h6>
            <a class="collapse-item" href="pending_donors">Pending </a>
            <a class="collapse-item" href="approved_donors">Approved</a>
            <a class="collapse-item" href="rejected_donors">Rejected</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
           <a class="nav-link" href="donation_record">
           <i class="fas fa-donate"></i>

               <span>Donation Record</span></a>
       </li>
       
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsereq" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-graduation-cap"></i>
          <span>Manage Scholarship Requests</span>
        </a>
        <div id="collapsereq" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Scholarship Requests</h6>
            <a class="collapse-item" href="pending_requests">Pending </a>
            <a class="collapse-item" href="approved_requests">Approved</a>
            <a class="collapse-item" href="rejected_requests">Rejected</a>
          </div>
        </div>
      </li> -->
       <!-- Nav Item - Pages Collapse Menu -->

     <?php
//  }
//  elseif($role==1)
// {
 ?>
  
<?php
// }
// elseif($role==2)
// {
?>
<!-- 
       <li class="nav-item">
           <a class="nav-link" href="scholarship_status">
           <i class="fas fa-graduation-cap"></i>
               <span>Scholarship Status</span></a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="scholarship_request">
           <i class="fas fa-graduation-cap"></i>
               <span>Scholarship Request</span></a>
       </li> -->

    <?php
// }
?>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar  static-top shadow">

            
            <div class="sidebar-brand-text rounded">
                <img src="images/logo-1.png" class="p-3" alt="" height="auto" width="200px">
            </div>
            

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

                <!-- Topbar Search -->
                <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
                        </div>
                    </div>
                </form> -->

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php
                               // echo $fn." ".$ln;
                                ?>
                            </span>
                            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?php //echo $profile; ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                            </a>
                            <a class="dropdown-item" href="change_password">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Change Password
                            </a>
                           
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
         
            <!-- End of Topbar -->
