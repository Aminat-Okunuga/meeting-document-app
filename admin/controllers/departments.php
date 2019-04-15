<?php
session_start();
include_once "../../auto_load.php";
include_once "../constants.php";
$url = "../";
$viewUrl = $url . VIEW_DEPARTMENTS;
$editUrl = $url . EDIT_DEPARTMENT;
$addUrl = $url . ADD_DEPARTMENT;

if (isset($_GET['edit_id'])) {
    if (empty($_GET['edit_id'])) {
        header('location: ' . $viewUrl);
    } else {
        header("location: ".$editUrl."?id=".$_GET['edit_id']);
    }
}

if (isset($_POST['update'])) {
    //deptId, deptName,collegId,and profilePath goes to the department table
    //deptId,lecturerId(as HOD) will be added to the hod's table

//    print_r($_POST);exit;
    $departmentId = $_POST['id'];
    $departmentName = $_POST['name'];
    $collegeId = $_POST['college'];
//    $departmentHod = $_POST['hod'];
    if (empty($_POST['name'])) {
        $_SESSION['errorMessage'] = "Input Field required";
        header('location:'.$editUrl."?id=".$departmentId);
    }
    if (empty($_POST['id'])) {
        $_SESSION['errorMessage'] = "";
        header('location:'.$editUrl."?id=".$departmentId);
    } else {


//        $profilePath = $_FILES['profile']['name'];
//        $profileSize = $_FILES['profile']['size'];
//        $profileTemp = $_FILES['profile']['temp_name'];
//
////        print_r($_POST);exit;
//
//        //track the valid image
//        $ext = array("png", "jpg", "jpeg", "gif");
//        //break the filename to an array
//        $fileExt = explode(".", $profilePath);
//
//        //convert the last value in the $fileExt array to lower case
//        $extension = strtolower(end($fileExt));
//
//        if (!in_array($extension, $ext)) {
//            $_SESSION['errorMessage'] = "Select A valid image type";
//            header('location: ' . $addUrl);
//        } else {
//            move_uploaded_file($profileTemp, IMAGE_UPLOAD . "department");

            if ($department->updateDepartment($departmentId, $collegeId, $departmentName)) {
//                if ($departmentHod != ""){
//                    if($hod->updateHod($departmentId)){
//                        $hod->addHod($departmentHod,$departmentId);
//                    }
//                }

                $_SESSION['successMessage'] = "Update Successful";
                header('location: ' . $viewUrl);
            } else {
                $_SESSION['errorMessage'] = "Oops!!! Sorry Try Again";
                header('location: ' . $editUrl . "?id=" . $departmentId);
            }
        }
//    }
}


if (isset($_POST['add'])) {

    if (empty($_POST['name'])) {
        $_SESSION['errorMessage'] = "Input Fields required";
        header('location:' . $addUrl);
    }
    if (empty($_POST['college'])) {
        $_SESSION['errorMessage'] = "Input Fields required";
        header('location:' . $addUrl);
    } else {
//        $profilePath = $_FILES['profile']['name'];
//        $profileSize = $_FILES['profile']['size'];
//        $profileTemp = $_FILES['profile']['temp_name'];
//
//        //track the valid image
//        $ext = array("png", "jpg", "jpeg", "gif");
//        //break the filename to anarray
//        $fileExt = explode(".", $profilePath);
//
//        //convert the last value in the $fileExt array to lower case
//        $extension = strtolower(end($fileExt));

//        if (!in_array($extension, $ext)) {
//            $_SESSION['errorMessage'] = "Select A valid image type";
//            header('location: ' . $addUrl);
//        } else {
//            move_uploaded_file($profileTemp, IMAGE_UPLOAD . "department");

            $departmentName = $_POST['name'];
            $college = $_POST['college'];
            if ($department->addDepartment($departmentName, $college)) {
                $_SESSION['successMessage'] = "Department successfully added";
            } else {
                $_SESSION['errorMessage'] = "Oops!!! Sorry Try Again";
            }
            header('location: ' . $viewUrl);
        }
   // }
}
if (isset($_GET['delete_id'])) {
    if (empty($_GET['delete_id'])) {
        $_SESSION['errorMessage'] = "Your record is still intact";
        header("location: " . $viewUrl);
    } else {
        $id = $_GET['delete_id'];
        // Using the method in department model
        if ($department->deleteDepartment($id)) {
            $_SESSION['successMessage'] = "You have successfully deleted this record";
            header('location: ' . $viewUrl);
        } else {
            $_SESSION['errorMessage'] = "Error... Try again.";
            header('location: ' . $viewUrl);
        }

    }
}

