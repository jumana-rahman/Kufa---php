<?php 
session_start();
unset($_SESSION['login']);
$_SESSION['logged_out'] = 'Logged Out';
header('location:login.php');
?>