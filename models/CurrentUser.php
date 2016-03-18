<?php
require_once('OOPDatabase.php');
class CurrentUser{
	public static function getUser(){
		$database = new OOPDatabase();
		$result = $database->getUserById($_SESSION['login_id']);
		return $result;
	}	
}