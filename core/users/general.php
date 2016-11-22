<?php 

function display(){
	if(logged_in() === false){
		header('Location: protected.php');
		exit();
	}
}

function e($data){
	return htmlspecialchars($data,ENT_QUOTES,'UTF-8');
}

?>