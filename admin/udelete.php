<?php
require '../core/database/connect.php';
require '../core/variables/variables.php';

if(!isset($_GET['id'])){
    header('Location: '.BASE_URL.'/admin/index.php?opt=2');
    die();
}
$id = $_GET['id'];

$user = $conn ->prepare("SELECT * FROM users WHERE id=:id");
$user->bindParam(':id',$id);
$user->execute();
$user = $user ->fetch(PDO::FETCH_ASSOC);
if($user['pic']!="images/profile/default.png") {
    unlink('../' . $user['pic']);
}
$user = $conn -> prepare("DELETE FROM users WHERE id=:id");
$user->bindParam(':id',$id);
$user ->execute();

$user = $conn -> prepare("DELETE FROM comments WHERE user_id=:id");
$user->bindParam(':id',$id);
$user ->execute();

header('Location: '.BASE_URL.'/admin/index.php?opt=2');