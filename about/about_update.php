<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_POST['id'];
$about_title =mysqli_real_escape_string($db_connect, $_POST['about_title']);
$description = mysqli_real_escape_string($db_connect, $_POST['description']);

if($_FILES['about_img']['name'] != ''){

    $uploaded_file = $_FILES['about_img'];
    $after_explode = explode('.', $uploaded_file['name']);
    $extension = end($after_explode);
    $allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');

    if(in_array($extension, $allowed_extension)){
        if($uploaded_file['size'] < 300000){
    
            $select_img = "SELECT * FROM abouts WHERE id=$id";
            $select_img_result = mysqli_query($db_connect, $select_img);
            $after_assoc = mysqli_fetch_assoc($select_img_result);
    
            $delete_from = '../uploads/about/'. $after_assoc['about_img'];
            unlink($delete_from);
    
            $update_about = "UPDATE abouts SET about_title='$about_title', description='$description' WHERE id=$id";
            $update_about_result = mysqli_query($db_connect, $update_about);
    
            $file_name = $id.'.'.$extension;
            $new_location = '../uploads/about/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'], $new_location);
            $update_image = "UPDATE abouts SET about_img='$file_name' WHERE id=$id";
            $update_image_result = mysqli_query($db_connect, $update_image);
    
            $_SESSION['update_about'] = 'About Updated!';
            header('location:about_edit.php?id='.$id);
        }
        else{
            $_SESSION['file_size'] = 'File Size too Big!';
            header('location:about_edit.php?id='.$id);    
        }
    }
    else{
        $_SESSION['extension'] = 'Invalid Extension!';
        header('location:about_edit.php?id='.$id);    
    }
}
else{
    $update_about = "UPDATE abouts SET about_title='$about_title', description='$description' WHERE id=$id";
    $update_about_result = mysqli_query($db_connect, $update_about);

    $_SESSION['update_about'] = 'About Updated!';
    header('location:about_edit.php?id='.$id);
}

?>