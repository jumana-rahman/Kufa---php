<?php
session_start();
require '../session_check.php';
require '../db.php';

$icon_name = $_POST['icon_name'];
$icon_class = $_POST['icon_class'];
$icon_link = $_POST['icon_link'];
$user_id = $_POST['user_id'];

$insert_icons = "INSERT INTO icons(icon_name, icon_class, icon_link,user_id)VALUES('$icon_name', '$icon_class', '$icon_link','$user_id')";
$insert_icons_result = mysqli_query($db_connect, $insert_icons);
$_SESSION['icon_added'] = 'Icon Added!';
header('location:add_icon.php');

?>