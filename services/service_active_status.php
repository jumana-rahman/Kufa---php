<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_services = "SELECT * FROM services WHERE id=$id";
$select_services_result = mysqli_query($db_connect, $select_services);
$after_assoc_services = mysqli_fetch_assoc($select_services_result);


if($after_assoc_services['active_status'] == 1){
    $update_status = "UPDATE services SET active_status=0 WHERE id=$id";
    $update_status_result = mysqli_query($db_connect, $update_status);
    header('location:services.php');
}
else{
    $count_services = "SELECT COUNT(*) as total_active FROM services WHERE active_status=1";
    $count_services_result = mysqli_query($db_connect, $count_services);
    $after_count_assoc = mysqli_fetch_assoc($count_services_result);
    if($after_count_assoc['total_active'] == 6){
        $_SESSION['limit'] = 'You cannot use more than 6 files';
        header('location:services.php');
    }
    else{
        $update_status = "UPDATE services SET active_status=1 WHERE id=$id";
        $update_status_result = mysqli_query($db_connect, $update_status);
        header('location:services.php');
    }  
}
?>