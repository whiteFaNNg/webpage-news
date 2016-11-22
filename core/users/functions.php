<?php

function register_user($register_data){
	global $conn;
	$register_data['password'] = md5($register_data['password']);
    $fields = implode(",", array_keys($register_data));
    $data = ':' . implode(", :", array_keys($register_data));
	$result = $conn ->prepare("INSERT INTO users($fields) VALUES($data)");
	$result ->bindParam(':username',$register_data['username']);
	$result ->bindParam(':password',$register_data['password']);
	$result ->bindParam(':name',$register_data['name']);
	$result ->bindParam(':surname',$register_data['surname']);
	$result ->bindParam(':email',$register_data['email']);
	$result ->bindParam(':pic',$register_data['pic']);
	$result ->execute();
}

function user_data($user_id){
	global $conn;
	$user_id = (int)$user_id;
	$func_num_args = func_num_args();
    $func_get_args = func_get_args();
	
		if($func_num_args > 1){
			unset($func_get_args[0]);
			$fields = '`' . implode('`,`', $func_get_args) . '`';
			$result = $conn->query("SELECT $fields FROM users WHERE id = '$user_id'")->fetch(PDO::FETCH_ASSOC);
				return $result;
			
		}
}

function logged_in(){
	return (isset($_SESSION['user_id'])) ? true:false;
}

function user_exist($username){
	$username = e($username);
	global $conn;
	$result = $conn ->prepare ("SELECT username FROM users WHERE username = :username");
	$result -> bindParam(':username',$username);
	$result ->execute();
	$result = $result -> fetch(PDO::FETCH_ASSOC);
	return ($result) ? true : false;
}

function email_exist($email){
	$email = e($email);
	global $conn;
	$result = $conn ->prepare ("SELECT email FROM users WHERE email = :email");
	$result -> bindParam(':email',$email);
	$result -> execute();
	$result = $result ->fetch(PDO::FETCH_ASSOC);
	return ($result) ? true : false;
}

function login($username, $password){
	global $conn;
	$username = e($username);
	$password = md5($password);
	$result = $conn->prepare("SELECT id, username, password FROM users WHERE username=:username AND password=:password");
	$result -> bindParam(':username',$username);
	$result -> bindParam(':password',$password);
	$result ->execute();
	$result = $result ->fetch(PDO::FETCH_ASSOC);
	return ($result) ? $result['id'] : false;
}

?>