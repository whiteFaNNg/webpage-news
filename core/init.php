<?php 
session_start();

ini_set('display_errors','On');

require 'variables/variables.php';
require 'database/connect.php';
require 'users/general.php';
require 'users/functions.php';



	if(logged_in()){
		$session_user_id = $_SESSION['user_id'];
		$user_data = user_data($session_user_id, 'id', 'username', 'password', 'name', 'surname', 'email', 'pic');
	}


$errors = array();



?>