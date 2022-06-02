<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_logo = "UPDATE logos SET status=0 WHERE id=$id";
$update_logo_result = mysqli_query($db_connect, $update_logo);

$_SESSION['logo_restore'] = "Logo Restored!";
header('location:logo_trash.php');

?>