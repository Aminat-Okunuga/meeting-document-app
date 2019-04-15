<?php
session_start();
include_once "../../auto_load.php";
include_once "../constants.php";
$url = "../";
$viewUrl = $url . VIEW_DOCUMENTS;
$pendingUrl = $url . PENDING_DOCUMENTS;
$addUrl = $url . UPLOAD_DOCUMENT;
$approveUrl = $url . APPROVED_DOCUMENTS;
$disapproveUrl = $url . DISAPPROVED_DOCUMENTS;


//FOR APPROVAL
if (isset($_GET['approve'])) {
    if (empty($_GET['approve'])) {
        header('location: ' . $viewUrl);
    } else {
        header("location: " . $approveUrl . "?id=" . $_GET['approve']);
        $documentId = $_GET['approve'];
        $documentStatus = 1;

        if ($document->approveDocument($documentId, $documentStatus)) {
            $_SESSION['successMessage'] = "Document has successfully been approved";
            header('location: ' . $viewUrl);
        } else {
            $_SESSION['errorMessage'] = "Oops!!! Sorry Try Again";
            header('location: ' . $viewUrl . "?id=" . $_GET['approve']);
        }
    }
}

//FOR DISAPPROVAL
if (isset($_GET['disapprove'])) {
    if (empty($_GET['disapprove'])) {
        header('location: ' . $viewUrl);
    } else {
        header("location: " . $disapproveUrl . "?id=" . $_GET['disapprove']);
        $documentId = $_GET['disapprove'];
        $documentStatus = 2;

        if ($document->disapproveDocument($documentId, $documentStatus)) {
            $_SESSION['errorMessage'] = "Document has been disapproved";
            header('location: ' . $viewUrl);
        } else {
            $_SESSION['errorMessage'] = "Oops!!! Sorry Try Again";
            header('location: ' . $viewUrl . "?id=" . $_GET['disapprove']);
        }
    }
}


//FOR DELETE
if (isset($_GET['delete_id'])) {
    if(empty($_GET['delete_id'])){
        $_SESSION['errorMessage'] = "Your record is still intact";
        header("location: ".$viewUrl) ;
    }else{
        $id=$_GET['delete_id'];
        // Using the method document model
        if ($document->deleteDocument($id)) {
            $_SESSION['successMessage'] = "You have successfully deleted this document";
            header('location: '.$viewUrl) ;
        }
        else{
            $_SESSION['errorMessage'] = "Error occurred Try again.";
            header('location: '.$viewUrl) ;
        }
    }
}

//FOR DELETE
if (isset($_GET['delete'])) {
    if(empty($_GET['delete'])){
        $_SESSION['errorMessage'] = "Your record is still intact";
        header("location: ../user-uploaded-documents.php") ;
    }else{
        $id=$_GET['delete_id'];
        // Using the method document model
        if ($document->deleteUserDocument($id)) {
            $_SESSION['successMessage'] = "You have successfully deleted this document";
            header('location: ../user-uploaded-documents.php') ;
        }
        else{
            $_SESSION['errorMessage'] = "Error occurred Try again.";
            header('location: ../user-uploaded-documents.php') ;
        }
    }
}

