<?php
require '../core/database/connect.php';
require '../core/variables/variables.php';

if(!empty($_POST)){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $slug = $_POST['slug'];

    $update = $conn->prepare("UPDATE posts SET title=:title , body =:body, slug =:slug, updated=NOW() WHERE id=:id");
    $update->execute(['title'=>$title , 'body'=>$body, 'slug'=>$slug, 'id'=>$id]);

    if((isset($_FILES['pic']) === true)&& !empty($_FILES['pic'])){
        $allowed = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $_FILES['pic']['name'];
        $file_extn = strtolower(end(explode('.', $file_name)));
        $file_temp = $_FILES['pic']['tmp_name'];
        if(in_array($file_extn, $allowed) === true){
            $page = $conn ->prepare("SELECT * FROM posts WHERE id=:id");
            $page->bindParam(':id',$id);
            $page->execute();
            $page = $page ->fetch(PDO::FETCH_ASSOC);
            if($page['pic']!="images/posts/default.jpg") {
                unlink('../' . $page['pic']);
            }
            $pic = 'images/posts/' . substr(md5(time()), 0 , 10) . '.' . $file_extn;
            $update = $conn->prepare("UPDATE posts SET pic=:pic WHERE id=:id");
            $update->bindParam(':pic',$pic);
            $update->bindParam(':id',$id);
            $update->execute();
            move_uploaded_file($file_temp, "../".$pic);

        }
    }

    header('Location: '.BASE_URL.'/admin/index.php?opt=1');
}

if(!isset($_GET['id'])){
    header('Location: '.BASE_URL.'/admin/index.php?opt=1');
    die();
}

$page = $conn->prepare("SELECT id, title, body ,slug, pic FROM posts WHERE id=:id");
$page->bindParam(':id',$_GET['id']);
$page->execute();
$page = $page->fetch(PDO::FETCH_ASSOC);

require VIEW_ROOT.'/admin/edit.php';