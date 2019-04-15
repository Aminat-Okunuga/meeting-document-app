<?php
session_start();
include_once "../../auto_load.php";
include_once "../constants.php";
$url ="../";
$viewUrl = $url.VIEW_MEETINGS;
$editUrl = $url.EDIT_MEETING;
$addUrl = $url.ADD_MEETING;


if (isset($_GET['approve'])) {
    if (empty($_GET['approve'])) {
        header('location: ' . $viewUrl);
    } else {
        header("location: " . $approveUrl . "?id=" . $_GET['approve']);
        $meetingId = $_GET['approve'];
        $meetingStatus = 1;

        if ($meeting->approveMeeting($meetingId, $meetingStatus)) {
            $_SESSION['successMessage'] = "Meeting has successfully been approved";
            header('location: ' . $viewUrl);
        } else {
            $_SESSION['errorMessage'] = "Oops!!! Sorry Try Again";
            header('location: ' . $viewUrl . "?id=" . $_GET['approve']);
        }
    }
}

if (isset($_GET['edit_id'])) {
    if(empty($_GET['edit_id'])){
        header('location: '.$viewUrl);
    }else{
        header("location: ".$editUrl."?id=".$_GET['edit_id']) ;
    }
}

if (isset($_GET['disapprove'])) {
    if (empty($_GET['disapprove'])) {
        header('location: ' . $viewUrl);
    } else {
        header("location: " . $disapproveUrl . "?id=" . $_GET['disapprove']);
        $meetingId = $_GET['disapprove'];
        $meetingStatus = 2;

        if ($meeting->disapproveMeeting($meetingId, $meetingStatus)) {
            $_SESSION['errorMessage'] = "Meeting has been disapproved";
            header('location: ' . $viewUrl);
        } else {
            $_SESSION['errorMessage'] = "Oops!!! Sorry Try Again";
            header('location: ' . $viewUrl . "?id=" . $_GET['disapprove']);
        }
    }
}


if (isset($_POST['update'])) {
    // print_r($_POST);exit;
    $meeting_id = $_POST['meeting_id'];
    if(empty($_POST['meeting_number'])){
        $_SESSION['errorMessage'] = "Input Field required";
        header('location:'.$editUrl."?id=".$meeting_id) ;
    }
    if(empty($_POST['meeting_id'])){
        $_SESSION['errorMessage'] = "";
        header('location:'.$editUrl."?id=".$meeting_id) ;
    }else{
        $meeting_number = $_POST['meeting_number'];
        $meeting_date = $_POST['meeting_date'];
        $meeting_venue = $_POST['meeting_venue'];

        if($meeting->updateMeeting($meeting_id, $meeting_number, $meeting_date, $meeting_venue)){
            $_SESSION['successMessage'] = "Update Successful";
            header('location: '.$viewUrl) ;
        }else{
            $_SESSION['errorMessage'] = "Oops!!! Sorry Try Again";
            header('location: '.$editUrl."?id=".$meeting_id) ;
        }

    }
}


if (isset($_POST['add'])) {

    if (empty($_POST['meeting_number'])) {
        $_SESSION['errorMessage'] = "Input Fields required";
        header('location:' . $addUrl);
    } else {
        $meeting_number = $_POST['meeting_number'];
        $meeting_date = $_POST['meeting_date'];
        $meeting_venue = $_POST['meeting_venue'];
        if ($meeting->addMeeting($meeting_number, $meeting_date, $meeting_venue)) {
            $_SESSION['successMessage'] = "Meeting successfully added";
        } else {
            $_SESSION['errorMessage'] = "Oops!!! Sorry Try Again";
        }
        header('location: ' . $viewUrl);
    }
}


//FOR DELETE
if (isset($_GET['delete_id'])) {
    if(empty($_GET['delete_id'])){
        $_SESSION['errorMessage'] = "Your record is still intact";
        header("location: ".$viewUrl) ;
    }else{
        $id=$_GET['delete_id'];
        // Using the method in college model
        if ($meeting->deleteMeeting($id)) {
            $_SESSION['successMessage'] = "You have successfully deleted this record";
            header('location: '.$viewUrl) ;
        }
        else{
            $_SESSION['errorMessage'] = "Error occurred Try again.";
            header('location: '.$viewUrl) ;
        }

    }
}

