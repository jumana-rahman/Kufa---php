<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_POST['id'];

$counter_icon = $_POST['counter_icon'];
$counter_num = $_POST['counter_num'];
$counter_title = $_POST['counter_title'];

$update_counter = "UPDATE counters SET counter_icon='$counter_icon', counter_num='$counter_num', counter_title='$counter_title' WHERE id=$id";
$update_counter_result = mysqli_query($db_connect, $update_counter);

$_SESSION['update_counter'] = 'Counter Updated!';
header('location:counter_edit.php?id='.$id);

?>