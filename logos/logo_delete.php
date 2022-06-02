<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM logos WHERE id=$id";
$select_img_result = mysqli_query($db_connect, $select_img);
$after_assoc = mysqli_fetch_assoc($select_img_result);

$delete_from = '../uploads/logos/'. $after_assoc['logo'];
unlink($delete_from);

$delete_logos = "DELETE FROM logos WHERE id=$id";
$delete_logos_result = mysqli_query($db_connect, $delete_logos);

$_SESSION['delete_logo'] = "Logo has been deleted! ";
header('location:logo_trash.php');
?>