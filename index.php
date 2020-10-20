<?php

include "common/header.php";
include "common/navigation.php";


?>

<main>
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 h-100" src="images/001.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-100" src="images/002.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-100" src="images/003.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- /carosoul -->
    <!-- <div class="bg-primary "> -->

    <!-- </div> -->


</main> 
</div>
<div class="container my-5 py-5 ">
<section class="">

  <!-- Section heading -->
  <h3 class="text-center font-weight-bold text-info">About Us</h3>
  <hr style="width:200px;">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <img src="images/img.jpg" alt="About Us" class="img-fluid aboutimg"> </img>
        </div>
        <div class="col-md-7">
            <h2 class="text-info">New Dipeshwari Printing Press</h2>
            <p class="py-1">The print shop (E-commerce website for printing shop) provides online printing services 
            for wedding card, invitation card, billBook, letterhead, pamphlet, banner and so on and managing the orders received from customers. This is the one stop solution for all types of printing related services.</p>
            <p class="py-1">In this system customer can view products and product details and then if he/she likes any product then he/she proceed to purchase products. In this system customer has option to give order
             with printing or without printing.</p>
        </div>
    </div>
</div>
</section>
</div>

<div class="container my-5 py-5">
<section class="">
        <h3 class="text-center font-weight-bold text-info ">Our Services</h3>
        <hr style="width:200px;">

        <div class="row">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card shadow">
                    <div class="view overlay zoom">
                        <img class="card-img-top" style="height:300px" src="images/printing.jpg" class="img-fluid"
                            alt="Card-image">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Printing</h4>
                            <p class="card-text">All Types of Printing</p>

                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#printingModelID">
                                Details
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="printingModelID" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title text-primary">Printing Serivice</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="text-warning"> Printing Categories </h4>
                                            <ul class="text-secondary">
                                                <li>Offset Printing</li>
                                                <li>Screen Printing</li>
                                                <li>Multicolor Printing</li>
                                                <li>Emboss Printing</li>
                                                <li>UV Printing</li>
                                                <li>Etc.</li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card shadow">
                    <div class="view overlay zoom">
                        <img class="card-img-top" style="height:300px" src="images/design.png" class="img-fluid"
                            alt="Card-image">
                        </div> 
                        <div class="card-body">
                            <h4 class="card-title">Designing</h4>
                            <p class="card-text">All Types of Graphics Design</p>

                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#DesignModelID">
                                Details
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="DesignModelID" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title text-primary">Design Serivice</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="text-warning"> Graphics Designing </h4>
                                            <ul class="text-secondary">
                                                <li>Website Design</li>
                                                <li>Advertisement Design</li>
                                                <li>Banner Design</li>
                                                <li>Logo Design</li>
                                                <li>Wedding Card Design</li>
                                                <li>Business Card Design</li>
                                                <li>Wrapper Design</li>
                                                <li>Paper Bag Design</li>
                                                <li>3D Layout Design</li>
                                                <li>Packaging Design</li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card shadow">
                    <div class="view overlay zoom">
                        <img class="card-img-top" style="height:300px" src="images/brand.png" class="img-fluid"
                            alt="Card-image">
                            </div>
                        <div class="card-body">
                            <h4 class="card-title">Branding</h4>
                            <p class="card-text">All Types of Branding</p>

                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#BrandModelID">
                                Details
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="BrandModelID" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title text-primary">Branding Service</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="text-warning"> Branding </h4>
                                            <ul class="text-secondary">
                                                <li>Design Brand</li>
                                                <li>Logo Brand</li>
                                                <li>Brand Design</li>
                                                <li>Brand printing</li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
</div>

<div class="container my-5 py-5">
<section class="">

        <!-- Section heading -->
        <h3 class="text-center font-weight-bold text-info">Gallary</h3>
            <hr style="width:200px;">

        <div class="row justify-content-center">

            <!--Grid column-->
            <div class="col-md-4 mb-5 mt-3">
                <!--Card-->
                <div class="card shadow">
                    <!--Card image-->
                    <div class="view overlay zoom">
                        <img src="images/g1.png" class="img-fluid p-3" alt="kankotri" style="height:250px; width:100%;">
                        <a>
                            <div class="mask rgba-white-slight waves-effect waves-light"></div>
                        </a>
                    </div>
                    <!--Card content-->
                    <div class="card-body">
                        <!--Title-->
                        <h4 class="card-title text-default"><strong>Kankotri</strong></h4>
                        <hr class="bg-default">
                        <p class="card-text mb-3 ">This is a Wedding Card Design 
                        it is use as weddign invitation card
                        </p>
                    </div>
                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-5 mt-3">
                <!--Card-->
                <div class="card shadow">
                    <!--Card image-->
                    <div class="view overlay zoom">
                        <img src="images/g2.png" class="img-fluid p-3" alt="InvitationCard" style="height:250px; width:100%;">
                        <a>
                            <div class="mask rgba-white-slight waves-effect waves-light"></div>
                        </a>
                    </div>
                    <!--Card content-->
                    <div class="card-body">
                        <!--Title-->
                        <h4 class="card-title text-default"><strong>Invitation Card</strong></h4>
                        <hr class="bg-default">
                        <p class="card-text mb-3 ">This is a Invitation Card Design 
                        it is use as invitation card
                        </p>
                    </div>
                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-5 mt-3">
                <!--Card-->
                <div class="card shadow">
                    <!--Card image-->
                    <div class="view overlay zoom">
                        <img src="images/bcard2.jpg" class="img-fluid p-3" alt="Bussiness Card" style="height:250px; width:100%;">
                        <a>
                            <div class="mask rgba-white-slight waves-effect waves-light"></div>
                        </a>
                    </div>
                    <!--Card content-->
                    <div class="card-body">
                        <!--Title-->
                        <h4 class="card-title text-default"><strong>Bussiness Card</strong></h4>
                        <hr class="bg-default">
                        <p class="card-text mb-3 ">This is a Bussiness Card Design 
                        it is use as Bussiness Card
                        </p>
                    </div>
                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-5 mt-3">
                <!--Card-->
                <div class="card shadow">
                    <!--Card image-->
                    <div class="view overlay zoom">
                        <img src="images/g4.png" class="img-fluid p-3" alt="BillBook" style="height:250px; width:100%;">
                        <a>
                            <div class="mask rgba-white-slight waves-effect waves-light"></div>
                        </a>
                    </div>
                    <!--Card content-->
                    <div class="card-body">
                        <!--Title-->
                        <h4 class="card-title text-default"><strong>Bill Book & Vouchers</strong></h4>
                        <hr class="bg-default">
                        <p class="card-text mb-3 ">This is a Bill Book & Vouchers Design 
                        it is use as Bill Book & Vouchers
                        </p>
                    </div>
                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-5 mt-3">
                <!--Card-->
                <div class="card shadow">
                    <!--Card image-->
                    <div class="view overlay zoom">
                        <img src="images/g5.png" class="img-fluid p-3" alt="Pemphlets" style="height:250px; width:100%;"> 
                        <a>
                            <div class="mask rgba-white-slight waves-effect waves-light"></div>
                        </a>
                    </div>
                    <!--Card content-->
                    <div class="card-body">
                        <!--Title-->
                        <h4 class="card-title text-default"><strong>Pemphlets</strong></h4>
                        <hr class="bg-default">
                        <p class="card-text mb-3 ">This is a Pemphlets Design 
                        it is use as Pemphlets
                        </p>
                    </div>
                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-5 mt-3">
                <!--Card-->
                <div class="card shadow">
                    <!--Card image-->
                    <div class="view overlay zoom">
                        <img src="images/g6.png" class="img-fluid p-3" alt="LetterPad" style="height:250px; width:100%;">
                        <a>
                            <div class="mask rgba-white-slight waves-effect waves-light"></div>
                        </a>
                    </div>
                    <!--Card content-->
                    <div class="card-body">
                        <!--Title-->
                        <h4 class="card-title text-default"><strong>LetterPad</strong></h4>
                        <hr class="bg-default">
                        <p class="card-text mb-3 ">This is a LetterPad Design 
                        it is use as LetterPad and other Bussiness Documents
                        </p>
                    </div>
                </div>
            </div>
            <!--Grid column-->
    </section>
</div>



<div class="container my-5 py-5 z-depth-1">

    <!--Section: Content-->
    <section class=" px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">

        <style>
        .map-container {
            height: 230px;
            position: relative;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }
        </style>

        <!--Grid row-->
        <div class="row d-flex justify-content-center">

            <!--Grid column-->
            <div class="col-md-6 text-center">

            <h3 class="text-center font-weight-bold text-info">Contact Us</h3>
            <hr style="width:200px;">


            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">

                <!-- Material outline input -->
                <form action="" method="POST" class="was-validated p-2" enctype="multipart/form-data">
                    <div class="form-group">
                        <!-- <label>Name</label> -->
                        <input type="text" class="form-control" placeholder="Enter Name" name="txtName" required>
                    </div>
                    <div class="form-group">
                        <!-- <label>Email</label> -->
                        <input type="email" class="form-control" placeholder="Enter Email Id" name="txtEmail" required>
                    </div>
                    <div class="form-group">
                        <!-- <label>Contact No.</label> -->
                        <input type="text" class="form-control" placeholder="Enter Contact No" name="txtContact"
                            required>
                    </div>
                    <div class="form-group">
                        <!-- <label>Message</label> -->
                        <textarea name="message" class="form-control" required></textarea>
                    </div>
                    <input type="file" name="my_file" class="input-group bg-secondary p-2 text-white"><br>
                    <button type="submit" name="submit1" class="btn btn-primary">Submit</button>
                </form>

                <!-- CONTACT US PHP SCRIPT -->
                <?php
                $v3 = uniqid();
                if (isset($_POST["submit1"])) {

                $getImageName = $_FILES["my_file"]["name"];
                $imgdst = "./contact_us_files/" . $v3 . $getImageName;
                $dst1 = "contact_us_files/" . $v3 . $getImageName;
                move_uploaded_file($_FILES["my_file"]["tmp_name"], $imgdst);

                $qry = mysqli_query($link, "insert into contactus values('','$_POST[txtName]','$_POST[txtEmail]','$_POST[txtContact]','$_POST[message]','$dst1','".date('Y-m-d')."')");
                    if($qry>0){
                        echo "<script> alert('Thank you for Contact us. our team contect with you soon.'); </script>";
                    }

                }

?>
                <!-- CONTACT US PHP SCRIPT -->



            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-0 mb-md-0">

                <!--Google map-->
                <div id="map-container-google-1" class="z-depth-1 map-container mb-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4362.177480487684!2d72.80903705399909!3d23.16511158266238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e78b6aaaaaa97%3A0xf33e69e504ef380f!2sNew%20Dipeshwari%20Printing%20Press!5e0!3m2!1sen!2sus!4v1592483293943!5m2!1sen!2sus"
                        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
                    <!-- <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
            style="border:0" allowfullscreen></iframe> -->
                </div>
                <!--Google Maps-->

                <p class="font-weight-bold">New Dipeshwari Printing Press, Dehgam - Ahmedabad</p>

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->


    </section>
    <!--Section: Content-->
  
  
  </div>
<?php
include "common/footer.php";

?>