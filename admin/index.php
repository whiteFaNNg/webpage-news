<?php

require '../core/database/connect.php';
require '../core/variables/variables.php';

if($_GET['opt']=='1'){
    $pages = $conn->query("SELECT * FROM posts ORDER BY created DESC")->fetchAll(PDO::FETCH_ASSOC);
    require VIEW_ROOT.'/admin/plist.php';
}
else if($_GET['opt']=='2'){
    $users = $conn->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
    require VIEW_ROOT.'/admin/ulist.php';
}else{
    echo 'error';
}