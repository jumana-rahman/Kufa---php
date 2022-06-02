<?php
session_start();
require '../session_check.php';
require '../db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$country = $_POST['country'];
$role = $_POST['role'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// if password is empty
if(empty($_POST['password'])){
    if($_FILES['image']['name'] != ''){

        $uploaded_file = $_FILES['image'];
        $after_explode = explode('.', $uploaded_file['name']);
        $extension = end($after_explode);
        $allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');
    
        if(in_array($extension, $allowed_extension)){
            if($uploaded_file['size'] < 300000){
        
                $select_img = "SELECT * FROM users WHERE id=$id";
                $select_img_result = mysqli_query($db_connect, $select_img);
                $after_assoc = mysqli_fetch_assoc($select_img_result);
        
                $delete_from = '../uploads/users/'. $after_assoc['image'];
                unlink($delete_from);
        
                $update_user = "UPDATE users SET name='$name', email='$email', country='$country', role='$role' WHERE id=$id";
                $update_user_result = mysqli_query($db_connect, $update_user);
        
                $file_name = $id.'.'.$extension;
                $new_location = '../uploads/users/'.$file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);
                $update_image = "UPDATE users SET image='$file_name' WHERE id=$id";
                $update_image_result = mysqli_query($db_connect, $update_image);
        
                $_SESSION['update_user'] = 'User Updated!';
                header('location:edit.php?id='.$id);
            }
            else{
                $_SESSION['file_size'] = 'File Size too Big!';
                header('location:edit.php?id='.$id);    
            }
        }
        else{
            $_SESSION['extension'] = 'Invalid Extension!';
            header('location:edit.php?id='.$id);    
        }
    }
    else{
        $update_user = "UPDATE users SET name='$name', email='$email', country='$country', role='$role' WHERE id=$id";
        $update_user_result = mysqli_query($db_connect, $update_user);
    
        $_SESSION['update_user'] = 'User Updated!';
        header('location:edit.php?id='.$id);
    }
}

// if password not empty
else{
    if($_FILES['image']['name'] != ''){

        $uploaded_file = $_FILES['image'];
        $after_explode = explode('.', $uploaded_file['name']);
        $extension = end($after_explode);
        $allowed_extension = array('jpg', 'jpeg', 'png', 'gif', 'webp');
    
        if(in_array($extension, $allowed_extension)){
            if($uploaded_file['size'] < 300000){
        
                $select_img = "SELECT * FROM users WHERE id=$id";
                $select_img_result = mysqli_query($db_connect, $select_img);
                $after_assoc = mysqli_fetch_assoc($select_img_result);
        
                $delete_from = '../uploads/users/'. $after_assoc['image'];
                unlink($delete_from);
        
                $update_user = "UPDATE users SET name='$name', email='$email', country='$country', role='$role', password='$password' WHERE id=$id";
                $update_user_result = mysqli_query($db_connect, $update_user);
        
                $file_name = $id.'.'.$extension;
                $new_location = '../uploads/users/'.$file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);
                $update_image = "UPDATE users SET image='$file_name' WHERE id=$id";
                $update_image_result = mysqli_query($db_connect, $update_image);
        
                $_SESSION['update_user'] = 'User Updated!';
                header('location:edit.php?id='.$id);
            }
            else{
                $_SESSION['file_size'] = 'File Size too Big!';
                header('location:edit.php?id='.$id);    
            }
        }
        else{
            $_SESSION['extension'] = 'Invalid Extension!';
            header('location:edit.php?id='.$id);    
        }
    }
    else{
        $update_user = "UPDATE users SET name='$name', email='$email', country='$country', role='$role', password='$password' WHERE id=$id";
        $update_user_result = mysqli_query($db_connect, $update_user);
    
        $_SESSION['update_user'] = 'User Updated!';
        header('location:edit.php?id='.$id);
    }
}
?>