<?php
require '../core/database/connect.php';
require '../core/variables/variables.php';

if(!isset($_GET['id'])){
    sleep(10);
    header('Location: '.BASE_URL.'/admin/index.php?opt=1');
    die();
}
$id = $_GET['id'];
$slug = $_GET['slug'];

$com = $conn -> prepare("DELETE FROM comments WHERE id=:id");
$com->bindParam(':id',$id);
$com ->execute();

header('Location: '.BASE_URL.'/admin/pages.php?page='.$slug);

