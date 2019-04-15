<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 06-Jan-19
 * Time: 6:06 PM
 */
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: login.php");
    exit;
}