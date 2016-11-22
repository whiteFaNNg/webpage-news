<?php
require 'core/init.php';

if(!empty($_POST)){
    if(user_exist($_POST['username'])){
        $errors[] = "We are sorry but that username already exists.";
    }
    if(strlen($_POST['password_new'] < 6 )&& !empty($_POST['password_new'])){
        $errors[] = "Password must contain at least 6 characters";
    }
    if(md5($_POST['password_old'])!=$user_data['password']){
        $errors[] = "You entered wrong old password";
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
    if($_POST['password_new']!=$_POST['password_retype']){
        $errors[] = "Passwords don't match";
    }
}
if((count($errors)>0)||empty($_POST)){
require 'view/users/eprofile.php';}
else{
    if(!empty($_POST['username'])){
        $qr=$conn->prepare("UPDATE users SET username=:username WHERE id=:id");
        $qr->execute(['username'=>$_POST['username'],'id'=>$user_data['id']]);
    }
    if(!empty($_POST['password_new'])){
        $qr=$conn->prepare("UPDATE users SET password=:password WHERE id=:id");
        $qr->execute(['password'=>md5($_POST['password_new']),'id'=>$user_data['id']]);
    }
    if(!empty($_POST['name'])){
        $qr=$conn->prepare("UPDATE users SET name=:name WHERE id=:id");
        $qr->execute(['name'=>$_POST['name'],'id'=>$user_data['id']]);
    }
    if(!empty($_POST['surname'])){
        $qr=$conn->prepare("UPDATE users SET surname=:surname WHERE id=:id");
        $qr->execute(['surname'=>$_POST['surname'],'id'=>$user_data['id']]);
    }
    if(!empty($_POST['email'])){
        $qr=$conn->prepare("UPDATE users SET email=:email WHERE id=:id");
        $qr->execute(['email'=>$_POST['email'],'id'=>$user_data['id']]);
    }
    if((isset($_FILES['pic']) === true)&& !empty($_FILES['pic'])){
        $allowed = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $_FILES['pic']['name'];
        $file_extn = strtolower(end(explode('.', $file_name)));
        $file_temp = $_FILES['pic']['tmp_name'];
        if(in_array($file_extn, $allowed) === true){
            $usr = $conn ->prepare("SELECT * FROM users WHERE id=:id");
            $usr->bindParam(':id',$user_data['id']);
            $usr->execute();
            $usr = $usr ->fetch(PDO::FETCH_ASSOC);
            if($usr['pic']!="images/profile/default.png") {
                unlink( $usr['pic']);
            }
            $pic = 'images/profile/' . substr(md5(time()), 0 , 10) . '.' . $file_extn;
            $update = $conn->prepare("UPDATE users SET pic=:pic WHERE id=:id");
            $update->bindParam(':pic',$pic);
            $update->bindParam(':id',$user_data['id']);
            $update->execute();
            move_uploaded_file($file_temp, $pic);

        }
    }
    header("Location: profile.php");
    exit();

}