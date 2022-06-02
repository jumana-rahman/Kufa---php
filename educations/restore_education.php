<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_education = "UPDATE educations SET status=0 WHERE id=$id";
$update_education_result = mysqli_query($db_connect, $update_education);

$_SESSION['restore_edu'] = "Education Restored!";
header('location:education_trash.php');

?>