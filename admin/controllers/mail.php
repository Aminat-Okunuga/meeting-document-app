<?php
session_start();
include_once "../../auto_load.php";
include_once "../constants.php";
$url ="../";
$send_mail = $url.SEND_MAIL;


//$to = "makadeaminat@gmail.com";
//$subject = "My subject";
//$txt = "Hello world!";
//$headers = "From: webmaster@example.com" . "\r\n" .
//    "CC: somebodyelse@example.com";

//mail($to,$subject,$txt,$headers);

if (isset($_POST['send'])) {
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $headers = "From: webmaster@example.com" . "\r\n" .
        "CC: somebodyelse@example.com";
    if (empty($_POST['to'])) {
        $_SESSION['errorMessage'] = "To field required";
        header('location:' . $send_mail);
    }
    if (empty($_POST['subject'])) {
        $_SESSION['errorMessage'] = "Subject field required";
        header('location:' . $send_mail);
    }
    if (empty($_POST['body'])) {
        $_SESSION['errorMessage'] = "Body field required";
        header('location:' . $send_mail);
    }else {
        mail($to,$subject,$body,$headers);
        $_SESSION['successMessage'] = "Mail sent successfully" ;
        header('location:' . $send_mail);
    }
}


