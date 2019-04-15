<?php
session_start();
include_once "../../auto_load.php";
include_once "../constants.php";
$url = "../";
$viewUrl = $url . VIEW_COLLEGES;
$editUrl = $url . EDIT_COLLEGE;
$addUrl = $url . ADD_COLLEGE;

if (isset($_GET['edit_id'])) {
    if (empty($_GET['edit_id'])) {
        header('location: ' . $viewUrl);
    } else {
        header("location: ".$editUrl."?id=".$_GET['edit_id']);
    }
}


//to update/edit an existing college
if (isset($_POST['update'])) {
    $collegeId = test_input($_POST['id']);
    if (empty($_POST['name'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location:'.$editUrl."?id=".$collegeId);
    }
    if (empty($_POST['id'])) {
        $_SESSION['errorMessage'] = "";
        header('location:'.$editUrl."?id=".$collegeId);
    }
    else {
        $collegeName = test_input($_POST['name']);
        $collegeId = $_POST['id'];
        $collegeDean = $_POST['dean'];
            if ($college->updateCollege($collegeId,  $collegeName)) {
                $_SESSION['successMessage'] = "Update Successful";
                header('location: ' . $viewUrl);
            } else {
                $_SESSION['errorMessage'] = "Oops!!! Sorry Try Again";
                header('location: ' . $editUrl . "?id=" . $collegeId);
            }
        }
}

//to add a new college
if (isset($_POST['add'])) {
    $collegeName = test_input($_POST['name']);
    if (empty($_POST['name'])) {
        $_SESSION['errorMessage'] = "Input Fields required";
        header('location:' . $addUrl);
    }
    else {
        if ($college->addCollege($collegeName)) {
            $_SESSION['successMessage'] = "College successfully added";
        } else {
            $_SESSION['errorMessage'] = "Oops!!! Sorry Try Again";
        }
        header('location: ' . $viewUrl);
    }
}

//to delete an existing college
if (isset($_GET['delete_id'])) {
    if(empty($_GET['delete_id'])){
        $_SESSION['errorMessage'] = "Your record is still intact";
        header("location: ".$viewUrl) ;
    }else{
        $id=$_GET['delete_id'];
        // Using the method in college model
        if ($college->deleteCollege($id)) {
            $_SESSION['successMessage'] = "You have successfully deleted this record";
            header('location: '.$viewUrl) ;
        }
        else{
             $_SESSION['errorMessage'] = "Error occurred Try again.";
            header('location: '.$viewUrl) ;
        }

    }
}

