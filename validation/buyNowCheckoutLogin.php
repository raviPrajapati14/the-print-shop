<?php
session_start();
// print_r($_POST);


    if($_POST['delAddress']==-1)
    {
        $result["AddressError"]="Please Select Your Delivery Address";
    }
    else{
        $result["Success"]=true;
        $_SESSION['deliveryAddress']=$_POST['delAddress'];
    }

echo json_encode($result);
?>
