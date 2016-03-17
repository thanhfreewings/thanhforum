<?php
	error_reporting(E_ALL);
	//ini_set('display_errors', 'On');
	session_start();
	//check xem dat login chua
	if(!$_SESSION['login_user'])
	{
		header('location: login.php');
	}
	$message_id = $_GET['id'];
	require('OOPDatabase.php');
	$database = new OOPDatabase();
	$deleteMessage = $database->deleteMessage($message_id);
	if($deleteMessage == true){
		header('location: delete_complete.php');
	}
?>

