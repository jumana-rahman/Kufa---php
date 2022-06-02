<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_work = "UPDATE works SET status=1 WHERE id=$id";
$update_work_result = mysqli_query($db_connect, $update_work);

$_SESSION['work_soft_del'] = "Work Soft Deleted!";
header('location:/kufa/works/works.php');

?>