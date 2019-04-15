<?php
session_start();
include_once "../auto_load.php";
include_once "../front_constants.php";
$url = '../';
$meetDocument = $url . MEETING_DOCUMENTS;
$preMeeting = $url . PREVIOUS_MEETINGS;

//FOR MEETING DOCUMENT
if (isset($_GET['meeting'])) {
    if (empty($_GET['meeting'])) {
        header('location: ' . $preMeeting);
    } else {
        header("location: ".$meetDocument."?id=".$_GET['meeting']);
        //echo $_GET['meeting'];
    }
}


//if (isset($_GET['next_meeting'])) {
//    if (empty($_GET['next_meeting'])) {
//        header('location: ' . $preDocument);
//    } else {
//        header("location: ".$colDocument."?id=".$_GET['next_meeting']);
//
//    }
//}



 ?>