<?php
require 'core/init.php';

if(!empty($_POST)){
    $required_fields = array('username', 'password', 'password_retype', 'name', 'email');
    foreach($_POST as $key=>$value){
        if(empty($value) && in_array($key, $required_fields) === true){
            $errors[] = "Fields with asterisks are required";
            break 1;
        }
    }


    if(user_exist($_POST['username'])){
        $errors[] = "We are sorry but that username already exists.";
    }
    if(strlen($_POST['password'] < 6)){
        $errors[] = "Password must contain at least 6 characters";
    }

    if(preg_match("/\\s/", $_POST['username']) == true){
        $errors[] = "Username can not contain spaces";
    }
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL === false)){
        $errors[] = "Email is invalid";
    }
    if(email_exist($_POST['email'])){
        $errors[] = "That email is still in use";
    }
    if($_POST['password']!=$_POST['password_retype']){
        $errors[] = "Passwords don't match";
    }

}

$count = count($errors);

if(isset($_GET['success'])){
    $success = true;
}else{
    if (!empty($_POST) && $count == 0) {
        $register_data = array(
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'email' => $_POST['email'],
            'pic' => 'images/profile/default.png'
        );
        if(isset($_FILES['pic']) === true){
            $allowed = array('jpg', 'png', 'jpeg', 'gif');
            $file_name = $_FILES['pic']['name'];
            $file_extn = strtolower(end(explode('.', $file_name)));
            $file_temp = $_FILES['pic']['tmp_name'];
            if(in_array($file_extn, $allowed) === true){
                $register_data['pic'] = 'images/profile/' . substr(md5(time()), 0 , 10) . '.' . $file_extn;
                move_uploaded_file($file_temp, $register_data['pic']);
            }
        }
        register_user($register_data);
        header('Location: index.php');
        exit();
    }
}

require 'view/users/rprofile.php';
