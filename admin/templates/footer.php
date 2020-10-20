<footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>New Dipeshwari Printing Press &copy; 2020</span>
                </div>
            </div>
        </footer>
  <!-- Bootstrap core JavaScript-->
  
  <script src="../assets/theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/theme/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/theme/js/sb-admin-2.min.js"></script>
  <script src="../assets/theme/js/sweetalert.min.js"></script>
  <script src="../assets/theme/js/bootstrap-select.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js"></script> -->
  <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script> -->
  <script src="../assets/theme/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/theme/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  
  <script src="../assets/MDB-Pro_4.7.5/js/mdb.min.js"></script> 
<script src="../assets/MDB-Pro_4.7.5/js/addons/datatables.min.js"></script> 

<script src="../assets/MDB-Pro_4.7.5/js/addons/datatables-select.min.js"></script> 
  <script>
$( document ).ready(function() {
    $('.pass-icon').on('click',function(){
    $id=$(this).attr('data-target');
    $icon=$(this).find('i');
    $icon.toggleClass('fa-eye-slash');
    if($('#'+$id).attr('type')=="password")
        $('#'+$id).attr('type',"text");
    else
        $('#'+$id).attr('type',"password"); 
});

    setTimeout(() => {
        $('#loader').hide();
    }, 400);
    msg='<div class="alert alert-warning alert-dismissible fade fd show" role="alert">';
    msgend='<button type="button" class="close" data-dismiss="alert" aria-label="Close">    <span aria-hidden="true">&times;</span>  </button></div>';
   $('select').selectpicker();
//    $('#dataTable').DataTable();
});
$('*[data-toggle="modal"]').click(function(){
    $id=$(this).attr('data-target');
        $($id).modal({
            backdrop: 'static',
            keyboard: false
        });
    });
// $('.modal').modal({keyboard: false})  

</script>

</body>
</html>