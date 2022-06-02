<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$delete_services = "DELETE FROM services WHERE id=$id";
$delete_services_result = mysqli_query($db_connect, $delete_services);

$_SESSION['delete_service'] = "Service has been deleted! ";
header('location:service_trash.php');
?>