<?php
session_start();
include_once "../../auto_load.php";
include_once "../constants.php";
$url ="../";
$viewUrl = $url.VIEW_POSITIONS;
$editUrl = $url.EDIT_POSITION;
$addUrl = $url.ADD_POSITION;

if (isset($_GET['edit_id'])) {
    if(empty($_GET['edit_id'])){
        header('location: '.$viewUrl);
    }else{
        header("location: ".$editUrl."?id=".$_GET['edit_id']) ;
    }
}

if (isset($_POST['update'])) {
    // print_r($_POST);exit;
    $position_id = $_POST['id'];
    if(empty($_POST['name'])){
        $_SESSION['errorMessage'] = "Input Field required";
        header('location:'.$editUrl."?id=".$position_id) ;
    }
    if(empty($_POST['id'])){
        $_SESSION['errorMessage'] = "";
        header('location:'.$editUrl."?id=".$position_id) ;
    }else{
        $position_name = $_POST['name'];

        if($position->updatePosition($position_id, $position_name)){
            $_SESSION['successMessage'] = "Update Successful";
            header('location: '.$viewUrl) ;
        }else{
            $_SESSION['errorMessage'] = "Oops!!! Sorry Try Again";
            header('location: '.$editUrl."?id=".$position_id) ;
        }

    }
}


if (isset($_POST['add'])) {

    if (empty($_POST['name'])) {
        $_SESSION['errorMessage'] = "Input Fields required";
        header('location:' . $addUrl);
    } else {
        $position_name = $_POST['name'];
        if ($position->addPosition($position_name)) {
            $_SESSION['successMessage'] = "Position successfully added";
        } else {
            $_SESSION['errorMessage'] = "Oops!!! Sorry Try Again";
        }
        header('location: ' . $viewUrl);
    }
}
if (isset($_GET['delete_id'])) {
    if(empty($_GET['delete_id'])){
        $_SESSION['errorMessage'] = "Your record is still intact";
        header("location: ".$viewUrl) ;
    }else{
        $id=$_GET['delete_id'];
        // Using the method in college model
        if ($position->deletePosition($id)) {
            $_SESSION['successMessage'] = "You have successfully deleted this record";
            header('location: '.$viewUrl) ;
        }
        else{
            $_SESSION['errorMessage'] = "Error occured Try again.";
            header('location: '.$viewUrl) ;
        }

    }
}

