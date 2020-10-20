<?php

include '../common/database.php';
    // print_r($_POST);
    $res = mysqli_query($link, "select * from product where sku='".$_POST['sku']."'");


if(mysqli_num_rows($res)==1) {  
  // customere data
    $row=mysqli_fetch_assoc($res);
    $min=$row['minimumQty'];
    $max=$row['quantity'];

    if($_POST['qty']>=$min && $_POST['qty']<=$max)
    {
        echo "0";
    }
    else
    {
        echo "1";
    }
}

?>