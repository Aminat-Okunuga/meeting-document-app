<?php
session_start();
include_once "../auto_load.php";
include_once "../front_constants.php";
$url = '../';
$colDocument = $url . COLLEGE_DOCUMENTS;
$preDocument = $url . DOCUMENTS;

//FOR MEETING DOCUMENT
if (isset($_GET['college'])) {
    if (empty($_GET['college'])) {
        header('location: ' . $preDocument);
    } else {
        header("location: ".$colDocument."?id=".$_GET['college']);
        //echo $_GET['meeting'];
    }
}

if (isset($_GET['collegeId'])) {
    if (empty($_GET['collegeId'])) {
        header('location: ' . $preDocument);
    } else {
        header("location: ".$colDocument."?id=".$_GET['collegeId']);
        //echo $_GET['meeting'];
    }
}


?>