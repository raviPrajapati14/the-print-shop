<?php

include "common/header.php";
include "common/database.php";

include "common/navigation.php";


?>

<div class="d-flex align-items-center my-5 py-5 unique-color">
         <div class="container  text-center ">
         <h1 class="text-white">Product Details</h1>
        </div>
      </div>
<?php

if(isset($_GET['AfjkshfrjkoewrsfghekghreoiyoERoiwrtucwaercrthKJTPYKYPJKIEOE394304e12cwwfgcwro12344982509lkcfopfgrejkgpom4908kc33j9m04t98j3t9873juerFkcog']))
{

$skuId=$_GET['AfjkshfrjkoewrsfghekghreoiyoERoiwrtucwaercrthKJTPYKYPJKIEOE394304e12cwwfgcwro12344982509lkcfopfgrejkgpom4908kc33j9m04t98j3t9873juerFkcog'];


$res = mysqli_query($link, "select * from product where sku='$skuId'");


if(mysqli_num_rows($res)==1) {  
  // customere data
    $row=mysqli_fetch_assoc($res);
    $ProductId=$row['productId'];
    $categoryid=$row['categoryId'];
    $Products=$row;

    
    $getCategory=mysqli_query($link, "select * from category where categoryId=$categoryid");

    // if true
    if(mysqli_num_rows($getCategory)==1)
    {
        $rowq=mysqli_fetch_assoc($getCategory);
        $Products['categoryName']=$rowq['name'];
    }

    $getImage=mysqli_query($link, "select * from productimage where productId=$ProductId");

    // if true
    if(mysqli_num_rows($getImage)==1)
    {
        
            $rowq12=mysqli_fetch_assoc($getImage);
            $Products['imageLocation']="admin/".$rowq12['imageLocation'];
        
        
    }

    // $index++;
 
  // //print_r($Products);



  
?>
<style>
.product-gallery figure:not(.main-img) {
    position: absolute;
    left: 0;
    right: 0;
}
 .z-depth-1 {
    -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,0.07),0 2px 10px 0 rgba(0,0,0,0.07) !important;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.07),0 2px 10px 0 rgba(0,0,0,0.07) !important;
}
 .rounded {
    border-radius: 0.375rem !important;
}
 .classic-tabs .nav.tabs li a.active {
    color: #1266f1 !important;
    border-color: #1266f1;
    /* background-color:white; */

 }
 .classic-tabs .nav.tabs li a {
    color: #6c757d;
    font-weight: 900;
 }
</style>

<div class="container ">

      <!--Section: Block Content-->
      <section class="mb-5">

        <div class="row">
          <div class="col-md-6 mb-4 mb-md-0">

            <div id="mdb-lightbox-ui"><!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
		         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <!--<button class="pswp__button pswp__button--share" title="Share"></button>-->

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!--
		            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
		                <div class="pswp__share-tooltip"></div> 
		            </div>
		       		-->

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div></div>

            <div class="mdb-lightbox" data-pswp-uid="1">

              <div class="row product-gallery mx-1">

                <div class="col-12 mb-0">
                  <figure class="view overlay rounded z-depth-1 main-img" >
                    <a href="<?php echo $Products['imageLocation']?>" data-size="910x1123">
                      <img src="<?php echo $Products['imageLocation']?>" class="img-fluid z-depth-1" >
                    </a>
                  </figure>
                
                </div>
                
              </div>

            </div>

          </div>
          <div class="col-md-6">

            <h5><?php
              echo $Products['productName'];
            ?>
            </h5>
            <p class="mb-2 text-muted text-uppercase small"><?php
              echo $Products['categoryName'];
            ?></p>
            <ul class="rating">
              <li>
                <i class="fas fa-star fa-sm text-primary"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-primary"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-primary"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-primary"></i>
              </li>
              <li>
                <i class="far fa-star fa-sm text-primary"></i>
              </li>
            </ul>
            <form action="" id="ProductForm">
            <p><span class="mr-1"><strong><?php echo "₹".$Products['discountPrice'];  ?><?php echo "<del class='pl-2 text-danger'> ₹".$Products['price']."</del>";  ?> </strong></span></p>
            <p class="pt-1"><?php echo $Products['description'] ?></p>
            
           <p class="text-danger">Note: Minimum quantity is <?php echo $Products['minimumQty']; ?> </p>

            <div class="table-responsive mb-2">
              <table class="table table-sm table-borderless">
                <tbody>
                  <tr>
                    <th class="pl-0 pb-0 w-25">Quantity</th>
                    <!-- <td class="pb-0">Select size</td> -->
                  </tr>
                  <tr>
                    <td class="pl-0">
                      <div class="def-number-input number-input safari_only mb-0">
                        <button id="Minus" class="minus"></button>
                        <input class="quantity" min="<?php echo $Products['minimumQty']; ?>" id="Qty" name="quantity" value="<?php echo $Products['minimumQty']; ?>" max="<?php echo $Products['quantity']; ?>" type="number">
                        <button id="Plus" class="plus"></button>
                      </div>
                    </td>
                    
                  </tr>
                </tbody>
              </table>
              <span id="QuantityMsg"> </span>
            </div>
<div class="custom-control custom-checkbox mb-2">
  <input type="checkbox" class="custom-control-input" name="chk" id="Printing" >
  <label class="custom-control-label" for="Printing">With Printing</label>
</div>
<div class="md-form">
  <div class="file-field" id="UploadPrint">
    <div class="btn btn-primary btn-sm float-left">
      <span>Choose file</span>
      <input type="file" name="file" id="FilePrint">
    </div>
    <div class="file-path-wrapper">
      <input class="file-path validate" type="text" id="fileNma" placeholder="Upload your file">
    </div>
  </div>
</div>

      
        <button type="submit" class="btn  danger-color   " id="BUYNOW" name="BuyNow" value="BuyNow" data-action="BuyNow">Buy now</button>
        <button type="submit" id="AddToCart" value="AddToCart" class="btn success-color 
  waves-effect waves-light"  name="AddToCart" data-action="AddToCart"> Add to Cart</button>
<span id="BUTTONMessage">
</span>

              </form>
          </div>
        </div>

      </section>
      <!--Section: Block Content-->
      <!-- <hr>  -->
    </div>
    <?php
  }
  else{
    ?>
    <div class=" d-flex justify-content-center ">
    <!-- <div class="col"> -->
    <div class="  ">
    <div class="h4 text-center "><strong class="h1 indigo-text">Ooops ! </strong></div><div class="h4">The Product you are looking for is Missing.<hr><a class="h6" href='products.php'> << Back to Products</a></div>
    <!-- </div> -->
    </div>
    </div>
    <?php
  }
  
  
}
  else{
    ?>
    <div class=" d-flex justify-content-center p-2 ">
    <!-- <div class="col"> -->
    <div class=" ">
    <div class="h4 text-center "><strong class="h1 indigo-text">Ooops ! </strong></div><div class="h4">The Product you are looking for is Missing.<hr><a class="h6" href='products.php'> << Back to Products</a></div>
    <!-- </div> -->
    </div>
    </div>
    <?php
  }
  
  ?>
<!-- Card -->
<?php
include "common/footer.php";

?>

<script>

$onAddcart=false;
$('#AddToCart').click(function(){
  //alert('rf');
  $onAddcart=true;
});
$('#BUYNOW').click(function(){
  //alert('rsf');
  $onAddcart=false;
});


$sku=((new URL($(location).attr('href')).searchParams).get('AfjkshfrjkoewrsfghekghreoiyoERoiwrtucwaercrthKJTPYKYPJKIEOE394304e12cwwfgcwro12344982509lkcfopfgrejkgpom4908kc33j9m04t98j3t9873juerFkcog'))
$('#ProductForm').submit(function(e){
  e.preventDefault();

  console.log($(this).serialize());
  var file_data = $('#FilePrint').prop('files')[0];   
  console.log(file_data)
  console.log($onAddcart)
    var form_data = new FormData(this);                  
    // form_data.append('file', file_data);
    form_data.append('sku',$sku);
    form_data.append('addtocart',$onAddcart);
    //alert(form_data);  
    console.log(form_data)
                               

$.ajax({
            type: 'POST',
            url: 'validation/productBuy.php',
            data: (form_data),            
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){

              $('#loader').show();
                // $('.submitBtn').attr("disabled","disabled");
                // $('#fupForm').css("opacity",".5");
            },
            success: function(response){
              
               console.log(response);              
              
               var jsonRes=JSON.parse(response)
              
               if(jsonRes.Success==true)
               {
                  // //alert("Success");
                $('#loader').hide();
                    if($onAddcart)
                    {
                      console.log("true");
                    $('#BUTTONMessage').html('<div class="alert alert-success"><strong><i class="fas fa-exclamation-circle"></i></strong> '+jsonRes.message+"<a href='cart.php' class='float-right m-0 btn blue-gradient'>Visit Cart >> </a>"+'</div>'+"")
                    }
                    else
                    { 
                      console.log("false");
setTimeout(() => {
  
                      location.href='checkout.php';
}, 200);
                    // $('#BUTTONMessage').html('<div class="alert alert-success"><strong><i class="fas fa-exclamation-circle"></i></strong> '+jsonRes.message+'</div>')
                      
                    }
               }
               else
               {
                $('#BUTTONMessage').html('<div class="alert alert-danger"><strong><i class="fas fa-exclamation-circle"></i></strong> '+jsonRes.message+'</div>')
                  // alert("Failed");
               }
            

            },
            error:function(response){
              console.log(response);
              //alert(response)
              console.log("kdtjgheugh")
            }
        });

});

// File type validation
$("#FilePrint").change(function() {
    var file = this.files[0];
    var fileType = file.type;
    var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'image/jpeg', 'image/png', 'image/jpg'];
    if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
        //alert('Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.');
        $(this).val('');
        $('#fileNma').text('');
        return false;
    }
});

$('#UploadPrint').hide();
$('#Printing').click (function ()
{


if((this.checked))
{
// Do stuff
// console.log("hecked");
    $('#UploadPrint').show();
}
else
{
  // c  onsole.log("Unchecked");
  $('#UploadPrint').hide();
}
});
$('#Minus').click(function(e){
  e.preventDefault();

  oldVal=$('#Qty').val();
newVal=$('#Qty').val(oldVal-1);
// //alert("fd")
  $.ajax({
    url:'validation/PlusMinus.php',
    method:'post',
    data:{action:"Minus",qty:$('#Qty').val(),sku:$sku},
    success:function(res)
    {
      console.log(res);
      if(res==1)
      {
        $('#Qty').val(oldVal);
        $('#QuantityMsg').html('<div class="alert alert-danger"><strong><i class="fas fa-exclamation-circle"></i></strong> Quantity is Must be in between Range</div>')
      }
      else
      {
        $('#QuantityMsg').html('');
      }
    },
    error:function(res)
    {
      console.log(res);
    }
  });
})
$('#Plus').click(function(e){
  e.preventDefault();


  
oldVal=$('#Qty').val();
newVal=oldVal
$('#Qty').val((++newVal));
// //alert("fd")
  $.ajax({
    url:'validation/PlusMinus.php',
    method:'post',
    data:{action:"Plus",qty:$('#Qty').val(),sku:$sku},
    success:function(res)
    {
      console.log(res);
      if(res==1)
      {
        $('#Qty').val(oldVal);
        $('#QuantityMsg').html('<div class="alert alert-danger"><strong><i class="fas fa-exclamation-circle"></i></strong> Quantity is Must be in between Range</div>')
      }
      else
      {
        $('#QuantityMsg').html('');
      }
    },
    error:function(res)
    {
      console.log(res);
    }
  });
})
$oldVal=$('#Qty').val();
$('#Qty').change(function(e){
  // e.preventDefault()
// //alert("fd")

// ldVal=$('#Qty').val();
// newVal=$('#Qty').val(oldVal-1);

  $.ajax({
    url:'validation/PlusMinus.php',
    method:'post',
    data:{action:"PluMinus",qty:$('#Qty').val(),sku:$sku},
    success:function(res)
    {
      console.log(res);
      if(res==1)
      {
        $('#Qty').val($oldVal);
        $('#QuantityMsg').html('<div class="alert alert-danger"><strong><i class="fas text-danger fa-exclamation-circle"></i></strong>  Quantity is Must be in between Range</div>')
      }
      else
      {
        $oldVal=$('#Qty').val()
        $('#QuantityMsg').html('');
      }
      
    },
    error:function(res)
    {
      console.log(res);
    }
  });
})


</script>