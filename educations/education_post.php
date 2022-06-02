<?php
session_start();
require '../session_check.php';
require '../db.php';

$edu_year = $_POST['edu_year'];
$edu_name = $_POST['edu_name'];
$percentage = $_POST['percentage'];

$insert_edu = "INSERT INTO educations(edu_year, edu_name, percentage)VALUES('$edu_year', '$edu_name', $percentage)";
$insert_edu_result = mysqli_query($db_connect, $insert_edu);
$_SESSION['edu_added'] = 'Education Added!';
header('location:add_education.php');

?>