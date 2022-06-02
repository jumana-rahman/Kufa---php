<?php 
session_start();
require '../session_check.php';
require '../db.php';

$errors = [];
$field_names = ['name'=>'Name Required', 'email'=>'Email Required', 'password'=>'Password Required'];

foreach($field_names as $field_name=>$message){
    if(empty($_POST[$field_name])){
        $errors[$field_name] = $message;
    }
    else if(empty($_POST[$field_name])){
        $errors[$field_name] = $message;
    }
    else if(empty($_POST[$field_name])){
        $errors[$field_name] = $message;
    }
    else if(empty($_POST[$field_name])){
        $errors[$field_name] = $message;
    }
}

if(count($errors)== 0){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $after_hash = password_hash($password, PASSWORD_DEFAULT);
    date_default_timezone_set('Asia/Dhaka');
    $created_at = date('d-m-y h:i:s');
    $country = $_POST['country'];
    $role = $_POST['role'];

    $select_users = "SELECT COUNT(*) as email_exist FROM users WHERE email='$email'";
    $select_users_result = mysqli_query($db_connect, $select_users);
    $after_assoc = mysqli_fetch_assoc($select_users_result);

    if($after_assoc['email_exist'] == 0){

        $uploaded_file = $_FILES['image'];
        $after_explode = explode('.', $uploaded_file['name']);
        $extension = end($after_explode);
        $allowed = array('jpg', 'jpeg', 'png', 'gif', 'webp');
        if(in_array($extension, $allowed)){
            if($uploaded_file['size'] < 200000){
                $insert = "INSERT INTO users(name,email,password,country,created_at,role)VALUES('$name', '$email', '$after_hash', '$country', '$created_at', '$role')";
                $insert_result = mysqli_query($db_connect, $insert);

                $user_id = mysqli_insert_id($db_connect);
                $file_name = $user_id. '.' .$extension;
                $new_location = '../uploads/users/'.$file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);

                $update_user = "UPDATE users SET image='$file_name' WHERE id=$user_id";
                $update_user_result = mysqli_query($db_connect, $update_user);

                $_SESSION['success'] = 'Registration Successful!';
                header('location:register.php');
            }
            else{
                echo 'File size too large';
            }
        }
        else{
            echo 'Invalid Extension';
        }
    }
    else{
        $_SESSION['email_exist'] = 'Email Already Exists! Please try a new email!';
        header('location:register.php');
    } 
}

else{
    $_SESSION['errors'] = $errors;
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    header('location:register.php');
}

?>