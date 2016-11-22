<?php require 'includes/header.php';?>

<h2>Add New Page</h2>
<form action="<?php echo BASE_URL;?>/admin/add.php" method="POST" autocomplete="off" enctype="multipart/form-data">
    <label for="pic">
        Picture:
        <input type="file" name="pic" id="pic">
    </label>
    <label for="title">
        Title:
        <input type="text" name="title" id="title">
    </label>
    <label for="slug">
        Slug:
        <input type="text" name="slug" id="slug">
    </label>
    Body:
    <textarea name="body" rows="10" col="30"></textarea>
    <input type="submit" value="Save">
</form>

<?php require 'includes/footer.php';?>
