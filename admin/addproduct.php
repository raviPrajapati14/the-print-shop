<?php
//include "header.php";
include 'templates/header.php';
include 'templates/navigation.php';
include 'common/database.php';

// if (!isset($_SESSION["admin"])) {
//     header("location:login.php");
// }
/*
session_start();

if ($_SESSION["admin"] == "") {
?>
<script type="text/javascript">
window.location = "admin_login.php";
</script>
<?php
}
*/
?>

<div class="main-container container-fluid row p-0 d-flex">

    <div class="row">
        <div class="col-12">
            <div class="container-fluid" style="width:700px;">
                <div class="p-2 text-info text-center">
                    <h3> <i class="fa fa-plus" aria-hidden="true"></i> Add Product</h3>
                </div>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="h6"> Product Name</label>
                        <input type="text" name="productname" class="form-control" placeholder="Enter Product Name">
                    </div>
                    <div class="form-group">
                        <label class="h6">Product Description</label>
                        <textarea name="productdesc" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="h6">Product SKU NAME</label>
                        <input type="text" name="productsku" class="form-control" placeholder="Enter SKU Name">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="h6">Product Price</label>
                                <input type="text" name="productprice" class="form-control"
                                    placeholder="Enter Product Offer Price">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="h6">Product Discount Price</label>
                                <input type="text" name="productdiscountprice" class="form-control"
                                    placeholder="Enter Product ActualPrice">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="h6">Product Quantity</label>
                                <input type="text" name="productqty" class="form-control"
                                    placeholder="Enter Product Quantity">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="h6">Product Minimum Quantity</label>
                                <input type="text" name="productminimumqty" class="form-control"
                                    placeholder="Enter Enter Product Minimum Quantity">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="h6">Product Category</label><br>
                                <select name="productcategory" id="" class="">
                                    <option selected disabled>-select Category-</option>
                                    <?php
                                        $category = mysqli_query($link, "select * from category");
                                        while ($row = mysqli_fetch_array($category)) {
                                        ?>
                                    <option value="<?php echo $row['categoryId'] ?>">
                                        <?php echo $row['name'] ?></option>
                                    <?php
                        }
                        ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                        <div class="form-group">
                                <label class="h6">Product Tax</label><br>
                                <select name="producttax" id="" class=" ">
                                    <option selected disabled>-select Tax-</option>
                                    <?php
                        $category = mysqli_query($link, "select * from tax");
                        while ($row = mysqli_fetch_array($category)) {
                        ?>
                                    <option value="<?php echo $row['taxId'] ?>">
                                        <?php echo $row['taxName'] ?></option>
                                    <?php
                        }
                        ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="h6">Product image</label>
                        <input type="file" name="productimage" class="custom-file">
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit1" class="btn btn-success" value="AddProduct"> Add Product
                        </button>
                    </div>
                </form>

                <?php
            
            $v3 = uniqid();
            if (isset($_POST["submit1"])) {

                $getImageName = $_FILES["productimage"]["name"];
                $imgdst = "./upload/" . $v3 . $getImageName;
                $dst1 = "upload/" . $v3 . $getImageName;
                move_uploaded_file($_FILES["productimage"]["tmp_name"], $imgdst);

                if (mysqli_query($link, "insert into product values('','$_POST[productname]','$_POST[productdesc]','$_POST[productsku]',
                    '$_POST[productprice]','$_POST[productdiscountprice]','$_POST[productqty]','$_POST[productminimumqty]','$_POST[productcategory]','$_POST[producttax]','".date('Y-m-d')."','".date('Y-m-d')."')")) {
                    
                        $productid = mysqli_insert_id($link);
                }
                if (mysqli_query($link, "insert into productimage values('','$productid','$dst1','".date('Y-m-d')."','".date('Y-m-d')."')")) {
                    echo "<script>alert('Product Added Successfully')</script>";
                }
            }

            ?>

            </div>
        </div>
    </div>
</div>

<?php 

include 'templates/navigation_end.php';
include 'templates/footer.php';

?>