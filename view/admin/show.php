<?php require 'includes/header.php';?>
<div style="width: 80%;margin: auto;">
<?php if($page): ?>

    <h1><?php echo e($page['title']);?></h1>
    <div>
        <img src="../<?php echo $page['pic']?>" style="width: 100%;height: auto">
    </div>
    <br/>
    <div style="font-size: 150%;min-height: 200px;"><?php echo e($page['body']);?></div>
    <?php if($comm): ?>
        <p>Comments</p>
        <table id="tabl2">
        <?php foreach($comm as $com): ?>
            <tr >
                <td style="width: 15%;">
                    <img src="../<?php echo $com['pic']?>" alt="HTML5 Icon" style="width:50px;height:50px;">
                </td>
                <td style="text-align: left;font-size: 130%;font-weight: bold;color:teal;border-bottom: 1px solid rgb(200,200,200);">
                    <?php echo $com['name']; ?>
                </td>
                <td class="faded" style="text-align: right;border-bottom: 1px solid rgb(200,200,200);">
                    <?php echo $com['created']->format('Y M');?>
                </td>
                <td style="width: 10%;">
                    <a href="<?php echo BASE_URL;?>/admin/cdelete.php?id=<?php echo $com['id'].'&slug='.$slug;?>"><span class="glyphicon glyphicon-remove" style="padding-top: 15px;"></span></p></a>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" class="commbody"><?php echo $com['body']; ?></td>
            </tr>
        <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No comments to Display!</p>
    <?php endif; ?>
    <table>
        <tr>
            <td class="faded">Created: <?php echo $page['created']->format('Y M D');?></td>
            <td class="faded">Updated: <?php if($page['updated']){echo $page['updated']->format('Y M D');}?></td>
        </tr>
    </table>
    <hr>
    <a class="btn btn-default" style="margin:auto;" href="<?php echo BASE_URL.'/admin/'?>index.php?opt=1">Back</a>
<?php else: ?>
    <p>Page not found</p>
<?php endif; ?>
</div>
<?php require 'includes/footer.php';?>
