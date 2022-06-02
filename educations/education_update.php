<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_POST['id'];
$edu_year = $_POST['edu_year'];
$edu_name = $_POST['edu_name'];
$percentage = $_POST['percentage'];

$update_education = "UPDATE educations SET edu_year='$edu_year', edu_name='$edu_name', percentage='$percentage' WHERE id=$id";
$update_education_result = mysqli_query($db_connect, $update_education);
    
$_SESSION['update_edu'] = 'Education Updated!';
header('location:education_edit.php?id='.$id);