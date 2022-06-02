<?php
session_start();
require '../session_check.php';
require '../db.php';

$opening = $_POST['opening'];
$title =mysqli_real_escape_string($db_connect, $_POST['title']);
$description = mysqli_real_escape_string($db_connect, $_POST['description']);
$btn = $_POST['btn'];

$uploaded_file = $_FILES['image'];
$after_explode = explode('.', $uploaded_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');
if(in_array($extension, $allowed_extension)){
    if($uploaded_file['size'] <= 3000000){
        $insert_banner = "INSERT INTO banners(opening, title, description, btn)VALUES('$opening', '$title', '$description', '$btn')";
        $insert_banner_result = mysqli_query($db_connect, $insert_banner);

        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$extension;
        $new_location = '../uploads/banners/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $update_image = "UPDATE banners SET image='$file_name' WHERE id=$id";
        $update_image_result = mysqli_query($db_connect, $update_image);

        $_SESSION['success'] = 'Banner Added Successfully!';
        header('location:add_banner.php');
    }
    else{
        $_SESSION['size'] = 'Maximum File size 1MB!';
        header('location:add_banner.php');
    }
}
else{
    $_SESSION['invalid_extension'] = 'File type should be jpg, jpeg, png, gif or webp!';
    header('location:add_banner.php');
}
?>