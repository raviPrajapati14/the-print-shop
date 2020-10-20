<?php

include "common/header.php";
include "common/navigation.php";



?>

<div class="container my-5 pt-5">
    <!-- Section -->
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
    <!-- Section -->

</div>

<!-- Copyright -->

<!-- Copyright -->


<?php
include "common/footer.php";

?>



