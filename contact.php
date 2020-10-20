<?php

include "common/database.php";
include "common/header.php";
include "common/navigation.php";

?>
<div class="container mt-5 pt-2">

</div>
<div class="container my-5 py-5  z-depth-1 ">


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