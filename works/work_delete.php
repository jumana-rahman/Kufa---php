<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM works WHERE id=$id";
$select_img_result = mysqli_query($db_connect, $select_img);
$after_assoc = mysqli_fetch_assoc($select_img_result);

$delete_from = '../uploads/works/'. $after_assoc['image'];
unlink($delete_from);

$delete_works = "DELETE FROM works WHERE id=$id";
$delete_works_result = mysqli_query($db_connect, $delete_works);

$_SESSION['delete_work'] = "Work has been deleted! ";
header('location:work_trash.php');
?>