<?php
session_start();

if (isset($_GET['edit_id'])) {
	if(empty($_GET['edit_id'])){
		header('location: ../Admin/lecturers.php');
	}else{
		header('location: ../Admin/edit-lecturer.php') ;
	}
}

if (isset($_POST['update'])) {
	if(empty($_POST['name'])){
	    $_SESSION['errorMessage'] = "Input Field required";
	    header('location: ../Admin/edit-lecturer.php') ;
	}else{
	    $_SESSION['successMessage'] = "Update successful";
	    header('location: ../Admin/lecturers.php') ;
	}
  
}

if (isset($_POST['add'])) {
	if(empty($_POST['name'])){
	    $_SESSION['errorMessage'] = "Input Field required";
	    header('location: ../Admin/add-lecturer.php') ;
	}
	if(empty($_POST['rank'])){
	    $_SESSION['errorMessage'] = "Input Field required";
	    header('location: ../Admin/add-lecturer.php') ;
	}
	if(empty($_POST['gender'])){
	    $_SESSION['errorMessage'] = "Input Field required";
	    header('location: ../Admin/add-lecturer.php') ;
	}else{
	    $_SESSION['successMessage'] = "You have successfully added a new lecturer";
	    header('location: ../Admin/lecturers.php') ;
	}
  
}

if (isset($_GET['delete_id'])) {
	if(empty($_GET['delete_id'])){
	    // $_SESSION['errorMessage'] = "Your record is still intact";
	    header('location: ../Admin/lecturers.php') ;
	}else{
	    $_SESSION['successMessage'] = "You have successfully deleted this record";
	    header('location: ../Admin/lecturers.php') ;
	}
  
}

