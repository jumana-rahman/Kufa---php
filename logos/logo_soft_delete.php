<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_logo = "UPDATE logos SET status=1 WHERE id=$id";
$update_logo_result = mysqli_query($db_connect, $update_logo);

$_SESSION['logo_soft_del'] = "Logo Soft Deleted!";
header('location:/kufa/logos/logos.php');

?>