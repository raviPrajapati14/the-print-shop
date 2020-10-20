<?php
session_start();

include '../common/database.php';
//  print_r($_POST);

$data=array();
if(isset($_SESSION['customer']))
{

    $customerid=$_SESSION['customer'];
    $sessionActive=true;
    $gender=null;
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $alternativeemail = $_POST["alternativeemail"];
    $mobileno = $_POST["mobileno"];
    $alternativemobileno = $_POST["alternativemobileno"];
    if(isset($_POST["gender"]))
    {
        $gender=$_POST["gender"];
    }
    // echo $gender;

    $dob=$_POST['dob'];


    $flag=1; 
    $FirstnameErrorRequired=null;
    $FirstnameErrorInvalid=null;
    $LastnameErrorRequired=null;
    $LastnameErrorInvalid=null;
    $AlternativeEmailErrorInvalid=null;
    $MobileNoErrorInvalid=null;
    $AlternativeMobileNoErrorInvalid=null;
    $GenderErrorInvalid=null;
    $DOBInvalid=null;


    if(empty($firstname)) {    
        $FirstnameErrorRequired="Firstname is Required";
        $flag=0;
    }
    else if(!preg_match("/^([a-zA-Z' ]+)$/",$firstname)) {
        $FirstnameErrorInvalid="Firstname is Invalid";
        $flag=0;
    }
    if(empty($lastname)) {
        $LastnameErrorRequired="Lastname is Required";
        $flag=0;
    }
    else if(!preg_match("/^([a-zA-Z' ]+)$/",$lastname)) {
        $LastnameErrorInvalid="Lastname is Invalid";
        $flag=0;
    }

    if(empty($mobileno)) {
        // $LastnameErrorRequired="Lastname is Required";
        // $flag=0;
    }
    else if(!preg_match('/^[0-9]{10}+$/', $mobileno)) {
        $MobileNoErrorInvalid="Mobile No is Invalid";
        $flag=0;
    }

    if(empty($alternativemobileno)) {
        // $LastnameErrorRequired="Lastname is Required";
        // $flag=0;
    }
    else if(!preg_match('/^[0-9]{10}+$/', $alternativemobileno)) {
        $AlternativeMobileNoErrorInvalid="Mobile No is Invalid";
        $flag=0;
    }


    if(empty($alternativeemail)) {
        // $LastnameErrorRequired="Lastname is Required";
        // $flag=0;
    }
    else if(!filter_var($alternativeemail, FILTER_VALIDATE_EMAIL)) {
        $AlternativeEmailErrorInvalid="Alternative Email is Invalid";
        $flag=0;
    }

    if($flag==1){
    
        $DbMessage=null;
        // $customerid=null;
        $DbMessage1=null;
        $SUCCESS=null;
        $SUCCESS1=null;
        $DBError=null;
        $DBError1=null;
        // $res = mysqli_query($link, "select * from customer where email='$username'");
        
        // if (mysqli_num_rows($res)==1) {  
        //     $row=mysqli_fetch_assoc($res);
        //     $customerid=$row['customerId'];
        

            //update Customer table firstname & lastname & contact
            
            $updateCustomer="update customer set firstName='".$firstname."',lastName='".$lastname."',contactNo='".$mobileno."',updateDate='".date("Y-m-d")."' where customerId=$customerid";

            if (mysqli_query($link, $updateCustomer)) {
                // echo "Record updated successfully";
                $SUCCESS=TRUE;
                $DBError=false;
            } else {
                $SUCCESS=false;
                $DBError=true;
                $DbMessage="Error updating record: " . mysqli_error($link);
            }


            //get customerprofile id from customer id
            // echo $customerid;
            $getProfileId=mysqli_query($link, "select * from customerprofile where customerId=$customerid");

            // if true
            if(mysqli_num_rows($getProfileId)==1)
            {
                $rowq=mysqli_fetch_assoc($getProfileId);
                // print_r($rowq);
                $customerProfileId=$rowq['customerProfileId'];
                // update   gender dob altcontact altemail
                // echo $alternativeemail;
                // echo "kjhjtih";
                $updateProfile="update customerProfile set dateOfBirth='".$dob."', gender='".$gender."',altPhone='".$alternativemobileno."' , altEmail='".$alternativeemail."', updateDate='".date("Y-m-d")."' where customerProfileId=$customerProfileId";

                if (mysqli_query($link, $updateProfile)) {
                    $SUCCESS1=TRUE;
                    $DBError1=false;
                    // echo "Record updated successfully";
                } else {
                    $SUCCESS1=false;
                    $DBError1=true;
                    $DbMessage1="Error updating record: " . mysqli_error($link);
                }

            }
            else
            {
                    // insert
                $insertProfile="insert into customerProfile (customerId,dateOfBirth,gender,altPhone,altEmail,insertDate,updateDate) VALUES (".$customerid.",'".$dob."','".$gender."','".$alternativemobileno."','".$alternativeemail."','".date("Y-m-d")."','".date("Y-m-d")."')";

                if (mysqli_query($link, $insertProfile)) {
                    // echo "Record inset successfully";
                    $SUCCESS1=TRUE;
                    $DBError1=false;
                    
                } else {
                    $SUCCESS1=false;
                    $DBError1=TRUE;
                    $DbMessage1="Error updating record: " . mysqli_error($link);
                }
            }
        // }
        // else{
        //     $SUCCESS=false;
        //     $DBError=TRUE;
        //     $DbMessage="Error updating record: " . mysqli_error($link);
        // }

    $data=array(
        "sessionActive"=>$sessionActive,
        "validation"=>true,
        "success"=>$SUCCESS,
        "success1"=>$SUCCESS1,
        "dbError"=>$DBError,
        "dbError1"=>$DBError1,
        "DbMessage"=>$DbMessage,
        "DbMessage1"=>$DbMessage1
    );
    }
    else
    {
    $data=array(
        "sessionActive"=>$sessionActive,
        "validation"=>FALSE,
        "FirstnameErrorRequired"=>$FirstnameErrorRequired,
        "FirstnameErrorInvalid"=>$FirstnameErrorInvalid,
        "LastnameErrorRequired"=>$LastnameErrorRequired,
        "LastnameErrorInvalid"=>$LastnameErrorInvalid,
        "AlternativeEmailErrorInvalid"=>$AlternativeEmailErrorInvalid,
        "MobileNoErrorInvalid"=>$MobileNoErrorInvalid,
        "AlternativeMobileNoErrorInvalid"=>$AlternativeMobileNoErrorInvalid,
        "GenderErrorInvalid"=>$GenderErrorInvalid,
        "DOBInvalid"=>$DOBInvalid
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





