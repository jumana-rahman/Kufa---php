<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$delete_contacts = "DELETE FROM contacts WHERE id=$id";
$delete_contacts_result = mysqli_query($db_connect, $delete_contacts);

$_SESSION['delete_contact'] = "Contact has been deleted! ";
header('location:contact_trash.php');
?>