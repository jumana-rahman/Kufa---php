<?php
session_start();
require '../session_check.php';
require '../db.php';

$review = mysqli_real_escape_string($db_connect, $_POST['review']);
$name = $_POST['name'];
$head = $_POST['head'];

$uploaded_file = $_FILES['photo'];
$after_explode = explode('.', $uploaded_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');
if(in_array($extension, $allowed_extension)){
    if($uploaded_file['size'] <= 3000000){
        $insert_testimonial = "INSERT INTO testimonials(review, name, head)VALUES('$review', '$name', '$head')";
        $insert_testimonial_result = mysqli_query($db_connect, $insert_testimonial);

        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$extension;
        $new_location = '../uploads/testimonials/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $update_photo = "UPDATE testimonials SET photo='$file_name' WHERE id=$id";
        $update_photo_result = mysqli_query($db_connect, $update_photo);

        $_SESSION['success'] = 'Testimonial Added Successfully!';
        header('location:add_testimonial.php');
    }
    else{
        $_SESSION['size'] = 'Maximum File size 3MB!';
        header('location:add_testimonial.php');
    }
}
else{
    $_SESSION['invalid_extension'] = 'File type should be jpg, jpeg, png, gif or webp!';
    header('location:add_testimonial.php');
}
?>