<?php
	error_reporting(E_ALL);
	//ini_set('display_errors', 'On');
	session_start();
	//check xem dat login chua
	if(!$_SESSION['login_user'])
	{
		header('location: login.php');
	}
	$user_id = $_GET['id'];
	//echo $user_id;

	require('OOPDatabase.php');
	$database = new OOPDatabase();
	$deleteUser = $database->deleteUser($user_id);
	if($deleteUser == true){
		header('location: user.php');
	}
	else {
		die("Failed to delete user");
	}
?>