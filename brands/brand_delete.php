<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM brands WHERE id=$id";
$select_img_result = mysqli_query($db_connect, $select_img);
$after_assoc = mysqli_fetch_assoc($select_img_result);

$delete_from = '../uploads/brands/'. $after_assoc['brand_photo'];
unlink($delete_from);

$delete_brands = "DELETE FROM brands WHERE id=$id";
$delete_brands_result = mysqli_query($db_connect, $delete_brands);

$_SESSION['delete_brand'] = "Brand has been deleted! ";
header('location:brand_trash.php');
?>