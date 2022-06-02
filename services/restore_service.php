<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_service = "UPDATE services SET status=0 WHERE id=$id";
$update_service_result = mysqli_query($db_connect, $update_service);

$_SESSION['restore_service'] = "Service Restored!";
header('location:service_trash.php');

?>