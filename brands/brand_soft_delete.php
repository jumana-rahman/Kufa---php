<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_brand = "UPDATE brands SET status=1 WHERE id=$id";
$update_brand_result = mysqli_query($db_connect, $update_brand);

$_SESSION['brand_soft_del'] = "Brand Soft Deleted!";
header('location:/kufa/brands/brands.php');

?>