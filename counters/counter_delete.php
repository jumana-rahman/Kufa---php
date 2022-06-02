<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$delete_counters = "DELETE FROM counters WHERE id=$id";
$delete_counters_result = mysqli_query($db_connect, $delete_counters);

$_SESSION['delete_counter'] = "Counter has been deleted! ";
header('location:counter_trash.php');
?>