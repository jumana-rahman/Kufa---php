<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$delete_educations = "DELETE FROM educations WHERE id=$id";
$delete_educations_result = mysqli_query($db_connect, $delete_educations);

$_SESSION['delete_edu'] = "Education has been deleted! ";
header('location:education_trash.php');
?>