<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_work = "UPDATE works SET status=0 WHERE id=$id";
$update_work_result = mysqli_query($db_connect, $update_work);

$_SESSION['work_restore'] = "Work Restored!";
header('location:work_trash.php');

?>