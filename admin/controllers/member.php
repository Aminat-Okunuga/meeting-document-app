<?php
session_start();
include_once "../../auto_load.php";
include_once "../constants.php";
$url = "../";
$viewUrl = $url . VIEW_MEMBERS;
$editUrl = $url . EDIT_MEMBER;
$addUrl = $url . ADD_MEMBER;

if (isset($_GET['edit_id'])) {
    if (empty($_GET['edit_id'])) {
        header('location: ' . $viewUrl);
    } else {
        header("location: " . $editUrl . "?id=" . $_GET['edit_id']);
    }
}

//for update
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['fname'];
    $otherName = $_POST['oname'];
    $lastName = $_POST['sname'];
    $collegeName = $_POST['college'];
    $departmentName = $_POST['department'];
    $rank = $_POST['rank'];
    $position = $_POST['position'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $memberId = $_POST['id'];

    if (empty($_POST['fname'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $editUrl . "?id=" . $memberId );
    } else if (empty($_POST['oname'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $editUrl . "?id=" . $memberId );
    } else if (empty($_POST['username'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $editUrl . "?id=" . $memberId );
    } else if (empty($_POST['password'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $editUrl . "?id=" . $memberId );
    } else if (empty($_POST['sname'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $editUrl . "?id=" . $memberId );
    } else if (empty($_POST['college'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $editUrl . "?id=" . $memberId );
    } else if (empty($_POST['department'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $editUrl . "?id=" . $memberId );
    } else if (empty($_POST['rank'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $editUrl . "?id=" . $memberId );
    } else if (empty($_POST['phone'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $editUrl . "?id=" . $memberId );
    } else if (empty($_POST['position'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $editUrl . "?id=" . $memberId );
    } else if (empty($_POST['email'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $editUrl . "?id=" . $memberId );
    }

        else if ($member->updateMember($memberId, $username, $password, $firstName, $otherName, $lastName, $departmentName, $collegeName,
            $rank, $position, $phone, $email)){
                $_SESSION['successMessage'] = "Update Successful";
                header('location: ' . $viewUrl);
            } else {
                $_SESSION['errorMessage'] = "Oops!!! Sorry Try Again";
                header('location: ' . $editUrl);
            }
}

//for add
if (isset($_POST['add'])) {

    if (empty($_POST['fname'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $addUrl);
    }
    if (empty($_POST['username'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $addUrl);
    }
    if (empty($_POST['password'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $addUrl);
    }
    if (empty($_POST['sname'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $addUrl);
    }
    if (empty($_POST['oname'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location: ' . $addUrl);
    } else if (empty($_POST['position'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location:' . $addUrl);
    } else if (empty($_POST['college'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location:' . $addUrl);
    } else if (empty($_POST['department'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location:' . $addUrl);
    } else if (empty($_POST['rank'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location:' . $addUrl);
    } else if (empty($_POST['phone'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location:' . $addUrl);
    } else if (empty($_POST['email'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location:' . $addUrl);
    } else {

//            print_r($_POST);exit;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstName = $_POST['fname'];
        $lastName = $_POST['sname'];
        $otherName = $_POST['oname'];
        $department = $_POST['department'];
        $rank = $_POST['rank'];
        $college = $_POST['college'];
        $position = $_POST['position'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];


        if ($member->addMember($username, $password, $firstName, $otherName, $lastName, $department,$college, $position, $rank,
                $phone, $email)
            ) {
                $_SESSION['successMessage'] = "Member successfully added";
                header('location: ' . $viewUrl);
            } else {
                $_SESSION['errorMessage'] = " Sorry Try Again";
                header('location: ' . $addUrl);
            }
        }
//    }
}

//for delete
if (isset($_GET['delete_id'])) {
    if (empty($_GET['delete_id'])) {
        // $_SESSION['errorMessage'] = "Your record is still intact";
        header('location: ' . $viewUrl);
    } else {
        $id = $_GET['delete_id'];
        // Using the method in college model
        if ($member->deleteMember($id)) {
            $_SESSION['successMessage'] = "You have successfully deleted this record";
            header('location: ' . $viewUrl);
        } else {
            $_SESSION['errorMessage'] = "Error occurred Try again.";
            header('location: ' . $viewUrl);
        }
    }
}

