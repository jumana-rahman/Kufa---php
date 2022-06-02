<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_about = "UPDATE abouts SET status=1 WHERE id=$id";
$update_about_result = mysqli_query($db_connect, $update_about);

$_SESSION['abt_soft_del'] = "About Soft Deleted!";
header('location:/kufa/about/about.php');

?>