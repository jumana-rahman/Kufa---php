<?php
session_start();
require '../session_check.php';
require '../db.php';

$counter_icon = $_POST['counter_icon'];
$counter_num = $_POST['counter_num'];
$counter_title = $_POST['counter_title'];


$insert_counter = "INSERT INTO counters(counter_icon, counter_num, counter_title)VALUES('$counter_icon', '$counter_num', '$counter_title')";
$insert_counter_result = mysqli_query($db_connect, $insert_counter);

$_SESSION['success'] = 'Counter Added Successfully!';
header('location:add_counter.php');
?>