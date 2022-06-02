<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_POST['id'];

if($_FILES['logo']['name'] != ''){

    $uploaded_file = $_FILES['logo'];
    $after_explode = explode('.', $uploaded_file['name']);
    $extension = end($after_explode);
    $allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');

    if(in_array($extension, $allowed_extension)){
        if($uploaded_file['size'] < 300000){
    
            $select_img = "SELECT * FROM logos WHERE id=$id";
            $select_img_result = mysqli_query($db_connect, $select_img);
            $after_assoc = mysqli_fetch_assoc($select_img_result);
    
            $delete_from = '../uploads/logos/'. $after_assoc['logo'];
            unlink($delete_from);

            $update_logo = "UPDATE logos SET WHERE id=$id";
            $update_logo_result = mysqli_query($db_connect, $update_logo);
    
            $file_name = $id.'.'.$extension;
            $new_location = '../uploads/logos/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'], $new_location);
            $update_image = "UPDATE logos SET logo='$file_name' WHERE id=$id";
            $update_image_result = mysqli_query($db_connect, $update_image);
    
            $_SESSION['update_logo'] = 'Logo Updated!';
            header('location:logo_edit.php?id='.$id);
        }
        else{
            $_SESSION['file_size'] = 'File Size too Big!';
            header('location:logo_edit.php?id='.$id);    
        }
    }
    else{
        $_SESSION['extension'] = 'Invalid Extension!';
        header('location:logo_edit.php?id='.$id);    
    }
}
else{
    $update_logo = "UPDATE logos SET WHERE id=$id";
    $update_logo_result = mysqli_query($db_connect, $update_logo);

    $_SESSION['update_logo'] = 'Logo Updated!';
    header('location:logo_edit.php?id='.$id);
}
?>