<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_img = "SELECT * FROM testimonials WHERE id=$id";
$select_img_result = mysqli_query($db_connect, $select_img);
$after_assoc = mysqli_fetch_assoc($select_img_result);

$delete_from = '../uploads/testimonials/'. $after_assoc['photo'];
unlink($delete_from);

$delete_testimonials = "DELETE FROM testimonials WHERE id=$id";
$delete_testimonials_result = mysqli_query($db_connect, $delete_testimonials);

$_SESSION['delete_testimonial'] = "Testimonial has been deleted! ";
header('location:testimonial_trash.php');
?>