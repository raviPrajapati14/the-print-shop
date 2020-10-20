<?php 
include 'sess_check.php';
include 'templates/header.php';
include 'templates/navigation.php';
include 'common/database.php';
//?>

<div class="d-flex align-items-center py-3 unique-color">
        <div class="container  text-center ">
          <h3 class="text-white">Manage Products</h3>
        </div>
</div>
<div class="cntainer">
  <a class="btn btn-primary float-right m-3" href="addproduct.php">Add Product</a> <br>
</div>



        <div class="card  mb-4 m-5">
           
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper"  class="dataTables_wrapper dt-bootstrap4">


<div class="container">

      <!--Section: Block Content-->
      <section class="mt-5 mb-4">

      <table id="dt-filter-select" class="table table-bordered " cellspacing="0" width="100%">
  <thead class="black white-text">
    <tr>
      <th class="">Sr.No.</th>
      <th class="">Name</th>
      <th class="">Description</th>
      <th class="">SKU</th>
      <th class="">Price</th>
      <th class="">Discount Price</th>
      <th class=""> Qty </th>
      <th class="">Minimum Qty</th>
      <th class="">Category</th>
      <th class="">Tax</th>
      <th class="">Edit</th>
      <th class="">Delete</th>
    </tr>
  </thead>
  <tbody>
                <?php
                $res = mysqli_query($link, "select * from product");
                $srNo = 1;
                $pcid = array();
                $index = 0;
                while ($row = mysqli_fetch_array($res)) {

                    // print_r($row);
                    // echo "<br>";
                    $productId[$index]=$row['productId'];
                    $pcid[$index] = $row['categoryId'];
                    $taxid[$index] = $row['taxId'];

                    $getcategory = "select * from category where categoryId = " . $pcid[$index] . " ";
                    $categoryFetch = mysqli_query($link, $getcategory);
                    $row1 = mysqli_fetch_assoc($categoryFetch);

                    $gettax = "select * from tax where taxId = " . $taxid[$index] . " ";
                    $taxFetch = mysqli_query($link, $gettax);
                    $row2 = mysqli_fetch_assoc($taxFetch);

                    // print_r($row);
                    // echo "<br>";
                    // print_r($row2);
                    // echo "<br>";
                    // echo $row['prductId'];
                ?>
                    <tr>
                        <td> <?php echo $srNo++; ?></td>
                        
                        <td> <?php echo $row['productName']; ?></td>
                        <td> <?php echo $row['description']; ?></td>
                        <td> <?php echo $row['sku']; ?></td>
                        <td> <?php echo $row['price']; ?></td>
                        <td> <?php echo $row['discountPrice']; ?></td>
                        <td> <?php echo $row['quantity']; ?></td>
                        <td> <?php echo $row['minimumQty']; ?></td>
                        <td> <?php echo $row1['name']; ?></td>
                        <td> <?php echo $row2['taxName']; ?></td>

                        <td> <?php echo " <button data-toggle='modal' data-target='#Editproduct" . $row['productId'] . "'  data-id='" . $row['productId'] . "' class='btn btn-warning'> Edit </button>"; ?> </td>
                        <td> <?php echo " <button data-toggle='modal' data-target='#Deleteproduct" . $row['productId'] . "'  data-id='" . $row['productId'] . "' class='btn btn-danger'> Delete </button>"; ?> </td>

                    </tr>

                    <div class="modal fade" id="Deleteproduct<?php echo $row['productId']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="deleteproduct" data-id='<?php echo $row['productId']; ?>'>
                                    <!-- Modal Header -->
                                    <span class="alertMsg"></span>
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Product</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Are you sure?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" data-id='<?php echo $row['productId']; ?>' class="btn btn-danger" id="DeleteCategory<?php echo $row['productId']; ?>" name="SaveCategory" value="O9onhRErX1dVPnndgkkxMLUF1Q">Delete Category</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-danger" id="CancleCategory" name="CancleCategory" value="O9onhRErX1dVPnndgkkxMLUF1Q">Cancle Category</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>


                <?php
                // print_r($row);
                // echo $row['productId'];
                // echo $productId[$index];
                // $index++;
                }
                ?>
            </tbody>

  <tfoot>
    <tr>
      <th >Sr.No.</th>
      <th >Name</th>
      <th >Description</th>
      <th >SKU</th>
      <th >Price</th>
      <th >Discount Price</th>
      <th > Qty </th>
      <th >Minimum Qty</th>
      <th >Category</th>
      <th >Tax</th>
      <th > </th>
      <th > </th>
    </tr>
  </tfoot>
</table>

      </section>
      <!--Section: Block Content-->


    </div>
    </div>
          </div>
                </div>
                </div>


                <?php 
include 'templates/navigation_end.php';
include 'templates/footer.php';

?>

<script>
  
          $(document).ready( function () {

              $('.active').on('click',function(e)
              {
                  $btn1=$(this);
                $id=$(this).attr('data-id');
                $valu=$(this).attr('data-value');
if($valu==0)
{
    $valu=1;
}
else
{
    $valu=0;
}
                $.ajax({
  method: "POST",
  url: "validate_manage_students",
  data: {'id':$id,'active':$valu,'action':'Active'},
  dataType:'json',
  beforeSend:function()
  {
    $('#loader').show();
  },
  error: function(data) {
      console.log("ksdjhfiuer");
// $('#info').html('<p>An error has occurred</p>');
console.log(data);
},
success: function(data) {
    if(data.Successfull)
{
$('#loader').hide();
    swal({
  title: "Good job!",
  text: "Status Changed",
  icon: "success",
  button: false,
  timer:2000,
    
});
// if($valu==0)
// {
//     $btn1.attr('data-value',$valu);
//     $('#isActive'+$id).text($valu);
//     $btn=$('.activebtn'+$id);
// $btn.attr('data-value',$valu);
// $btn.removeClass( "btn btn-danger" );
// $btn.addClass( "btn btn-warning" );
// $btn.html("Active");
// }
// else
// {
//     $btn1.attr('data-value',$valu);
//     $('#isActive'+$id).text($valu);
//     $btn=$('.activebtn'+$id);
// $btn.attr('data-value',$valu);
// $btn.removeClass( "btn btn-warning" );
// $btn.addClass( "btn btn-danger" );
// $btn.html("InActive");
// }
setTimeout(() => {
    // location.reload();
}, 2000);

}
}});
              });
              
} );
$(document).ready( function () {

$('#dataTable').dataTable( {
"oLanguage": {
"sEmptyTable": "No Students",

"sInfo": "Showing _TOTAL_ Students to from (_START_ to _END_)",
"sInfoEmpty": "Showing _TOTAL_ Students to from (0 to _END_)",
"sLengthMenu": "Display _MENU_ Students"
}
,

// "dom":<"wrapper"flipt>
"dom":"<'row'<'col-sm-12'l><'col-sm-12'f>>" +
"<'row'<'col-sm-12'tr>>" +
"<'row'<'col-sm-12 'i><'col-sm-12'p>>",
// "dom":"<'row'<'col-sm-5'i><'col-sm-7'p>>",
} );

 
$('#dt-filter-select').dataTable({

initComplete: function () {
  this.api().columns().every( function () {
      var column = this;
      var select = $('<select  class="browser-default custom-select form-control-sm"><option value="" selected>Search</option></select>')
          .appendTo( $(column.footer()).empty() )
          .on( 'change', function () {
              var val = $.fn.dataTable.util.escapeRegex(
                  $(this).val()
              );

              column
                  .search( val ? '^'+val+'$' : '', true, false )
                  .draw();
          } );

      column.data().unique().sort().each( function ( d, j ) {
          select.append( '<option value="'+d+'">'+d+'</option>' )
      } );
  } );
}
});
  
} );




            $(document).on('submit', '.deleteproduct', function(e) {
                e.preventDefault();
                // console.log("rnifgr");

                var id = $(this).attr('data-id');

                // var paswd = $('#userPassword').val();
                //	alert(email);
                //	alert(paswd);
                // console.log(email);
                $.ajax({
                    type: 'POST',
                    url: 'validateproduct.php',
                    data: {
                        pid: id,
                        sbmit: $("#Deleteproduct" + id + "").val(),
                        action: "DELETE"
                    },
                    beforeSend: function() {
                        // setting a timeout
                        // $('.loader-logo').show();
                    },
                    success: function(res) {
                        // $('.loader-logo').show();
                        setTimeout(function() {

                            var re = res.trim();
                            console.log(re);
                            alert(re);
                            // cons

                            // window.location.href = 'dashboard.php'
                            if (re == "categoryEmpty") {
                                $(".alertMsg").text("Please Enter Category.");
                            } else if (re == "error") {
                                $(".alertMsg").text("OOPS! Something Went wrong");
                            } else if (re == "success") {
                                flag = true;
                                $(".alertMsg").text("Success");
                                window.location.reload();
                            }

                            // if (flag) {
                            //     $(".alertMsg").prepend('<i class="fa fa-check p-2"></i>');
                            //     $(".alertMsg").addClass('gradient-success');
                            // } else {
                            //     $(".alertMsg").prepend('<i class="fa fa-exclamation-circle  text-white p-2"></i>');
                            //     $(".alertMsg").addClass('gradient-danger');
                            // }
                            // $('.loader-logo').show();
                        }, 1000);
                        setTimeout(function() {
                            // $('.loader-logo').hide();

                        }, 1500);


                    },
                    error: function(res) {
                        $(".alertMsg").text("Something went wrong.");
                        $(".alertMsg").prepend('<i class="fa fa-exclamation-circle  text-white p-2"></i>');
                        $(".alertMsg").addClass('gradient-danger');
                    },
                    complete: function() {
                        // $('.loader-logo').hide();
                    },
                });

            });

</script>


  
