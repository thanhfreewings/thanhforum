<?php

require_once('OOPDatabase.php');

class Thread{
	public $id;
	public $title;
	public $content;
	public $created_by;
	public $created_at;
	public $updated_at;

	public function create($inputs){

	}
	public function update(){
		
	}
	public function delete(){

	}
	public function getUser(){
		$database = new OOPDatabase();
		$user = $database->getUserById($this->created_by);
		return $user;
	}
	public function getRecentUserReplies(){
		$users = array();
		$database = new OOPDatabase();
		$comments = $database->getCommentByThreadId($this->id);
		foreach ($comments as $key => $comment) {
			$users[] = $database->getUserById($comment->created_by);
		}
		return $users;
	}
}
?>