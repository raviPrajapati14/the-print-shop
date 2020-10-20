<?php 
include 'sess_check.php';
include 'templates/header.php';
include 'templates/navigation.php';
include 'common/database.php';
?>

<div class="d-flex align-items-center py-3 unique-color">
        <div class="container  text-center ">
          <h3 class="text-white">Manage Taxes</h3>
        </div>
</div>

<div class="cntainer">
<button data-toggle="modal" data-target="#AddTaxes" class="btn btn-primary float-right m-3">Add Taxes</button><br>

<div class="modal fade" id="AddTaxes">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="AddTax">
                <!-- Modal Header -->
                <span class="alertMsg"></span>
                <div class="modal-header">
                    <h4 class="modal-title">Add Taxes</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <span id='formMsg'></span>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Taxes </label>
                        <input type="category" class="form-control" id="taxname" aria-describedby="emailHelp" placeholder="Enter Tax Name" name="category"> <br>
                        <span id='emailMsg'></span>
                        <input type="category" class="form-control" id="tax%" aria-describedby="emailHelp" placeholder="Enter Tax %" name="category">
                        <span id='emailMsg'></span>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="Savetax" name="Savetax" value="O9onhRErX1dVPnndgkkxMLUF1Q">Save Taxes</button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger" id="CancelTax" name="CancelTax" value="O9onhRErX1dVPnndgkkxMLUF1Q">Cancle Category</button>
                </div>
            </form>

        </div>

    </div>
</div>

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
    <th>Sr.No.</th>
    <th>Tax Name</th>
    <th>Tax %</th>
      <th class="">Edit</th>
      <th class="">Delete</th>
    </tr>
  </thead>
  <tbody>

  <?php
                $res = mysqli_query($link, "select * from tax");
                $srNo = 1;
                while ($row = mysqli_fetch_array($res)) {
                ?>
                    <tr>
                        <td> <?php echo $srNo++; ?></td>
                        <td> <?php echo $row['taxName']; ?></td>
                        <td> <?php echo $row['taxPercentage']; ?></td>

                        <td> <?php echo " <button data-toggle='modal' data-target='#EditTax" . $row['taxId'] . "'  data-id='" . $row['taxId'] . "' class='btn btn-warning'> Edit </button>"; ?> </td>
                        <td> <?php echo " <button data-toggle='modal' data-target='#DeleteTax" . $row['taxId'] . "'  data-id='" . $row['taxId'] . "' class='btn btn-danger'> Delete </button>"; ?> </td>

                    </tr>
                    <div class="modal fade" id="EditTax<?php echo $row['taxId']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="EditTax" data-id='<?php echo $row['taxId']; ?>'>
                                    <!-- Modal Header -->
                                    <span class="alertMsg"></span>
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Category</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <span id='formMsg'></span>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category</label>
                                            <input type="text" class="form-control" id="taxname<?php echo $row['taxId']; ?>" aria-describedby="emailHelp" placeholder="Enter Category" name="category" value="<?php echo $row['taxName'];  ?>"> <br>
                                            <span id='emailMsg'></span>
                                            <input type="text" class="form-control" id="tax%<?php echo $row['tax']; ?>" aria-describedby="emailHelp" placeholder="Enter Category" name="category" value="<?php echo $row['taxPercentage'];  ?>">
                                            <span id='emailMsg'></span>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" data-id='<?php echo $row['taxId']; ?>' class="btn btn-success" id="SaveTax<?php echo $row['taxId']; ?>" name="SaveTax" value="O9onhRErX1dVPnndgkkxMLUF1Q">Save Category</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-danger" id="CancelTax" name="CancelTax" value="O9onhRErX1dVPnndgkkxMLUF1Q">Cancle Category</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>


                    <div class="modal fade" id="DeleteTax<?php echo $row['taxId']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="DeleteTax" data-id='<?php echo $row['taxId']; ?>'>
                                    <!-- Modal Header -->
                                    <span class="alertMsg"></span>
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Category</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Are you sure?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" data-id='<?php echo $row['taxId']; ?>' class="btn btn-danger" id="DeleteTax<?php echo $row['taxId']; ?>" name="SaveTax" value="O9onhRErX1dVPnndgkkxMLUF1Q">Delete Category</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-danger" id="CancelTax" name="CancelTax" value="O9onhRErX1dVPnndgkkxMLUF1Q">Cancle Category</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>


                <?php
                }
                ?>
            </tbody>
  
  <tfoot>
    <tr>
    <th>Sr.No.</th>
    <th>Tax Name</th>
    <th>Tax %</th>
    <th> </th>
    <th> </th>
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




    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('submit', '#AddTax', function(e) {
                e.preventDefault();
                // console.log("rnifgr");
                var email = $('#category').val();
                console.log(email);
                var email = $('#category').val();
                // var paswd = $('#userPassword').val();
                //	alert(email);
                //	alert(paswd);
                console.log(email);
                $.ajax({
                    type: 'POST',
                    url: 'validatetaxes.php',
                    data: {
                        category: email,
                        sbmit: $("#Savetax").val(),
                        action: "ADD"
                    },
                    beforeSend: function() {
                        // setting a timeout
                        // $('.loader-logo').show();
                    },
                    success: function(res) {
                        // $('.loader-logo').show();
                        setTimeout(function() {

                            var re = res.trim();
                            // console.log(re);
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


            $(document).on('submit', '.DeleteTax', function(e) {
                e.preventDefault();
                // console.log("rnifgr");

                var id = $(this).attr('data-id');

                // var paswd = $('#userPassword').val();
                //	alert(email);
                //	alert(paswd);
                // console.log(email);
                $.ajax({
                    type: 'POST',
                    url: 'validatetaxes.php',
                    data: {
                        taxId: id,
                        sbmit: $("#DeleteTax" + id + "").val(),
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



            $(document).on('submit', '.EditTax', function(e) {
                e.preventDefault();
                // console.log("rnifgr");
                var id = $(this).attr('data-id');
                console.log(id);
                var email = $('#Category' + id + '').val();
                // var paswd = $('#userPassword').val();
                //	alert(email);
                //	alert(paswd);
                console.log(email);
                $.ajax({
                    type: 'POST',
                    url: 'validatetaxes.php',
                    data: {
                        category: email,
                        taxId: id,
                        sbmit: $("#SaveTax" + id + "").val(),
                        action: "EDIT"
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
                                // flag = true;
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
        });
    </script>




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
