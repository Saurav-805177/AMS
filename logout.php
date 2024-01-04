<?php 
ob_start();
session_start();
include 'admin/inc/config.php';
unset($_SESSION['student']);
header("location: ".BASE_URL.'login.php'); 
?>