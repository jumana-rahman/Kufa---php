<?php
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_about = "SELECT * FROM abouts WHERE id=$id";
$select_about_result = mysqli_query($db_connect, $select_about);
$after_assoc_about = mysqli_fetch_assoc($select_about_result);


if($after_assoc_about['active_status'] == 1){
    $update_status = "UPDATE abouts SET active_status=0 WHERE id=$id";
    $update_status_result = mysqli_query($db_connect, $update_status);
    header('location:about.php');
}
else{
    $update_status1 = "UPDATE abouts SET active_status=0";
    $update_status_result1 = mysqli_query($db_connect, $update_status1);

    $update_status = "UPDATE abouts SET active_status=1 WHERE id=$id";
    $update_status_result = mysqli_query($db_connect, $update_status);
    header('location:about.php');
}



?>