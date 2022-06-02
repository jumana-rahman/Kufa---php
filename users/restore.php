<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_user = "UPDATE users SET status=0 WHERE id=$id";
$update_user_result = mysqli_query($db_connect, $update_user);

$_SESSION['restore'] = "User Restored!";
header('location:trash.php');

?>