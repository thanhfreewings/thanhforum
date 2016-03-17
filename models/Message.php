<?php
require_once('OOPDatabase.php');
class Message{
	public $id;
	public $message;
	public $created_by;
	public $receiver_id;

	public function create($inputs){

	}
	public function delete(){

	}
	public function getSender(){
		$database = new OOPDatabase();
		$user = $database->getUserById($this->created_by);
		return $user;
	}
	public function getReceiver(){
		$database = new OOPDatabase();
		$user = $database->getUserById($this->receiver_id);
		return $user;
	}
}
?>