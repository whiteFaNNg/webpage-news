<?php require 'includes/header.php';?>

<?php if(empty($pages)): ?>
    <p>No Pages to Display</p>
<?php else: ?>
    <table>
        <thead>
        </thead>
        <tbody>
        <?php foreach($pages as $page): ?>
            <tr>
                <td>
                    <img src="../<?php echo $page['pic']?>" alt="HTML5 Icon" style="width:auto;height:200px;">
                </td>
                <td>
                    <table>
                        <tr>
                            <td colspan="3" style="padding-bottom: 10px;padding-top: 40px;height: 160px;border-bottom: 1px solid gray;font-size: 200%;">
                                <?php echo $page['title']?>
                            </td>
                        </tr>
                        <tr >
                            <td style="padding-bottom: 0px;padding-top: 10px;">
                                <a class="btn btn-default" style="width: 100%;" href="<?php echo BASE_URL;?>/admin/pages.php?page=<?php echo $page['slug'];?>">View</a>
                            </td>
                            <td style="padding-bottom: 0px;padding-top: 10px;">
                                <a class="btn btn-default" style="width: 100%;" href="<?php echo BASE_URL;?>/admin/edit.php?id=<?php echo $page['id'];?>">Edit</a>
                            </td>
                            <td style="padding-bottom: 0px;padding-top: 10px;">
                                <a class="btn btn-default" style="width: 100%;" href="<?php echo BASE_URL;?>/admin/delete.php?id=<?php echo $page['id'];?>">Delete</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php endif; ?>
<div style="text-align: center;">
    <hr>
    <a class="btn btn-primary" href="<?php echo BASE_URL;?>/admin/add.php" style="width: 30%;">Add new Page</a>
</div>
<?php require 'includes/footer.php';?>
