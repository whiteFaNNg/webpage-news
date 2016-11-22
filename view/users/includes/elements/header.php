<header>
    <nav class="navbar navbar-inverse navbar-fixed-top"  style="border-radius: 0px;">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="myNavbar"  style="width: 61%;margin: auto;">
                <ul class="nav navbar-nav" style="width: 50%;">
                    <li id="indx" class="active"><a href="<?php echo BASE_URL;?>/index.php" style="width: 100%;">News</a></li>
                    <li id="dvc"><a href="<?php echo BASE_URL;?>/devices.php" style="width: 100%;">Devices</a></li>
                    <li id="abts"><a href="<?php echo BASE_URL;?>/about.php" style="width: 100%;">About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li id="myprf"><a href="<?php echo BASE_URL;?>/profile.php"><span class="glyphicon glyphicon-user"></span> <?php if(logged_in()){
                                echo $user_data['name'];
                            }else{
                                echo 'My Profile';
                            } ?></a></li>
                    <li><a href="<?php echo BASE_URL;?>/admin/index.php?opt=1"><span class="glyphicon glyphicon-cog"></span> Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>