<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_banner = "UPDATE banners SET state=0 WHERE id=$id";
$update_user_result = mysqli_query($db_connect, $update_banner);

$_SESSION['banner_restore'] = "User Restored!";
header('location:banner_trash.php');

?>