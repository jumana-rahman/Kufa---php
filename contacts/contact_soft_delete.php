<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$update_contact = "UPDATE contacts SET status=1 WHERE id=$id";
$update_contact_result = mysqli_query($db_connect, $update_contact);

$_SESSION['con_soft_del'] = "Contact Soft Deleted!";
header('location:/kufa/contacts/contacts.php');

?>