<?php
session_start();
require '../session_check.php';
require '../db.php';

$office = $_POST['office'];
$address =mysqli_real_escape_string($db_connect, $_POST['address']);
$phone = $_POST['phone'];
$email = $_POST['email'];
$contact_info = $_POST['contact_info'];

$insert_contact = "INSERT INTO contacts(office, address, phone, email, contact_info)VALUES('$office', '$address', '$phone', '$email', '$contact_info')";
$insert_contact_result = mysqli_query($db_connect, $insert_contact);

$_SESSION['success'] = 'Contact Added Successfully!';
header('location:add_contact.php');
?>