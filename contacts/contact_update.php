<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_POST['id'];
$office = $_POST['office'];
$address =mysqli_real_escape_string($db_connect, $_POST['address']);
$phone = $_POST['phone'];
$email = $_POST['email'];
$contact_info = $_POST['contact_info'];
    
$update_contact = "UPDATE contacts SET office='$office', address='$address', phone='$phone', email='$email', contact_info='$contact_info' WHERE id=$id";
$update_contact_result = mysqli_query($db_connect, $update_contact);

$_SESSION['update_contact'] = 'Contact Updated!';
header('location:contact_edit.php?id='.$id);

?>