<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_menu = "UPDATE menus SET status=0 WHERE id=$id";
$update_menu_result = mysqli_query($db_connect, $update_menu);

$_SESSION['menu_restore'] = "Menu Restored!";
header('location:menu_trash.php');

?>