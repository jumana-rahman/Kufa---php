<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_icon = "UPDATE icons SET status=1 WHERE id=$id";
$update_user_result = mysqli_query($db_connect, $update_icon);

$_SESSION['soft_del_icon'] = "User Soft Deleted!";
header('location:/kufa/banner_icon/icons.php');

?>