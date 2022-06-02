<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_educations = "UPDATE educations SET status=1 WHERE id=$id";
$update_educations_result = mysqli_query($db_connect, $update_educations);

$_SESSION['soft_del_edu'] = "Education Soft Deleted!";
header('location:/kufa/educations/educations.php');

?>