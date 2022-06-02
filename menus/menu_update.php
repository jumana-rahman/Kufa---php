<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_POST['id'];
$menu_name = $_POST['menu_name'];
$menu_link = $_POST['menu_link'];
    
$update_menu = "UPDATE menus SET menu_name='$menu_name', menu_link='$menu_link' WHERE id=$id";
$update_menu_result = mysqli_query($db_connect, $update_menu);

$_SESSION['update_menu'] = 'Menu Updated!';
header('location:menu_edit.php?id='.$id);
?>