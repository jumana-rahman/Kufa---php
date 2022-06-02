<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_icon = "UPDATE icons SET status=0 WHERE id=$id";
$update_icon_result = mysqli_query($db_connect, $update_icon);

$_SESSION['restore_icon'] = "Icon Restored!";
header('location:icon_trash.php');

?>