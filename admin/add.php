<?php
require '../core/database/connect.php';
require '../core/variables/variables.php';
?>

<?php if(!empty($_POST)){
    $title=$_POST['title'];
    $slug=$_POST['slug'];
    $body=$_POST['body'];
    $pic="";

    if(isset($_FILES['pic']) === true){
        $allowed = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $_FILES['pic']['name'];
        $file_extn = strtolower(end(explode('.', $file_name)));
        $file_temp = $_FILES['pic']['tmp_name'];
        if(in_array($file_extn, $allowed) === true){
            $pic = 'images/posts/' . substr(md5(time()), 0 , 10) . '.' . $file_extn;
            move_uploaded_file($file_temp, "../".$pic);
        }else {
            $pic='images/posts/default.jpg';
        }
    }
    else {
        $pic='images/posts/default.jpg';
    }


    $page = $conn -> prepare("INSERT INTO posts (slug,title,body,pic) VALUES(:slug,:title,:body,:pic)");
    $page->bindParam(':slug',$slug);
    $page->bindParam(':title',$title);
    $page->bindParam(':body',$body);
    $page->bindParam(':pic',$pic);
    $page->execute();

    header('Location: '. BASE_URL.'/admin/index.php?opt=1' );
}
?>

<?php require VIEW_ROOT.'/admin/add.php'; ?>