<?php
require 'core/init.php';

if(logged_in()){
    $comments=$conn->prepare("SELECT * FROM comments WHERE user_id=:id ORDER BY created DESC");
    $comments->execute([":id"=>$user_data['id']]);
    $comments=$comments->fetchAll(PDO::FETCH_ASSOC);
    if($comments){
        $cnt = count($comments);
        for($i = 0;$i<$cnt;$i++) {
            $comments[$i]['created'] = new DateTime($comments[$i]['created']);
        }
    }
    require 'view/users/sprofile.php';
}else{
    require 'view/users/lprofile.php';
}