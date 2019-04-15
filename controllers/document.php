<?php
/**
* Created by PhpStorm.
* User: HP
* Date: 08-Apr-19
* Time: 8:19 AM
*/


session_start();
include_once "../auto_load.php";
include_once "../front_constants.php";
$url = '../';
$viewUrl = $url .'user-uploaded-documents.php';

if (isset($_GET['delete_id'])) {
    if(empty($_GET['delete_id'])){
        $_SESSION['errorMessage'] = "Your record is still intact";
        header("location: ".$viewUrl) ;
    }else{
        $id= $_GET['delete_id'];
        $documentStatus = 3;
        // Using the method document model
        if ($document->deleteUserDocument($id, $documentStatus)) {
            $_SESSION['successMessage'] = "You have successfully deleted this document";
            header('location: '.$viewUrl) ;
        }
        else{
            $_SESSION['errorMessage'] = "Error occurred Try again.";
            header('location: '.$viewUrl) ;
        }

    }
}