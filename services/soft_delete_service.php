<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_services = "UPDATE services SET status=1 WHERE id=$id";
$update_services_result = mysqli_query($db_connect, $update_services);

$_SESSION['soft_del_service'] = "Service Soft Deleted!";
header('location:/kufa/services/services.php');

?>