<?php
include 'common/database.php';
// print_r($_POST);

if ($_POST['action'] == "ADD"  && $_POST['sbmit'] == "O9onhRErX1dVPnndgkkxMLUF1Q") {
    if (empty($_POST['category'])) {
        echo "categoryEmpty";
    } else {

        $sql = "insert into category values('','" . $_POST['category'] ."','".date('Y-m-d')."','".date('Y-m-d')."')";

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

        $sql = "update category SET name='" . $_POST['category'] . "', updateDate='".date("Y-m-d")."' where categoryId=" . $_POST['categoryId'] . "";


        // print_r($res);
        if (mysqli_query($link, $sql)) {
            echo "success";
        } else {
            echo "error";
        }
    }
} else if ($_POST['action'] == "DELETE") {
    // echo "fwefwe";

    $sql = "delete from category  where categoryId=" . $_POST['categoryId'] . "";


    if (mysqli_query($link, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Something Went Wrong";
}
