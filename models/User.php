<?php
require_once('OOPDatabase.php');
class User{
	public $id;
	public $name;
	public $email;
	public $password;
	public $avatar;

	public function create($inputs){

	}
	public function update(){

	}
	public function delete(){

	}
	public function getUser(){
		$database = new OOPDatabase();
		$user = $database->getUserById($this->id);
		return $user;
	}
}
?>