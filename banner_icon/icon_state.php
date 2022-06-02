<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_icons = "SELECT * FROM icons WHERE id=$id";
$select_icons_result = mysqli_query($db_connect, $select_icons);
$after_assoc = mysqli_fetch_assoc($select_icons_result);


if($after_assoc['state'] == 1){
    $update_state = "UPDATE icons SET state=0 WHERE id=$id";
    $update_state_result = mysqli_query($db_connect, $update_state);
    header('location:icons.php');
}
else{
    $count_icons = "SELECT COUNT(*) as total_active FROM icons WHERE state=1";
    $count_icons_result = mysqli_query($db_connect, $count_icons);
    $after_count_assoc = mysqli_fetch_assoc($count_icons_result);
    if($after_count_assoc['total_active'] == 4){
        $_SESSION['limit'] = 'You cannot use more than 4 icons';
        header('location:icons.php');
    }
    else{
        $update_icons = "UPDATE icons SET state=1 WHERE id=$id";
        $update_icons_result = mysqli_query($db_connect, $update_icons);
        header('location:icons.php');
    }

    
}
?>