<?php require 'includes/header.php';?>
<div style="width: 80%;margin: auto;">
    <?php if($page): ?>

        <h1><?php echo e($page['title']);?></h1>
        <div>
            <img src="<?php echo $page['pic']?>" style="width: 100%;height: auto">
        </div>
        <br/>
        <div style="font-size: 150%;min-height: 200px;"><?php echo e($page['body']);?></div>
        <table>
            <tr>
                <td class="faded">Created: <?php echo $page['created']->format('Y M D');?></td>
                <td class="faded">Updated: <?php if($page['updated']){echo $page['updated']->format('Y M D');}?></td>
            </tr>
        </table>
        <?php if($comm): ?>
            <p>Comments</p>
            <div id="commresponse">
                <table id="tabl2">
                    <?php foreach($comm as $com): ?>
                        <tr >
                            <td style="width: 15%;">
                                <img src="<?php echo $com['pic']?>" alt="HTML5 Icon" style="width:50px;height:50px;">
                            </td>
                            <td style="text-align: left;font-size: 130%;font-weight: bold;color:teal;border-bottom: 1px solid rgb(200,200,200);">
                                <?php echo $com['name']; ?>
                            </td>
                            <td class="faded" style="text-align: right;border-bottom: 1px solid rgb(200,200,200);">
                                <?php echo $com['created']->format('Y M');?>
                            </td>
                            <td style="width: 10%;">

                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2" class="commbody"><?php echo $com['body']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                </table>
            </div>
        <?php else: ?>
            <div id="commresponse"><p>No Comments to Display</p></div>
        <?php endif;?>
        <table>

            <tr style="background-color: #dddddd">
                <td style="padding-bottom: 10px;width: 15%;">
                    <img src="<?php echo $user_data['pic']?>" alt="HTML5 Icon" style="width:50px;height:50px;">
                </td>
                <td colspan="2" style="padding-bottom: 10px;">
                    <input type="text" name="comment" id="commtext" onkeydown = "if (event.keyCode == 13) myFunc()">
                </td>
            </tr>
        </table>
        <hr>
        <div>
            <div style="width: 50px;margin: auto;">
            <a class="btn btn-default" style="background-color: rgb(140,140,140);color:white; padding-top:14px;padding-left:8px;width:50px;height: 50px;border-radius: 50%;" href="index.php">Back</a>
            </div>
        </div>
    <?php else: ?>
        <p>Page not found</p>
    <?php endif; ?>
</div>

<script>
    var myVar = setInterval(myFunc2, 2000);
    function myFunc() {
        var txt=document.getElementById('commtext').value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("commresponse").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("POST", "rsp/comresponse.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("pid=<?php echo $page['id'];?>&uid=<?php echo $user_data['id'];?>&comm="+txt);
        document.getElementById('commtext').value="";
    }
    function myFunc2() {
        var xhttp1 = new XMLHttpRequest();
        xhttp1.onreadystatechange = function() {
            if (xhttp1.readyState == 4 && xhttp1.status == 200) {
                document.getElementById("commresponse").innerHTML = xhttp1.responseText;
            }
        };
        xhttp1.open("POST", "rsp/comresponse.php", true);
        xhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp1.send("pid=<?php echo $page['id'];?>");
    }

</script>

<?php require 'includes/footer.php';?>
