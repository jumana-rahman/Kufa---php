<?php
session_start();
require '../session_check.php';
require '../db.php';

$uploaded_file = $_FILES['logo'];
$after_explode = explode('.', $uploaded_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');
if(in_array($extension, $allowed_extension)){
    if($uploaded_file['size'] <= 3000000){
        $insert_logo = "INSERT INTO logos()VALUES()";
        $insert_logo_result = mysqli_query($db_connect, $insert_logo);

        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$extension;
        $new_location = '../uploads/logos/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $update_image = "UPDATE logos SET logo='$file_name' WHERE id=$id";
        $update_image_result = mysqli_query($db_connect, $update_image);

        $_SESSION['success'] = 'Logo Added Successfully!';
        header('location:add_logo.php');
    }
    else{
        $_SESSION['size'] = 'Maximum File size 3MB!';
        header('location:add_logo.php');
    }
}
else{
    $_SESSION['invalid_extension'] = 'File type should be jpg, jpeg, png, gif or webp!';
    header('location:add_logo.php');
}
?>