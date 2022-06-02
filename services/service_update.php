<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_POST['id'];
$icon = $_POST['icon'];
$service_title = $_POST['service_title'];
$service_description = $_POST['service_description'];

$update_service = "UPDATE services SET icon='$icon', service_title='$service_title', service_description='$service_description' WHERE id=$id";
$update_service_result = mysqli_query($db_connect, $update_service);
    
$_SESSION['update_service'] = 'Service Updated!';
header('location:service_edit.php?id='.$id);