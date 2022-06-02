<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_testimonial = "UPDATE testimonials SET status=1 WHERE id=$id";
$update_testimonial_result = mysqli_query($db_connect, $update_testimonial);

$_SESSION['test_soft_del'] = "Testimonial Soft Deleted!";
header('location:/kufa/testimonials/testimonials.php');

?>