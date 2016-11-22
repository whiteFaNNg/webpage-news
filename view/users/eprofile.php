<?php require 'includes/header.php';?>

<?php foreach($errors as $error):?>
    <div class="alert alert-danger">
        <strong>Error!</strong> <?php echo $error;?> <br>
    </div>
<?php endforeach;?>

<div style="width: 50%;margin: auto;">
    <form method="POST" action="<?php echo BASE_URL."/pedit.php";?>" autocomplete="off" enctype="multipart/form-data">
        <div class="form-group">
            <label for="usr">Username:</label>
            <input name="username" type="text" class="form-control" id="usr" placeholder="<?php echo $user_data['username'];?>" autofocus>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Old Password (Must be entered!)</label>
            <input name="password_old" type="password" id="inputPassword" class="form-control" placeholder="Old Password" >
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">New Password</label>
            <input name="password_new" type="password" id="inputPassword" class="form-control" placeholder="New Password" >
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Re-type Password</label>
            <input name="password_retype" type="password" id="inputPassword" class="form-control" placeholder="Confirm Password" >
        </div>
        <div class="form-group">
            <label for="usr">First name:</label>
            <input name="name" type="text" class="form-control" id="usr" placeholder="<?php echo $user_data['name'];?>">
        </div>
        <div class="form-group">
            <label for="usr">Last name:</label>
            <input name="surname" type="text" class="form-control" id="usr" placeholder="<?php echo $user_data['surname'];?>">
        </div>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="<?php echo $user_data['email'];?>" >
        </div>
        <div class="form-group">
            <label for="pic">Image</label>
            <input name="pic" type="file" id="pic" class="flow-control">
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
        </div>
    </form>
</div>

<script src="<?php echo BASE_URL.'/scripts/profile.js';?>"></script>

<?php require 'includes/footer.php';?>
