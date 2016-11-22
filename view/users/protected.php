<?php

require 'includes/header.php'; ?>


    <div style="padding-top: 50px;">
        <div style="width:50%;margin: auto;">
            <img id="noacs" src="<?php echo BASE_URL;?>/images/others/no_access.jpg" alt="No Access" width="300" height="298">
            <p style="color: red;font-size: 400%;">No Access!</p>
        </div>
    </div>
    <script>
        alert("You need to be Logged in!");
    </script>


<?php require 'includes/footer.php'; ?>