<?php require 'includes/header.php';?>
<br/><br/><br/><br/><br/>
<div style="width: 30%;margin: auto">
    <form role="form" action="<?php echo BASE_URL;?>/login.php" method="POST" autocomplete="off">
        <div class="form-group">
            <label style="text-align: center;" for="username">Username</label>
            <input type="username" class="form-control" name="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label style="text-align: center;" for="pwd">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password">
        </div>
        <div style="text-align: center;">
            <input type="submit" class="btn btn-primary" style="width: 49%;" value="Log in"/>
        </div>
    </form>
    <br/>
    <p style="text-align: center;">Still don't have account? Register <a href="<?php echo BASE_URL;?>/register.php">here</a> for free!</p>
</div>

<script src="<?php echo BASE_URL.'/scripts/profile.js';?>"></script>

<?php require 'includes/footer.php';?>