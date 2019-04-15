<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 07-Jan-19
 * Time: 5:00 PM
 */

session_start();
if(!isset($_SESSION['user_id'])){
    header("location: ../login.php");
    exit;
}
?>