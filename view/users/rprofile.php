<?php require 'includes/header.php';?>

<?php foreach($errors as $error):?>
    <div class="alert alert-danger">
        <strong>Error!</strong> <?php echo $error;?> <br>
    </div>
<?php endforeach;?>

<div class="container" style="width:50%">
    <form class="form-signin" action="<?php echo BASE_URL;?>/register.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="usr">Username:</label>
            <input name="username" type="text" class="form-control" id="usr" required autofocus>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password_retype" type="password" id="inputPassword" class="form-control" placeholder="Confirm Password" required>
        </div>
        <div class="form-group">
            <label for="usr">First name:</label>
            <input name="name" type="text" class="form-control" id="usr">
        </div>
        <div class="form-group">
            <label for="usr">Last name:</label>
            <input name="surname" type="text" class="form-control" id="usr">
        </div>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
        </div>
        <div class="form-group">
            <label for="pic">Image</label>
            <input name="pic" type="file" id="pic" class="form-control">
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </div>
    </form>
</div>

<script src="<?php echo BASE_URL.'/scripts/profile.js';?>"></script>

<?php require 'includes/footer.php';?>
