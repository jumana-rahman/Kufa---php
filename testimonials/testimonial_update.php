<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_POST['id'];
$review = mysqli_real_escape_string($db_connect, $_POST['review']);
$name = $_POST['name'];
$head = $_POST['head'];

if($_FILES['photo']['name'] != ''){

    $uploaded_file = $_FILES['photo'];
    $after_explode = explode('.', $uploaded_file['name']);
    $extension = end($after_explode);
    $allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');

    if(in_array($extension, $allowed_extension)){
        if($uploaded_file['size'] < 300000){
    
            $select_img = "SELECT * FROM testimonials WHERE id=$id";
            $select_img_result = mysqli_query($db_connect, $select_img);
            $after_assoc = mysqli_fetch_assoc($select_img_result);
    
            $delete_from = '../uploads/testimonials/'. $after_assoc['image'];
            unlink($delete_from);
    
            $update_testimonial = "UPDATE testimonials SET review='$review', name='$name', head='$head' WHERE id=$id";
            $update_testimonial_result = mysqli_query($db_connect, $update_testimonial);
    
            $file_name = $id.'.'.$extension;
            $new_location = '../uploads/testimonials/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'], $new_location);
            $update_image = "UPDATE testimonials SET photo='$file_name' WHERE id=$id";
            $update_image_result = mysqli_query($db_connect, $update_image);
    
            $_SESSION['update_testimonial'] = 'Testimonial Updated!';
            header('location:testimonial_edit.php?id='.$id);
        }
        else{
            $_SESSION['file_size'] = 'File Size too Big!';
            header('location:testimonial_edit.php?id='.$id);    
        }
    }
    else{
        $_SESSION['extension'] = 'Invalid Extension!';
        header('location:testimonial_edit.php?id='.$id);    
    }
}
else{
    $update_testimonial = "UPDATE testimonials SET review='$review', name='$name', head='$head' WHERE id=$id";
    $update_testimonial_result = mysqli_query($db_connect, $update_testimonial);

    $_SESSION['update_testimonial'] = 'Testimonial Updated!';
    header('location:testimonial_edit.php?id='.$id);
}

?>