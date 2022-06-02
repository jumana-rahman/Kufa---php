<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_contact = "UPDATE contacts SET status=0 WHERE id=$id";
$update_contact_result = mysqli_query($db_connect, $update_contact);

$_SESSION['contact_restore'] = "Contact Restored!";
header('location:contact_trash.php');

?>