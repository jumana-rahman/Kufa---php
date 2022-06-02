<?php
session_start();
require '../session_check.php';
require '../db.php';



$category = $_POST['category'];
$user_id = $_POST['user_id'];
$title = mysqli_real_escape_string($db_connect, $_POST['title']);
$button = $_POST['button'];
$post_title = mysqli_real_escape_string($db_connect, $_POST['post_title']);
$description = mysqli_real_escape_string($db_connect, $_POST['description']);

$uploaded_file = $_FILES['image'];
$after_explode = explode('.', $uploaded_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');
if(in_array($extension, $allowed_extension)){
    if($uploaded_file['size'] <= 3000000){
        $insert_work = "INSERT INTO works(category, title, button, description,user_id)VALUES('$category', '$title', '$button', '$description','$user_id')";
        $insert_work_result = mysqli_query($db_connect, $insert_work);

        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$extension;
        $new_location = '../uploads/works/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $update_image = "UPDATE works SET image='$file_name' WHERE id=$id";
        $update_image_result = mysqli_query($db_connect, $update_image);

        $_SESSION['success'] = 'Work Added Successfully!';
        header('location:add_work.php');
    }
    else{
        $_SESSION['size'] = 'Maximum File size 3MB!';
        header('location:add_work.php');
    }
}
else{
    $_SESSION['invalid_extension'] = 'File type should be jpg, jpeg, png, gif or webp!';
    header('location:add_work.php');
}
?>