<?php 
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$delete_messages = "DELETE FROM messages WHERE id=$id";
$delete_messages_result = mysqli_query($db_connect, $delete_messages);

$_SESSION['delete_message'] = "Message has been deleted! ";
header('location:inbox.php');
?>