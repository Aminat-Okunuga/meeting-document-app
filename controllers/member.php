<?php
session_start();
include_once '../front_constants.php';
include_once '../auto_load.php';

//for member registration
if (isset($_POST['register'])) {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $firstName = test_input($_POST['fname']);
    $lastName = test_input($_POST['lname']);
    $otherName = test_input($_POST['oname']);
    $department = test_input($_POST['department']);
    $rank = test_input($_POST['rank']);
    $college = test_input($_POST['college']);
    $positionId = test_input($_POST['position']);
    $phone = test_input($_POST['phone']);
    $email = test_input($_POST['email']);

    if (empty($_POST['fname'])) {
        $_SESSION['errorMessage'] = "Firstname field required";
        header('location: ../registration.php');
    }
    if (empty($_POST['username'])) {
        $_SESSION['errorMessage'] = "Username field required";
        header('location: ../registration.php');
    }
    if (empty($_POST['password'])) {
        $_SESSION['errorMessage'] = "Password field required";
        header('location: ../registration.php');
    }
    if (empty($_POST['lname'])) {
        $_SESSION['errorMessage'] = "Last name field required";
        header('location: ../registration.php');
    }
    if (empty($_POST['oname'])) {
        $_SESSION['errorMessage'] = "Other name field required";
        header('location: ../registration.php');
    } else if (empty($_POST['position'])) {
        $_SESSION['errorMessage'] = "Position field required";
        header('location: ../registration.php');

    } else if (empty($_POST['college'])) {
        $_SESSION['errorMessage'] = "College field required";
        header('location: ../registration.php');

    } else if (empty($_POST['department']) || empty($_POST['rank']) || empty($_POST['phone']) || empty($_POST['email'])) {
        $_SESSION['errorMessage'] = "Input Field required";
//        header('location: ../registration.php?msg='.$msg);
        header('location: ../registration.php');
    } else {
        if ($member->addMember($username, $password, $firstName, $otherName, $lastName, $department,$college, $positionId, $rank,
            $phone, $email, $memberStatus)) {
//            $memberStatus =
            if($member->signInMember($username, $password, $email, $memberStatus)){
                $_SESSION['user_id'] = $member->getId();
                if($position->setPosition($member->getPositionId())){
                    include_once 'function.php';
                    authenticateUser($position, $loginPageUrl);
                }else{
                    $_SESSION['errorMessage'] = "Invalid login details";
                    header('location: '.$loginPageUrl);
                }
            }
        } else {
            $_SESSION['errorMessage'] = "Sorry Try Again";
            header('location: ../registration.php');
        }
    }
}

