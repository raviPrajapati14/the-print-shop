<?php
session_start();
// print_r($_SESSION);
// echo "DHrtyjhjyjyjtyjjtyjtjtyjjt";
if(isset($_SESSION['user']))
{
    unset($_SESSION['user']);
    // header('location:index.php');
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
    exit;
}
else
{
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
    exit;
}

?>