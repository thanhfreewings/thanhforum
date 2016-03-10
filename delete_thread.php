<?php
	error_reporting(E_ALL);
	//ini_set('display_errors', 'On');
	session_start();
	//check xem dat login chua
	if(!$_SESSION['login_user'])
	{
		header('location: login.php');
	}
	$threadId = $_GET['id'];
	//echo $user_id;

	require('OOPDatabase.php');
	$database = new OOPDatabase();
	$deleteThread = $database->deleteThread($threadId);
	if($deleteThread == true){
		header('location: thread.php');
	}
	else {
		die("Failed to delete thread");
	}
?>