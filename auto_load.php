<?php
include_once 'models/Database.php';
include_once 'models/College.php';
include_once 'models/Department.php';
include_once 'models/Document.php';
include_once 'models/Member.php';
include_once 'models/Meeting.php';
include_once 'models/Rank.php';
include_once 'models/Position.php';
include_once 'models/Pages.php';

$conn = new Database();
$college = new College();
$department = new Department();
$member = new Member();
$meeting = new Meeting();
$document = new Document();
$rank = new Rank();
$position = new Position();
$pages = new Pages();


//path for uploaded documents
define("DOCUMENT_UPLOAD", "admin/assets/document/");

//path for documents uploaded by admin
define("ADMIN_DOCUMENT_UPLOAD", "assets/document/");

//path for documents uploaded by admin to be downloaded by users
define("ADMIN_DOCUMENT_UPLOADS", "admin/assets/document/");


//function that does security checks on form input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>