<?php
session_start();
include_once "../auto_load.php";
include_once "../front_constants.php";
$url = '../';
$meetingPageUrl = $url . MEETING_PAGE;
$loginPageUrl = $url . LOGIN_URL;


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['username'];

    if (empty($_POST['username'])) {
        $_SESSION['errorMessage'] = "Email/Username field required";
        header('location: '.$loginPageUrl);
    }
    if (empty($_POST['password'])) {
        $_SESSION['errorMessage'] = "Password field required";
        header('location: '.$loginPageUrl);
    }
    else {
        $memberStatus = $member->getMemberStatus();
        if ($memberStatus == 1){
            if($member->signInMember($username, $password, $email, $memberStatus)){
                $_SESSION['user_id'] = $member->getId();
                if($position->setPosition($member->getPositionId())){
                    include_once 'function.php';
                    authenticateUser($position, $loginPageUrl);
                }else{
                    $_SESSION['errorMessage'] = "Invalid login details";
                    header('location: '.$loginPageUrl);
                }
            }else{
                $_SESSION['errorMessage'] = "Invalid login details";
                header('location: '.$loginPageUrl);
            }
        }
        else{
            $_SESSION['errorMessage'] = "You are not a registered member. Kindly contact the Registrar";
            header('location: '.$loginPageUrl);
        }
    }
}


?>