<?php 
include 'templates/header.php';
include 'templates/navigation.php';
include 'common/database.php';
?>

<div class="d-flex align-items-center py-3 unique-color">
    <div class="container  text-center ">
        <h3 class="text-white">Manage Order Product</h3>
    </div>
</div>

<div class="card  mb-4 m-5">

    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <div class="container">
                    <!--Section: Block Content-->
                    <section class="mt-5 mb-4">

                        <table id="dt-filter-select" class="table table-bordered " cellspacing="0" width="100%">
                            <thead class="black white-text">
                                <tr>
                                    <th class="th-sm">Sr.No.</th>
                                    <th class="th-sm">orderId</th>
                                    <th class="th-sm">ProductId</th>
                                    <th class="th-sm">Quantity</th>
                                    <th class="th-sm">price</th>
                                    <th class="th-sm">discountPrice</th>
                                    <th class="th-sm">finalPrice</th>
                                    <th class="th-sm">taxPrice</th>
                                    <th class="th-sm">totalPrice</th>
                                    <th class="th-sm">productSku</th>
                                    <th class="th-sm">PrintingStatus</th>
                                    <th class="th-sm">Print File</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                $res = mysqli_query($link, "select * from orderproduct");
                $srNo = 1;
                while ($row = mysqli_fetch_array($res)) {
                ?>
                                <tr>
                                    <td> <?php echo $srNo++; ?></td>
                                    <td> <?php echo $row['orderId']; ?></td>
                                    <td> <?php echo $row['productId']; ?></td>
                                    <td> <?php echo $row['quantity']; ?></td>
                                    <td> <?php echo $row['price']; ?></td>
                                    <td> <?php echo $row['discountPrice']; ?></td>
                                    <td> <?php echo $row['finalPrice']; ?></td>
                                    <td> <?php echo $row['taxPrice']; ?></td>
                                    <td> <?php echo $row['totalPrice']; ?></td>
                                    <td> <?php echo $row['productSku']; ?></td>
                                    <td> <?php echo $row['withPrint']; ?></td>
                                    <td> <?php echo $row['file']; ?></td>
                                </tr>
                                <?php
                }
                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <th class="th-sm">Sr.No.</th>
                                    <th class="th-sm">orderId</th>
                                    <th class="th-sm">ProductId</th>
                                    <th class="th-sm">Quantity</th>
                                    <th class="th-sm">price</th>
                                    <th class="th-sm">discountPrice</th>
                                    <th class="th-sm">finalPrice</th>
                                    <th class="th-sm">taxPrice</th>
                                    <th class="th-sm">totalPrice</th>
                                    <th class="th-sm">productSku</th>
                                    <th class="th-sm">PrintingStatus</th>
                                    <th class="th-sm">Print File</th>
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
</script>
