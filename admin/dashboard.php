<?php
// include 'sess_check.php';


include 'templates/sess.php';

if(!isset($_SESSION['user']))
{
    header('location:index.php');
}

include 'templates/header.php';
include 'templates/navigation.php';
include 'common/database.php';

?>

<div class="container-fluid mt-5">


<!-- Content Row -->
                <div class="row"> <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Customers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                                 <?php 
                                    $qry2 = "select * from customer";
                                    $result2 = mysqli_query($link, $qry2);
                                    echo $result2->num_rows;
                                ?>  
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-user-circle fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
      
                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Products</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $qry2 = "select * from product";
                                $result2 = mysqli_query($link, $qry2);
                                echo $result2->num_rows;
                                ?>
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Order</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $qry2 = "select * from orders";
                                $result2 = mysqli_query($link, $qry2);
                                echo $result2->num_rows;
                                ?>
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Cart Details</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $qry2 = "select * from usercart";
                                $result2 = mysqli_query($link, $qry2);
                                echo $result2->num_rows;
                                ?>
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
      
                  
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Order Income</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    $qry2 = "select * from orders";
                                    $result2 = mysqli_query($link, $qry2);
                                    // print_r( $result2);
                                    $totalAmount=0;
                                    if(mysqli_num_rows($result2))
                                    {
                                        while($row=mysqli_fetch_assoc($result2))
                                        {
                                            $totalAmount+=$row['orderTotalPrice'];
                                        }

                                    }
                                echo $totalAmount." /- ";
                                
                                ?>
                            </div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                            <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Order Tax</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    $qry2 = "select * from orders";
                                    $result2 = mysqli_query($link, $qry2);
                                    // print_r( $result2);
                                    $totalAmount=0;
                                    if(mysqli_num_rows($result2))
                                    {
                                        while($row=mysqli_fetch_assoc($result2))
                                        {
                                            $totalAmount+=$row['orderTotalTax'];
                                        }

                                    }
                                echo $totalAmount." /- ";
                                
                                ?>
                            </div>
                          </div>
                          <div class="col-auto">
                          <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Category</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $qry2 = "select * from category";
                                $result2 = mysqli_query($link, $qry2);
                                echo $result2->num_rows;
                                ?>
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Contact Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $qry2 = "select * from contactus";
                                $result2 = mysqli_query($link, $qry2);
                                echo $result2->num_rows;
                                ?>
                            </div>
                          </div>
                          <div class="col-auto">
                              <i class="fa fa-user fa-2x text-gray-300" aria-hidden="true"></i>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                </div>
      
                <!-- Content Row -->

                </div>



<?php
include 'templates/navigation_end.php';
include 'templates/footer.php';
?>