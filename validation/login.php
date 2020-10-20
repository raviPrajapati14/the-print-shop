<?php
session_start();

include '../common/database.php';

$data=array();
$username = $_POST["username"];
$password = $_POST["password"];

$flag=1; 
$UsernameErrorRequired=null;
$UsernameErrorInvalid=null;
$PasswordErrorRequired=null;
$PasswordErrorInvalid=null;

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
    $res = mysqli_query($link, "select * from customer where email='$username' and password='$password'");
    
    if ($row=mysqli_fetch_assoc($res)) {
    
        $_SESSION["customer"] = $row['customerId'];
        $_SESSION['customeremail']=$username;
        $validUser=TRUE;
        $Message="Log in Successfull";
    }
    else{
        $validUser=FALSE;
        $Message="Invalid Username or Password";
    }
  
  $data=array(
    "validation"=>TRUE,
    "validUser"=>$validUser,
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
    "PasswordErrorInvalid"=>$PasswordErrorInvalid,
    "PasswordErrorRequired"=>$PasswordErrorRequired
 );

}

echo json_encode($data);
?>

