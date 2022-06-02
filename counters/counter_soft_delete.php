<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_counter = "UPDATE counters SET status=1 WHERE id=$id";
$update_counter_result = mysqli_query($db_connect, $update_counter);

$_SESSION['counter_soft_del'] = "Counter Soft Deleted!";
header('location:/kufa/counters/counters.php');

?>