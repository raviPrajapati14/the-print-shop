<?php

include "common/header.php";
include "common/navigation.php";



?>


      <div class="d-flex align-items-center my-5 py-5 unique-color">
        <div class="container  text-center ">
          <h3 class="text-white">My Orders</h3>
        </div>
      </div>

<div class="container">

      <!--Section: Block Content-->
      <section class="mt-5 mb-4">

      <table id="dt-filter-select" class="table" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Product Name
      </th>
      <th class="th-sm">SKU
      </th>
      <th class="th-sm">Product Quantity
      </th>
      <th class="th-sm">Order Price
      </th>
      <th class="th-sm">Order Status
      </th>
      <th class="th-sm">Delivery Address
      </th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Kankotri </td>
      <td>K-1997</td>
      <td>200</td>
      <td>5304₹</td>
      <td>Delivered</td>
      <td>62, Solanki Vas, Manisha Apartment, Jawahar Sheri, Ahmedabad, Gujarat, 382305,</td>
    </tr>
    <tr>
      <td>Invitation Card </td>
      <td>IC-155</td>
      <td>100</td>
      <td>1000₹</td>
      <td>Pending</td>
      <td>62, Solanki Vas, Manisha Apartment, Jawahar Sheri, Ahmedabad, Gujarat, 382305,</td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
    <th class="th-sm">Product Name
      </th>
      <th class="th-sm">SKU
      </th>
      <th class="th-sm">Product Quantity
      </th>
      <th class="th-sm">Order Price
      </th>
      <th class="th-sm">Order Status
      </th>
      <th class="th-sm">Delivery Address
      </th>

    </tr>
  </tfoot>
</table>

      </section>
      <!--Section: Block Content-->


    </div>

    <?php
include "common/footer.php";

?>

<script>

$(document).ready(function () {
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
});
    </script>