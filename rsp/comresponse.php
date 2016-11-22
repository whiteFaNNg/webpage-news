<?php
require '../core/init.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = $_POST['pid'];
    if(isset($_POST['uid'])){
    $uid = $_POST['uid'];
    $com = $_POST['comm'];
    $result = $conn->prepare("INSERT INTO comments (user_id, post_id, body) VALUES (:uid, :pid, :body)");
    $result = $result->execute([':uid' => $uid, ':pid' => $pid, ':body' => $com]);}
}
$comm = $conn ->prepare("SELECT users.pic, users.name, comments.body, comments.created, comments.id
      FROM users
      RIGHT JOIN comments
      ON users.id=comments.user_id
      WHERE comments.post_id=:id");
$comm->bindParam(':id',$pid);
$comm->execute();
$comm=$comm->fetchAll(PDO::FETCH_ASSOC);
if($comm){
    $cnt = count($comm);
    for($i = 0;$i<$cnt;$i++){
        $comm[$i]['created'] = new DateTime($comm[$i]['created']);
    }
}
?>
<?php if($comm):?>
<table id="tabl2">
    <?php foreach($comm as $com1): ?>
        <tr >
            <td style="width: 15%;">
                <img src="<?php echo $com1['pic']?>" alt="HTML5 Icon" style="width:50px;height:50px;">
            </td>
            <td style="text-align: left;font-size: 130%;font-weight: bold;color:teal;border-bottom: 1px solid rgb(200,200,200);">
                <?php echo $com1['name']; ?>
            </td>
            <td class="faded" style="text-align: right;border-bottom: 1px solid rgb(200,200,200);">
                <?php echo $com1['created']->format('Y M');?>
            </td>
            <td style="width: 10%;">

            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" class="commbody"><?php echo $com1['body']; ?></td>
        </tr>
    <?php endforeach; ?>
        <tr>
            <td colspan="3"></td>
        </tr>
</table>
<?php else:?>
<p>No Comments to Display</p>
<?php endif;?>
