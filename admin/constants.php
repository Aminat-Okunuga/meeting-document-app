<?php
//These are constants used in the project
define("SIDEBAR","layout/sidebar.php");
define("FOOTER","layout/standardfooter.php");
define("HEADER","layout/standardheader.php");
define("CSS","layout/css_files.php");
define("JS","layout/js_files.php");
define("JSDELETE","assets/js/ConfirmDelete.js");

//FRONT END CONSTANTS
define("USERDASHBOARDCSS", "admin/layout/css_files.php");
define("USERDASHBOARDJS","admin/layout/js_files.php");
define("USERDASHBOARDFOOTER","admin/layout/standardfooter.php");
define("USERDASHBOARDHEADER","admin/layout/standardheader.php");
define("USERDASHBOARDSIDEBAR","admin/layout/sidebar.php");

//all college routing
define("VIEW_COLLEGES","view-colleges.php");
define("ADD_COLLEGE","add-college.php");
define("EDIT_COLLEGE","edit-college.php");

//all document routing
define("VIEW_DOCUMENTS","view-documents.php");
define("UPLOAD_DOCUMENT","upload-document.php");
define("APPROVED_DOCUMENTS","approved-documents.php");
define("DISAPPROVED_DOCUMENTS","disapproved-documents.php");
define("PENDING_DOCUMENTS","pending-documents.php");

//all meeting routing
define("VIEW_MEETINGS","view-meetings.php");
define("ADD_MEETING","add-meeting.php");
define("EDIT_MEETING","edit-meeting.php");

//all department routing
define("VIEW_DEPARTMENTS","view-departments.php");
define("ADD_DEPARTMENT","add-department.php");
define("EDIT_DEPARTMENT","edit-department.php");

//all member routing
define("VIEW_MEMBERS","view-members.php");
define("ADD_MEMBER","add-member.php");
define("EDIT_MEMBER","edit-member.php");

//all rank routing
define("VIEW_RANKS","view-ranks.php");
define("ADD_RANK","add-rank.php");
define("EDIT_RANK","edit-rank.php");

//all mail routing
define("SEND_MAIL","compose-mail.php");

//all position routing
define("VIEW_POSITIONS","view-positions.php");
define("ADD_POSITION","add-position.php");
define("EDIT_POSITION","edit-position.php");

//controllers
define("COLLEGE_CONTROLLER","controllers/colleges.php");
define("DEPARTMENT_CONTROLLER","controllers/departments.php");
define("DOCUMENT_CONTROLLER","controllers/documents.php");
define("MEETING_CONTROLLER","controllers/meeting.php");
define("MEMBER_CONTROLLER","controllers/member.php");
define("RANK_CONTROLLER","controllers/rank.php");
define("POSITION_CONTROLLER","controllers/position.php");