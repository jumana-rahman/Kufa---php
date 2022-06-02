<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_POST['id'];

if($_FILES['brand_photo']['name'] != ''){

    $uploaded_file = $_FILES['brand_photo'];
    $after_explode = explode('.', $uploaded_file['name']);
    $extension = end($after_explode);
    $allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');

    if(in_array($extension, $allowed_extension)){
        if($uploaded_file['size'] < 300000){
    
            $select_img = "SELECT * FROM brands WHERE id=$id";
            $select_img_result = mysqli_query($db_connect, $select_img);
            $after_assoc = mysqli_fetch_assoc($select_img_result);
    
            $delete_from = '../uploads/brands/'. $after_assoc['image'];
            unlink($delete_from);

            $update_brand = "UPDATE brands SET WHERE id=$id";
            $update_brand_result = mysqli_query($db_connect, $update_brand);
    
            $file_name = $id.'.'.$extension;
            $new_location = '../uploads/brands/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'], $new_location);
            $update_image = "UPDATE brands SET image='$file_name' WHERE id=$id";
            $update_image_result = mysqli_query($db_connect, $update_image);
    
            $_SESSION['update_brand'] = 'Brand Updated!';
            header('location:brand_edit.php?id='.$id);
        }
        else{
            $_SESSION['file_size'] = 'File Size too Big!';
            header('location:brand_edit.php?id='.$id);    
        }
    }
    else{
        $_SESSION['extension'] = 'Invalid Extension!';
        header('location:brand_edit.php?id='.$id);    
    }
}
else{
    $update_brand = "UPDATE brands SET WHERE id=$id";
    $update_brand_result = mysqli_query($db_connect, $update_brand);

    $_SESSION['update_brand'] = 'Brand Updated!';
    header('location:brand_edit.php?id='.$id);
}
?>