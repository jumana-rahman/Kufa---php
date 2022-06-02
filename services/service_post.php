<?php
session_start();
require '../session_check.php';
require '../db.php';

$icon = $_POST['icon'];
$service_title = $_POST['service_title'];
$service_description = $_POST['service_description'];

$insert_service = "INSERT INTO services(icon, service_title, service_description)VALUES('$icon', '$service_title', '$service_description')";
$insert_service_result = mysqli_query($db_connect, $insert_service);

$_SESSION['service_added'] = 'Service Added!';
header('location:add_service.php');

?>