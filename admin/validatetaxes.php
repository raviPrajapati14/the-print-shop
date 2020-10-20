<?php
include 'common/database.php';
// print_r($_POST);

if ($_POST['action'] == "ADD"  && $_POST['sbmit'] == "O9onhRErX1dVPnndgkkxMLUF1Q") {
    if (empty($_POST['category'])) {
        echo "categoryEmpty";
    } else {

        $sql = "insert into tax values('','" . $_POST['taxname'] ."','" . $_POST['tax%'] ."','".date('Y-m-d')."','".date('Y-m-d')."')";

        $res = mysqli_query($link, $sql);

        if ($res == 1) {
            echo "success";
        } else {
            echo "error";
            
        }
    }
} else if ($_POST['action'] == "EDIT"  && $_POST['sbmit'] == "O9onhRErX1dVPnndgkkxMLUF1Q") {
    if (empty($_POST['category'])) {
        echo "categoryEmpty";
    } else {

        $sql = "update tax SET taxName='" . $_POST['taxname'] . "',taxPercentage='" . $_POST['tax%'] ."', updateDate='".date("Y-m-d")."' where taxId=" . $_POST['taxId'] . "";


        // print_r($res);
        if (mysqli_query($link, $sql)) {
            echo "success";
        } else {
            echo "error";
        }
    }
} else if ($_POST['action'] == "DELETE") {
    // echo "fwefwe";

    $sql = "delete from category  where taxId=" . $_POST['taxId'] . "";


    if (mysqli_query($link, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Something Went Wrong";
}
