<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_counter = "UPDATE counters SET status=0 WHERE id=$id";
$update_counter_result = mysqli_query($db_connect, $update_counter);

$_SESSION['counter_restore'] = "Counter Restored!";
header('location:counter_trash.php');

?>