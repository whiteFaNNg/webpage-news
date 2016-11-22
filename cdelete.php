<?php
require 'core/init.php';

if(logged_in() && isset($_GET['id'])){
    $cid=$_GET['id'];
    $result=$conn->prepare("SELECT * FROM comments WHERE id=:id");
    $result->execute([":id"=>$cid]);
    $result=$result->fetch(PDO::FETCH_ASSOC);
    if($result && ($result['user_id']==$user_data['id'])){
        $qr=$conn->prepare("DELETE FROM comments WHERE id=:id");
        $qr->execute([":id"=>$cid]);
        header("Location: profile.php");
    }
}