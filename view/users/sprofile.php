<?php require 'includes/header.php';?>
<div style="width: 80%;margin: auto;">
    <div id="test1" style="width: 25%;height:130px;float:left;overflow: hidden;border-radius: 50%;position:relative;">
        <img id="test2" style="position:absolute;" src="<?php echo BASE_URL."/".$user_data['pic'];?>" alt="Profile Picture" width="100%" height="auto" >
    </div>
    <div style="width: 75%;float: left;padding-left: 30px;position: relative;padding-top: 20px;">
        <p class="uinfo"><b>Username: </b><?php echo $user_data['username'];?></p>
        <p class="uinfo"><b>Name: </b><?php echo $user_data['name'];?></p>
        <p class="uinfo"><b>Surname: </b><?php echo $user_data['surname'];?></p>
        <p class="uinfo"><b>E-mail: </b><?php echo $user_data['email'];?></p>
        <hr>
        <a class="btn btn-warning" href="<?php echo BASE_URL."/logout.php";?>" style="position:absolute;top:20px;right:0px;width: 80px;">Log Out</a>
        <a class="btn btn-info" href="<?php echo BASE_URL."/pedit.php";?>" style="position:absolute;bottom:30px;right:0px;width: 80px;">Edit</a>
    </div>
    <div class="cls"></div>
</div>
<div>
    <div style="padding: 20px 50px;">
        <p style="font-size: 150%;color:rgb(160,160,160);width: 30%;border: 1px solid rgb(220,200,220);border-radius: 3px;margin: auto;padding: 10px 0px;">My Comments</p>
    </div>
    <div style="width: 60%;margin: auto;">
        <?php if($comments):?>
        <?php foreach($comments as $comm):?>
            <div style="background-color: rgb(240,240,240);margin-top: 20px;">
                <div style="width: 100%;"><p style="text-align: left;color: rgb(140,140,140);padding: 10px 20px;"><?php echo $comm['body'];?></p></div>
                <div style="position: relative;width: 100%;height: 30px;padding-top: 5px;">
                    <span style="position: absolute;left:20px;font-size: 90%;" class="faded">Created: <?php echo $comm['created']->format('Y M D');?></span>
                    <a style="position: absolute;right:20px;" href="<?php echo BASE_URL."/cdelete.php?id=".$comm['id'];?>" >Delete</a>
                </div>
            </div>
        <?php endforeach;?>
        <?php else:?>
            <div style="padding-top: 100px;">
                <p style="font-size: 180%;color:rgb(140,140,140);">No Comments to Display</p>
            </div>
        <?php endif;?>
    </div>
</div>

<script src="<?php echo BASE_URL.'/scripts/picture.js';?>"></script>

<script src="<?php echo BASE_URL.'/scripts/profile.js';?>"></script>

<?php require 'includes/footer.php';?>
