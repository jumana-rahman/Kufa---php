<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_works = "SELECT * FROM works WHERE id=$id";
$select_works_result = mysqli_query($db_connect, $select_works);
$after_assoc_works = mysqli_fetch_assoc($select_works_result);


if($after_assoc_works['active_status'] == 1){
    $update_status = "UPDATE works SET active_status=0 WHERE id=$id";
    $update_status_result = mysqli_query($db_connect, $update_status);
    header('location:works.php');
}
else{
    $count_works = "SELECT COUNT(*) as total_active FROM works WHERE active_status=1";
    $count_works_result = mysqli_query($db_connect, $count_works);
    $after_count_assoc = mysqli_fetch_assoc($count_works_result);
    if($after_count_assoc['total_active'] == 6){
        $_SESSION['limit'] = 'You cannot use more than 6 files';
        header('location:works.php');
    }
    else{
        $update_status = "UPDATE works SET active_status=1 WHERE id=$id";
        $update_status_result = mysqli_query($db_connect, $update_status);
        header('location:works.php');
    }  
}
?>