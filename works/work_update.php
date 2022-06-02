<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_POST['id'];
$user_id = $_POST['user_id'];
$category = $_POST['category'];
$title =mysqli_real_escape_string($db_connect, $_POST['title']);
$button = $_POST['button'];
$post_title = mysqli_real_escape_string($db_connect, $_POST['post_title']);
$description = mysqli_real_escape_string($db_connect, $_POST['description']);

if($_FILES['image']['name'] != ''){

    $uploaded_file = $_FILES['image'];
    $after_explode = explode('.', $uploaded_file['name']);
    $extension = end($after_explode);
    $allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');

    if(in_array($extension, $allowed_extension)){
        if($uploaded_file['size'] < 300000){
    
            $select_img = "SELECT * FROM works WHERE id=$id";
            $select_img_result = mysqli_query($db_connect, $select_img);
            $after_assoc = mysqli_fetch_assoc($select_img_result);
    
            $delete_from = '../uploads/works/'. $after_assoc['image'];
            unlink($delete_from);
    
            $update_work = "UPDATE works SET category='$category', title='$title', button='$button', description='$description',user_id='$user_id' WHERE id=$id";
            $update_work_result = mysqli_query($db_connect, $update_work);
    
            $file_name = $id.'.'.$extension;
            $new_location = '../uploads/works/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'], $new_location);
            $update_image = "UPDATE works SET image='$file_name' WHERE id=$id";
            $update_image_result = mysqli_query($db_connect, $update_image);
    
            $_SESSION['update_work'] = 'Work Updated!';
            header('location:work_edit.php?id='.$id);
        }
        else{
            $_SESSION['file_size'] = 'File Size too Big!';
            header('location:work_edit.php?id='.$id);    
        }
    }
    else{
        $_SESSION['extension'] = 'Invalid Extension!';
        header('location:work_edit.php?id='.$id);    
    }
}
else{
    $update_work = "UPDATE works SET category='$category', title='$title', button='$button', description='$description',user_id='$user_id' WHERE id=$id";
    $update_work_result = mysqli_query($db_connect, $update_work);

    $_SESSION['update_work'] = 'Work Updated!';
    header('location:work_edit.php?id='.$id);
}
?>