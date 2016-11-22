<?php require 'includes/header.php';?>
<?php if(empty($users)): ?>
    <br>
    <div class="alert alert-info">
        <p><strong>Info!</strong>  No Users to Display</p>
    </div>
<?php else: ?>
    <table class="table table-hover" id="tabl1">
        <thead>
            <tr>
                <th>
                    pic
                </th>
                <th>
                    username
                </th>
                <th>
                    name
                </th>
                <th>
                    surname
                </th>
                <th>
                    email
                </th>
                <th>
                    delete
                </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td style="width: 10%;">
                    <img src="../<?php echo $user['pic']?>" alt="HTML5 Icon" style="width:50px;height:50px;">
                </td>
                <td style="width: 20%;">
                    <?php echo $user['username']?>
                </td>
                <td style="width: 15%;">
                    <?php echo $user['name']?>
                </td>
                <td style="width: 15%;">
                    <?php echo $user['surname']?>
                </td>
                <td style="width:30%;">
                    <?php echo $user['email']?>
                </td>
                <td style="width: 10%;">
                   <a href="<?php echo BASE_URL;?>/admin/udelete.php?id=<?php echo $user['id'];?>"><span class="glyphicon glyphicon-remove" style="padding-top: 15px;"></span></p></a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php endif; ?>
<script src="<?php echo BASE_URL.'/scripts/admin-user.js';?>"></script>

<?php require 'includes/footer.php';?>
