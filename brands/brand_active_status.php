<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_brands = "SELECT * FROM brands WHERE id=$id";
$select_brands_result = mysqli_query($db_connect, $select_brands);
$after_assoc_brands = mysqli_fetch_assoc($select_brands_result);


if($after_assoc_brands['active_status'] == 1){
    $update_status = "UPDATE brands SET active_status=0 WHERE id=$id";
    $update_status_result = mysqli_query($db_connect, $update_status);
    header('location:brands.php');
}
else{
    $count_brands = "SELECT COUNT(*) as total_active FROM brands WHERE active_status=1";
    $count_brands_result = mysqli_query($db_connect, $count_brands);
    $after_count_assoc = mysqli_fetch_assoc($count_brands_result);
    if($after_count_assoc['total_active'] == 5){
        $_SESSION['limit'] = 'You cannot use more than 5 files';
        header('location:brands.php');
    }
    else{
        $update_status = "UPDATE brands SET active_status=1 WHERE id=$id";
        $update_status_result = mysqli_query($db_connect, $update_status);
        header('location:brands.php');
    }  
}
?>