<?php require 'includes/header.php';?>

<?php if(empty($pages)): ?>
    <p>No Pages to Display</p>
<?php else: ?>

        <?php foreach($pages as $page): ?>
            <div style="position: relative;padding-top: 0px;">
                <img src="<?php echo $page['pic'];?>" alt="HTML5 Icon" style="width:100%;height:auto;">
                <div style="position: absolute;bottom: 0px;width: 100%;background-color: rgba(100,100,100,0.8);padding-top: 20px;" >
                    <div style="width: 85%;height: 50px;float: left;"><span style="padding-left: 40px;color:white;font-size: 200%;"><?php echo $page['title'];?></span></div>
                    <div style="height: 50px;float: left;"><a class="btn btn-default" href="pages.php?page=<?php echo $page['slug'];?>">Read More</a></div>
                    <div class="cls"></div>
                </div>
            </div>
            <div style="height: 50px;"></div>

        <?php endforeach;?>

<?php endif; ?>

<?php require 'includes/footer.php';?>