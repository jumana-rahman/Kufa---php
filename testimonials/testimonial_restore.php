<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_testimonial = "UPDATE testimonials SET status=0 WHERE id=$id";
$update_testimonial_result = mysqli_query($db_connect, $update_testimonial);

$_SESSION['testimonial_restore'] = "Testimonial Restored!";
header('location:testimonial_trash.php');

?>