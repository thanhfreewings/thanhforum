<?php
	error_reporting(E_ALL); 
	ini_set('display_errors', 'On');

	session_start();
	if(isset($_SESSION['login_user'])){
		unset($_SESSION['login_user']);  //Is Used To Destroy Specified Session	
	}

	header('location: login.php');

?>