<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$delete_menus = "DELETE FROM menus WHERE id=$id";
$delete_menus_result = mysqli_query($db_connect, $delete_menus);

$_SESSION['delete_menu'] = "Menu has been deleted! ";
header('location:menu_trash.php');
?>