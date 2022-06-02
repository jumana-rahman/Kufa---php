<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_about = "UPDATE abouts SET status=0 WHERE id=$id";
$update_about_result = mysqli_query($db_connect, $update_about);

$_SESSION['about_restore'] = "User Restored!";
header('location:about_trash.php');

?>