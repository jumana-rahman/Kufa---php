<?php
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];

$select_contact = "SELECT * FROM contacts WHERE id=$id";
$select_contact_result = mysqli_query($db_connect, $select_contact);
$after_assoc = mysqli_fetch_assoc($select_contact_result);


if($after_assoc['active_status'] == 1){
    $update_status = "UPDATE contacts SET active_status=0 WHERE id=$id";
    $update_status_result = mysqli_query($db_connect, $update_status);
    header('location:contacts.php');
}
else{
    $update_status1 = "UPDATE contacts SET active_status=0";
    $update_status_result1 = mysqli_query($db_connect, $update_status1);

    $update_status = "UPDATE contacts SET active_status=1 WHERE id=$id";
    $update_status_result = mysqli_query($db_connect, $update_status);
    header('location:contacts.php');
}



?>