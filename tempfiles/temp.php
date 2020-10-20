<?php

include 'common/header.php';
?>


<form action="" id="FormSbmit">
    <input type="text" name="jsp">
<input id="sortpicture" type="file" name="sortpic" />
<button id="upload" type="submit">Upload</button>

</form>
<?php

include 'common/footer.php';
?>

<script>

$('#FormSbmit').submit(function(e) {
e.preventDefault()

    var file_data = $('#sortpicture').prop('files')[0];   
    var form_data = new FormData(this);                  
    form_data.append('file', file_data);
    alert(form_data);                             
    $.ajax({
        url: 'temp2.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
            alert(php_script_response); // display response from the PHP script, if any
        }
     });
});
</script>

