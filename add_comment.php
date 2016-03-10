<?php

error_reporting(E_ALL); 
//ini_set('display_errors', 'On');
session_start();

//check xem dat login chua
if(!$_SESSION['login_user'])
{
	header('location: login.php');
}
$created_by = $_SESSION['login_id'];
//$thread_id  = $_POST['thread_id'];
//$content    = $_POST['content'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	require('OOPDatabase.php');
	$database = new OOPDatabase();
	$database->addComment($_POST);
	header('location: view_thread.php?id='.$_POST['thread_id']);
}