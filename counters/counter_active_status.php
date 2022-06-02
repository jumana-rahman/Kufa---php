<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_counters = "SELECT * FROM counters WHERE id=$id";
$select_counters_result = mysqli_query($db_connect, $select_counters);
$after_assoc_counters = mysqli_fetch_assoc($select_counters_result);


if($after_assoc_counters['active_status'] == 1){
    $update_status = "UPDATE counters SET active_status=0 WHERE id=$id";
    $update_status_result = mysqli_query($db_connect, $update_status);
    header('location:counters.php');
}
else{
    $count_counters = "SELECT COUNT(*) as total_active FROM counters WHERE active_status=1";
    $count_counters_result = mysqli_query($db_connect, $count_counters);
    $after_count_assoc = mysqli_fetch_assoc($count_counters_result);
    if($after_count_assoc['total_active'] == 4){
        $_SESSION['limit'] = 'You cannot use more than 4 files';
        header('location:counters.php');
    }
    else{
        $update_status = "UPDATE counters SET active_status=1 WHERE id=$id";
        $update_status_result = mysqli_query($db_connect, $update_status);
        header('location:counters.php');
    }  
}
?>