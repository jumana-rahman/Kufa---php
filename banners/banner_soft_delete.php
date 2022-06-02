<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_banner = "UPDATE banners SET state=1 WHERE id=$id";
$update_banner_result = mysqli_query($db_connect, $update_banner);

$_SESSION['ban_soft_del'] = "Banner Soft Deleted!";
header('location:/kufa/banners/banners.php');

?>