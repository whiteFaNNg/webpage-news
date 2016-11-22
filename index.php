<?php
require 'core/init.php';

$pages = $conn->query("SELECT * FROM posts ORDER BY created DESC")->fetchAll(PDO::FETCH_ASSOC);

require 'view/users/plist.php';

