<?php require 'includes/header.php';?>
    <div style="width: 80%;margin:auto">
    <h2>Edit Page</h2>
        <hr>
    <form action="<?php echo BASE_URL;?>/admin/edit.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <label for="pic">
            Picture:
            <input type="file" name="pic" id="pic" value="Chose New Image">
            <img src="<?php echo BASE_URL.'/'.$page['pic'];?>" alt="Image" style="width: 100%;height: auto;">
        </label>
        <label for="title">
            Title:
            <input type="text" name="title" id="title" value="<?php echo $page['title'];?>">
        </label>
        <label for="slug">
            Slug:
            <input type="text" name="slug" id="slug" value="<?php echo $page['slug'];?>">
        </label>
        Body:
        <textarea name="body" rows="10" col="30"><?php echo $page['body'];?></textarea>
        <input type="hidden" name="id" value="<?php echo $page['id'];?>">
        <input class="btn btn-default" type="submit" value="Update">
    </form>
    </div>
<?php require 'includes/footer.php';?>