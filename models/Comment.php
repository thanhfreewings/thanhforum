<?php
require_once('OOPDatabase.php');

class Comment{
	public $id;
	public $thread_id;
	public $content;
	public $created_by;
	public $created_at;
	public $updated_at;

	public function create($inputs){

	}
	public function delete(){

	}
	public function getUser(){
		$database = new OOPDatabase();
		return $database->getUserById($this->created_by);
	}
	
}
?>