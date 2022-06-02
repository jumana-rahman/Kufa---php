<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_menu = "UPDATE menus SET status=1 WHERE id=$id";
$update_menu_result = mysqli_query($db_connect, $update_menu);

$_SESSION['menu_soft_del'] = "Menu Soft Deleted!";
header('location:/kufa/menus/menus.php');

?>