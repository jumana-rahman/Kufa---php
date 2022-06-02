<?php
session_start();
require '../session_check.php';
require '../db.php';

$about_title =mysqli_real_escape_string($db_connect, $_POST['about_title']);
$description = mysqli_real_escape_string($db_connect, $_POST['description']);

$uploaded_file = $_FILES['about_img'];
$after_explode = explode('.', $uploaded_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');
if(in_array($extension, $allowed_extension)){
    if($uploaded_file['size'] <= 3000000){
        $insert_about = "INSERT INTO abouts(about_title, description)VALUES('$about_title', '$description')";
        $insert_about_result = mysqli_query($db_connect, $insert_about);

        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$extension;
        $new_location = '../uploads/about/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $update_image = "UPDATE abouts SET about_img='$file_name' WHERE id=$id";
        $update_image_result = mysqli_query($db_connect, $update_image);

        $_SESSION['success'] = 'About Added Successfully!';
        header('location:add_about.php');
    }
    else{
        $_SESSION['size'] = 'Maximum File size 3MB!';
        header('location:add_about.php');
    }
}
else{
    $_SESSION['invalid_extension'] = 'File type should be jpg, jpeg, png, gif or webp!';
    header('location:add_about.php');
}
?>