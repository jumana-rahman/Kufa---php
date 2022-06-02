<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$delete_icons = "DELETE FROM icons WHERE id=$id";
$delete_icons_result = mysqli_query($db_connect, $delete_icons);

$_SESSION['delete_icon'] = "Icon has been deleted! ";
header('location:icon_trash.php');
?>