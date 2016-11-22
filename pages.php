<?php require 'core/init.php';

    display();

$slug = $_GET['page'];

if(!empty($slug)){
    $page = $conn ->prepare("SELECT id, title, body, created, updated, pic FROM posts WHERE slug=:slug");
    $page->bindParam(':slug',$slug);
    $page->execute();
    $page = $page ->fetch(PDO::FETCH_ASSOC);
    if($page){
        $page['created']= new DateTime($page['created']);
        if($page['updated']){
            $page['updated']= new DateTime($page['updated']);
        }
    }
    $comm = $conn ->prepare("SELECT users.pic, users.name, comments.body, comments.created, comments.id
      FROM users
      RIGHT JOIN comments
      ON users.id=comments.user_id
      WHERE comments.post_id=:id");
    $comm->bindParam(':id',$page['id']);
    $comm->execute();
    $comm=$comm->fetchAll(PDO::FETCH_ASSOC);
    if($comm){
        $cnt = count($comm);
        for($i = 0;$i<$cnt;$i++){
            $comm[$i]['created'] = new DateTime($comm[$i]['created']);
        }
    }
}
else {
    $page = false;
}
?>

<?php require 'view/users/show.php'?>