<?php
include 'core/init.php';

if(isset($_POST)){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        $errors[] = "Username and password are required";
    }else if(!user_exist($username)){
        $errors[] = "That user does not exist";
    }else {
        $log = login($username, $password);
        if(!$log){
            $errors[] = "Username/Password combination is incorrect";
        }else {
            $_SESSION['user_id'] = $log;
            header('Location: profile.php');
            exit();
        }
    }



}
?>
<?php include 'view/users/includes/header.php';

if(!empty($errors)): ?>

    <div class="alert alert-warning">
        <p style="color:rgb(120,120,120);font-weight: bold;font-size: 110%;">We tried to log in but there were errors...</p>
    </div>
    <hr>
    <?php foreach($errors as $error):?>
    <div class="alert alert-danger">
        <strong>Error!</strong> <?php echo $error;?> <br>
    </div>
    <?php endforeach;?>
   <?php endif;?>


<?php include 'view/users/includes/footer.php';?>
