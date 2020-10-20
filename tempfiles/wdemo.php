<?php

include "common/header.php";
include "common/database.php";  
// $link = mysqli_connect("localhost","root","") or die(mysqli_error($link));

// mysqli_select_db($link,"ndpp") or die(mysqli_error($link));

$res = mysqli_query($link, "select * from product");

$Products=array();
$index=0;
while($row=mysqli_fetch_assoc($res)) {  
  // customere data
    $ProductId=$row['productId'];
    $categoryid=$row['categoryId'];
    $Products[$index]=$row;

    // print_r($row);


    $getCategory=mysqli_query($link, "select * from category where categoryId=$categoryid");

    // if true
    if(mysqli_num_rows($getCategory)==1)
    {
        $rowq=mysqli_fetch_assoc($getCategory);
        $Products[$index]['categoryName']=$rowq['name'];
    }

    $getImage=mysqli_query($link, "select * from productimage where productId=$ProductId");

    // if true
    if(mysqli_num_rows($getImage)==1)
    {
        
            $rowq12=mysqli_fetch_assoc($getImage);
            $Products[$index]['imageLocation']="admin/".$rowq12['imageLocation'];
        
        
    }

    $index++;
  }
  // print_r($Products);




include "common/navigation.php";



?>


      <div class="d-flex align-items-center my-5 py-5 unique-color">
        <div class="container  text-center ">
          <h3 class="text-white">Products</h3>
        </div>
      </div>

<div class="container">

      <!--Section: Block Content-->
      <section class="mt-5 mb-4">
<?php 
$count=0;
echo '<div class="row mb-4">';
  foreach($Products as $Product)
  {
    // $flag=false;
    if($count%3==0)
    {
      // $flag=true;
      echo "</div>";
      echo '<div class="row mb-4">';
    }

 
?>
      <div class="col-md-4">

<!--Card-->
<div class="card card-cascade narrower card-ecommerce">

  <!--Card image-->
  <div class="view view-cascade zoom overlay">
    <img src="<?php  echo $Product['imageLocation'];  ?>" class="img-fluid" height="400px"
      alt="">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>
  <!--Card image-->

  <!--Card content-->
  <div class="card-body card-body-cascade text-center no-padding">
    <!--Category & Title-->
    <a href="" class="text-muted">
      <h5><?php echo $Product['categoryName']; ?></h5>
    </a>
    <h4 class="card-title">
      <strong>
        <a href=""><?php echo $Product['productName']; ?></a>
      </strong>
    </h4>

    <!--Description-->
    <p class="card-text">
      <?php echo $Product['description']; ?>
    </p>

    <!--Card footer-->
    <div class="card-footer">
      <span class="float-left">
        <?php echo $Product['price']; ?>₹
      </span>
      <span class="float-right">
       
        <!-- Button trigger modal -->
<a class="h4 p-2" href="productpage.php?AfjkshfrjkoewrsfghekghreoiyoERoiwrtucwaercrthKJTPYKYPJKIEOE394304e12cwwfgcwro12344982509lkcfopfgrejkgpom4908kc33j9m04t98j3t9873juerFkcog=<?php echo $Product['sku'];  ?>"  data-toggle="tooltip" data-placement="top" title="Quick View" >
<i class="fas fa-eye "></i>
</a>
<!-- Central Modal Small -->
        <a class="h4 p-2" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
          <i class="fas fa-heart"></i>
        </a>
      </span>
    </div>

  </div>
  <!--Card content-->

</div>
<!--Card-->

</div>
<?php

if($count%3==0)
{
  // echo "</div>";
}
$count++;
  }
?>

      </section>
      <!--Section: Block Content-->


    </div>

    <?php
include "common/footer.php";
?>

    <script>
    
    $(document).ready(function() {

$('#loader').hide();

    });
    </script>
