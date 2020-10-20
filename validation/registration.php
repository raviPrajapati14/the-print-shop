<?php
session_start();

include '../common/database.php';
//  //print_r($_POST);
$data=array();
$username = $_POST["username"];
$password = $_POST["password"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];

$flag=1;
$FirstnameErrorRequired=null;
$FirstnameErrorInvalid=null;
$LastnameErrorRequired=null;
$LastnameErrorInvalid=null;
$UsernameErrorRequired=null;
$UsernameErrorInvalid=null;
$PasswordErrorRequired=null;
$PasswordErrorInvalid=null;

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
if (empty($username)) {
    $UsernameErrorRequired="Username is Required";
    $flag=0;
}
else if(!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    $UsernameErrorInvalid="Username is Invalid";
    $flag=0;
}
if(empty($password)) {
    $PasswordErrorRequired="Password is Required";
    $flag=0;
}
else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,16}$/',$password)) {
    $PasswordErrorInvalid="Password is Invalid";   
    $flag=0;
}

if($flag==1){
 
    $DbMessage=null;
    $res = mysqli_query($link, "select * from customer where email='$username'");
    
    if (mysqli_fetch_assoc($res)){
  
        $Success=TRUE;
        $AlreadyRegistred=TRUE;
        $Message="User Already Registered";
    }
    else{
        
        $query = "insert into customer VALUES ('','$firstname','$lastname','$username','$password','','1','1','".date('Y-m-d')."','".date('Y-m-d')."')";
    
    if (mysqli_query($link, $query)) {
        // echo "New record created successfully";
        $Success=TRUE;
        $AlreadyRegistred=FALSE;
        $Message="Registred Successfully";
    } else {
        // echo "Error: <br>" . mysqli_error($link);
        $Success=FALSE;
        $AlreadyRegistred=FALSE;
        $Message="Server Error!";
        $DbMessage="Error: <br>".$query."".mysqli_error($link);
        
    }
        // $data=array("Validation"=>TRUE,"ValidUser"=>FALSE);
    }
 

    

  $data=array(
    "validation"=>TRUE,
    "Success"=>$Success,
    "AlreadyRegistred"=>$AlreadyRegistred,
    "Message"=>$Message,
    "DbMessage"=>$DbMessage
  );
}
else
{
 $data=array(
    "validation"=>FALSE,
    "UsernameErrorInvalid"=>$UsernameErrorInvalid,
    "UsernameErrorRequired"=>$UsernameErrorRequired,
    "FirstnameErrorInvalid"=>$FirstnameErrorInvalid,
    "FirstnameErrorRequired"=>$FirstnameErrorRequired,
    "PasswordErrorInvalid"=>$PasswordErrorInvalid,
    "PasswordErrorRequired"=>$PasswordErrorRequired,
    "LastnameErrorInvalid"=>$LastnameErrorInvalid,
    "LastnameErrorRequired"=>$LastnameErrorRequired
 );

}


echo json_encode($data);

?>

