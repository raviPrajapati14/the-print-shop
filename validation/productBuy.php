<?php
// session_start();
include '../common/sess_url.php';
include '../common/database.php';
// print_r($_POST);
// exit;
// print_r($_FILES);

$result=array();

// if(isset($_POST['chk']))
// {
    
//     if($_POST['chk']=="on")    
//     {
//         // echo "ON";


//         if ( 0 < $_FILES['file']['error'] ) {
//             // echo 'Error: ' . $_FILES['file']['error'] . '<br>';

//             $result['FileError']='Error: ' . $_FILES['file']['error'] . '<br>';
//         }
//         else {
//             move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/' . $_FILES['file']['name']);


//             $_SESSION['pro_qty']=$_POST['quantity'];
//             $_SESSION['pro_printing']=1;
//             $_SESSION['pro_doc']="../uploads/" . $_FILES['file']['name'];
//             $_SESSION['pro_sku']=$_POST['sku'];

//             $result['Success']=true;        
            
// On Buy Now
// if Login
            //session
            //checkout page
            // if Address perfect
                //payment
                //if Success

                // else
                    //add product to cart
            // else
                //add address
                //payment
                //if Success

                // else
                    //add product to cart
//else
            //session
            //checkout page
            //ask for login
                //follow above
            //ask for registration
                //ask details
                //address
                //register user
                // checout
                // payment


//add to cart
            //redirect login page

//         }
//     }
//     else
//     {
//         echo "OFF";
//     }
    
    
// }
// elseif(isset($_POST['quantity']))
// {
//     $_SESSION['pro_qty']=$_POST['quantity'];
//     $_SESSION['pro_sku']=$_POST['sku'];

// }
// else
// {

// // }
// echo $_POST['addtocart'];
// if($_POST['addtocart']=="true")
// {

//     echo "true";
// }else
// {
//     echo "false";
// }
    

if($_POST['addtocart']=="true")
{
    if(isset($_SESSION['customer']))
    {
        $filelocation=null;
        $filePrint=0;
        $customerId=$_SESSION['customer'];        
        if(isset($_POST['quantity']))
        {
            $qty=$_POST['quantity'];
            $sku=$_POST['sku'];
            if(isset($_POST['chk'])) //mean is checked
            {        
                if ( 0 < $_FILES['file']['error'] ) {
                    // echo 'Error: ' . $_FILES['file']['error'] . '<br>';

                    $result['FileError']='Error: ' . $_FILES['file']['error'] . '<br>';
                    $result['Success']=false; 
                }
                else {
                    move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/' . $_FILES['file']['name']);

                    $filelocation=$base_url.'/uploads/' . $_FILES['file']['name'];
                    $filePrint=1;
                    $result['FileMess']="CHK IS CHECKED ELSE -> ".$_POST['chk'];
                    // $_SESSION['pro_qty']=$_POST['quantity'];
                    // $_SESSION['pro_printing']=1;
                    // $_SESSION['pro_doc']=
                    // $_SESSION['pro_sku']=$_POST['sku'];
                    // $_SESSION['FromBuyNow']=TRUE;
                    // $result['Success']=true; 
                }
            }
            //get login id
            //get product sku
            //
            $sql="select * from product where sku='$sku'";
            $res=mysqli_query($link,$sql);
            if(mysqli_num_rows($res)==1)
            {
                $productId=mysqli_fetch_assoc($res)['productId'];

                $sql2="select * from usercart where customerId=$customerId and productId=$productId and withPrint=0";

                $result['proId']=$productId;
                $res2=mysqli_query($link,$sql2);
                if(mysqli_num_rows($res2)!=0)
                {
                    // $result['InCART']=true;
                    $rowCart=mysqli_fetch_assoc($res2);
                    // print_r($rowCart);
                    $cartId=$rowCart['userCartId'];
                    // $result['InRow']=$rowCart;
                    if($rowCart['withPrint']==0)
                    {
                        if($filePrint==1)
                        {
                            $sql1="insert into usercart values('',$customerId,$productId,$qty,'".date("Y-m-d")."','".date("Y-m-d")."',$filePrint,'$filelocation')";
                            if(mysqli_query($link,$sql1))
                            {
                                $result['Success']=true;
                                $result['message']="Product Added to cart";

                            }
                            else
                            {
                                $result['Success']=false;
                            }
                        }
                        else
                        {
                            $qty+=$rowCart['quantity'];

                            $sql1="update usercart set quantity=$qty, updateDate='".date("Y-m-d")."' where userCartId=$cartId";
                            if(mysqli_query($link,$sql1))
                            {
                                $result['Success']=true;
                                $result['message']="Product Added to cart .";
                            }
                            else{
                                $result['Success']=false;
                            }

                        }
                        
                        
                    
                    }
                    else 
                    {
                        $sql1="insert into usercart values('',$customerId,$productId,$qty,'".date("Y-m-d")."','".date("Y-m-d")."',$filePrint,'$filelocation')";
                        if(mysqli_query($link,$sql1))
                        {
                            $result['Success']=true;
                            $result['message']="Product Added to cart .";
                        }
                        else
                        {
                            $result['Success']=false;
                        }
                    }
                }
                else
                {
                    $sql1="insert into usercart values('',$customerId,$productId,$qty,'".date("Y-m-d")."','".date("Y-m-d")."',$filePrint,'$filelocation')";
                    if(mysqli_query($link,$sql1))
                    {
                        $result['Success']=true;
                        $result['message']="Product Added to cart .";
                    }
                    else
                    {
                        $result['Success']=false;
                    }
                    
                }
            }
        }
        else
        {
            $result['Success']=false; 
        }
    }
    else
    {
        $result['Success']=false;
        $result['message']="You Must Login to Proceed";
        //please login to continue
    }
// echo json_encode($result);
}
else
{
    if(isset($_POST['quantity']))
    {
        if(isset($_POST['chk'])) //mean is checked
        {        
            if ( 0 < $_FILES['file']['error'] ) {
                // echo 'Error: ' . $_FILES['file']['error'] . '<br>';

                $result['FileError']='Error: ' . $_FILES['file']['error'] . '<br>';
                $result['Success']=false; 
            }
            else {
                move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/' . $_FILES['file']['name']);

                $_SESSION['pro_qty']=$_POST['quantity'];
                $_SESSION['pro_printing']=1;
                $_SESSION['pro_doc']=$base_url.'/uploads/' . $_FILES['file']['name'];
                $_SESSION['pro_sku']=$_POST['sku'];
                $_SESSION['FromBuyNow']=TRUE;
                $result['Success']=true; 
                $result['message']="";
            }
        }
        else
        {
            $_SESSION['pro_qty']=$_POST['quantity'];
            $_SESSION['pro_sku']=$_POST['sku'];
            $_SESSION['FromBuyNow']=TRUE;
            $result['Success']=true; 
            $result['message']="";
        }
    }
    else
    {
        $result['Success']=false; 
    }
    $result['InElse']="YES";
}
echo json_encode($result);
?>
