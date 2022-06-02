<?php
session_start();
require '../session_check.php';
require '../db.php';

$uploaded_file = $_FILES['brand_photo'];
$after_explode = explode('.', $uploaded_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');
if(in_array($extension, $allowed_extension)){
    if($uploaded_file['size'] <= 3000000){
        $insert_brand = "INSERT INTO brands()VALUES()";
        $insert_brand_result = mysqli_query($db_connect, $insert_brand);

        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$extension;
        $new_location = '../uploads/brands/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $update_image = "UPDATE brands SET brand_photo='$file_name' WHERE id=$id";
        $update_image_result = mysqli_query($db_connect, $update_image);

        $_SESSION['success'] = 'Brand Added Successfully!';
        header('location:add_brand.php');
    }
    else{
        $_SESSION['size'] = 'Maximum File size 3MB!';
        header('location:add_brand.php');
    }
}
else{
    $_SESSION['invalid_extension'] = 'File type should be jpg, jpeg, png, gif or webp!';
    header('location:add_brand.php');
}
?>