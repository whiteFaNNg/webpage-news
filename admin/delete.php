<?php
require '../core/database/connect.php';
require '../core/variables/variables.php';

if(!isset($_GET['id'])){
    header('Location: '.BASE_URL.'/admin/index.php?opt=1');
    die();
}
$id = $_GET['id'];

$page = $conn ->prepare("SELECT * FROM posts WHERE id=:id");
$page->bindParam(':id',$id);
$page->execute();
$page = $page ->fetch(PDO::FETCH_ASSOC);
if($page['pic']!="images/posts/default.jpg") {
    unlink('../' . $page['pic']);
}
$page = $conn -> prepare("DELETE FROM posts WHERE id=:id");
$page->bindParam(':id',$id);
$page ->execute();

$page = $conn -> prepare("DELETE FROM comments WHERE post_id=:id");
$page->bindParam(':id',$id);
$page ->execute();

header('Location: '.BASE_URL.'/admin/index.php?opt=1');