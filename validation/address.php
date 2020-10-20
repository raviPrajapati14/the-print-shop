<?php
session_start();

include '../common/database.php';
//  print_r($_POST);

$data=array();
if(isset($_SESSION['customer']))
{

    $username=$_SESSION['customeremail'];
    $sessionActive=true;
    $landmark=null;

    $housenumber = $_POST["housenumber"];
    $recidencename = $_POST["recidencename"];
    $streetname = $_POST["streetname"];
    $landmark = $_POST["landmark"];
    $areaname=$_POST["areaname"];

    $city=$_POST["city"];
    $state=$_POST["state"];
    $country=$_POST["country"];

    $pincode=$_POST["pincode"];


    $pincodeInvalid=null;
    $pincodeRequired=null;
    $areanameInvalid=null;
    $areanameRequired=null;
    $housenumberRequired=null;
    $recidencenameRequired=null;
    $recidencenameInvalid=null;
    $streetnameRequired=null;
    $streetnameInvalid=null;
    
    // echo $gender;

    



    $flag=1; 
    
    $regex = "/^[1-9]{1}[0-9]{2}\\s{0,1}[0-9]{3}$/";

    if(empty($pincode)) {    
        $pincodeRequired="Pincode is Required";
        $flag=0;
    }
    else if(!preg_match($regex, $pincode)) {
        $pincodeInvalid="Pincode is Invalid";
        $flag=0;
    }

    if(empty($streetname)) {
        $streetnameRequired="Street Name is Required";
        $flag=0;
    }
    else if(!preg_match("/^([a-zA-Z' ]+)$/",$streetname)) {
        $streetnameInvalid="Street Name is Invalid";
        $flag=0;
    }

    if(empty($housenumber)) {
        $housenumberRequired="House Number is Required";
        $flag=0;
    }
    
    
    if(empty($recidencename)) {
        $recidencenameRequired="Recidence Name is Required";
        $flag=0;
    }
    else if(!preg_match("/^([a-zA-Z' ]+)$/",$recidencename)) {
        $recidencenameInvalid="Recidence Name is Invalid";
        $flag=0;
    }
    
    if(empty($areaname)) {
        $areanameRequired="Area Name is Required";
        $flag=0;
    }
    else if(!preg_match("/^([a-zA-Z' ]+)$/",$areaname)) {
        $areanameInvalid="Area Name is Invalid";
        $flag=0;
    }
    

    if($flag==1){
    
        $DbMessage=null;
        $customerid=null;
        $DbMessage1=null;
        $SUCCESS=null;
        $SUCCESS1=null;
        $DBError=null;
        $DBError1=null;
        $res = mysqli_query($link, "select * from customer where email='$username'");
        
        if (mysqli_num_rows($res)==1) {  
            $row=mysqli_fetch_assoc($res);
            $customerid=$row['customerId'];
                // insert
                $insertProfile="insert into address (houseNo,recidenceName,streetName,landmark,areaName,city,state,country,zipcode,insertDate,updateDate) VALUES ('".$housenumber."','".$recidencename."','".$streetname."','".$landmark."','".$areaname."','".$city."','".$state."','".$country."','".$pincode."','".date("Y-m-d")."','".date("Y-m-d")."')";

                if (mysqli_query($link, $insertProfile)) {
                    // echo "Record inset successfully";
                    $SUCCESS=TRUE;
                    $DBError=false;

                    $addressId=mysqli_insert_id($link);
                    $linkCustomer="insert into customeraddress (customerId,addressId,insertDate,updateDate) values(".$customerid.",".$addressId.",'".date("Y-m-d")."','".date("Y-m-d")."')";
                    if (mysqli_query($link, $linkCustomer)) {
                        $SUCCESS=TRUE;
                        $DBError=false;
                    }
                    else
                    {
                        $SUCCESS=false;
                        $DBError=TRUE;
                        $DbMessage="Error insert record: " . mysqli_error($link);
                    }
                    
                    
                } else {
                    $SUCCESS=false;
                    $DBError=TRUE;
                    $DbMessage="Error insert record: " . mysqli_error($link);
                }
           
        }
        else{
            $SUCCESS=false;
            $DBError=TRUE;
            $DbMessage="Error updating record: " . mysqli_error($link);
        }

    $data=array(
        "sessionActive"=>$sessionActive,
        "validation"=>true,
        "success"=>$SUCCESS,        
        "dbError"=>$DBError,        
        "DbMessage"=>$DbMessage,        
    );

    }
    else
    {
    $data=array(
        "sessionActive"=>$sessionActive,
        "validation"=>FALSE,
        "PincodeErrorInvalid"=>$pincodeInvalid,
        "PincodeErrorRequired"=>$pincodeRequired,
        "AreaNameErrorInvalid"=>$areanameInvalid,
        "AreaNameErrorRequired"=>$areanameRequired,
        "RecidenceNameErrorInvalid"=>$recidencenameInvalid,
        "RecidenceNameErrorRequired"=>$recidencenameRequired,
        "HouseNumberErrorRequired"=>$housenumberRequired,
        "StreetNameErrorInvalid"=>$streetnameInvalid,
        "StreetNameErrorRequired"=>$streetnameRequired
    );

    }

}
else
{
    $data=array(
        
        "sessionActive"=>false,
        "Message"=>"Session Expired. Please Login Again ",
    );

}
echo json_encode($data);
?>





