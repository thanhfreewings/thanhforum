<?php
include('models/User.php');
include('models/Thread.php');
include('models/Message.php');
include('models/Comment.php');

class OOPDatabase{
	protected $_connection;
	
	public function __construct(){
		$this->_connection = mysqli_connect('localhost','root','123456','company');
	}
	/*	Input:
	1) email
	2) password
	return true or faile*/
	public function login($inputs){
		$email		=$inputs['email'];
		$password 	=$inputs['password'];
		$query = mysqli_query($this->_connection, "select * from user where password='$password' AND email='$email'");
		if ($query->num_rows == 1) {
			$row = mysqli_fetch_array($query);
			$_SESSION['login_user'] = $email;
			$_SESSION['login_id'] = $row['id'];
			$_SESSION['login_name'] = $row['name'];
			$result = true;
		} 
		else {
			$result = false;
		}
		return $result;
	}

	/*
	* Input:
	* 	1) $name: User name
	*	2) $email: User email
	* Return: true or false
	* 	
	*/
	public function createUser($inputs){
		$name	   = $inputs['name'];
		$email 	   = $inputs['email'];
		$password  = $inputs['password'];
		$validData = true;
		$result = false;
		if(	strlen($name) == 0 || 
			strlen($email) == 0 || 
			strlen($password) == 0) 
		{
			$validData = false;
		}
		else{
			$check = mysqli_query($this->_connection, "select * from user where email = '$email'");
			if ($check->num_rows == o) {
				$query = mysqli_query($this->_connection, "insert into user (name, email, password)
								values('$name', '$email', '$password')");
				$result = true;
			}
			else{
				$result = false;
			}
		}
		return $result;
	}
	public function createMessage($inputs){
		$message     = $inputs['message'];
		$created_by  = $_SESSION['login_id'];
		$receiver_id = $inputs['receiver_id'];

		$validData = true;
		if(	strlen($message) == 0) 
		{
			$validData = false;
			$result = false;
		}
		else{
				$query = mysqli_query($this->_connection, "insert into message (message, created_by, receiver_id)
								values('$message', '$created_by', '$receiver_id')");
				$result = true;
		}
		return $result;
	}
	public function createThread($inputs){
		$title      = $inputs['title'];
		$content    = $inputs['content'];
		$created_by = $_SESSION['login_id'];
		$created_at = time();

		$validData = true;
		if(	strlen($title) == 0 ||
			strlen($content) == 0 ||
			strlen($title) > 50) 
		{
			$validData = false;
			$result = false;
		}
		else{
				$query = mysqli_query($this->_connection, "insert into thread (title, content, created_by, created_at)
								values('$title', '$content', '$created_by', '$created_at')");
				$result = true;
		}
		return $result;
	}
	public function addComment($inputs){
		$thread_id  = $inputs['thread_id'];
		$content    = $inputs['content'];
		$created_by = $_SESSION['login_id'];
		$created_at = time();

		$validData = true;
		if(strlen($content) == 0 ) 
		{
			$validData = false;
			$result = false;
		}
		else{
				$query = mysqli_query($this->_connection, "insert into post (thread_id, content, created_by, created_at)
								values('$thread_id', '$content', '$created_by', '$created_at')");
				$result = true;
		}
		return $result;
	}
	public function getCommentByThreadId($id){
		$comments = array();
		$query = mysqli_query($this->_connection, "select * from post where thread_id = $id order by id desc");
		while ($row = mysqli_fetch_array($query)) {
			$comments[] = $this->loadComment($row);
		}
		return $comments;	
	}
	public function loadComment($row){
		$comment = new Comment();
		$comment->id 		 = $row['id'];
		$comment->thread_id  = $row['thread_id'];
		$comment->content    = $row['content'];
		$comment->created_by = $row['created_by'];
		$comment->created_at = $row['created_at'];
		$comment->updated_at = $row['updated_at'];
		return $comment;
	}
	public function replyMessage($inputs){
		$message     = $inputs['message'];
		$created_by  = $_SESSION['login_id'];
		$receiver_id = $_GET['id'];

		$validData = true;
		if(	strlen($message) == 0) 
		{
			$validData = false;
			$result = false;
		}
		else{
				$query = mysqli_query($this->_connection, "insert into message (message, created_by, receiver_id)
								values('$message', '$created_by', '$receiver_id')");
				$result = true;
		}
		return $result;
	} 
	/*
	* Input:
	* 	1) $name: User name
	*	2) $email: User email
	* Return: true or false
	* 	
	*/
	public function updateUser($inputs){
		$id 		= $_GET['id'];
		$name 		= $inputs['name'];
		$email 		= $inputs['email'];
		$password 	= $inputs['password'];
		$validData  = true;
		$result = false;
		if(strlen($name) == 0 ||
		   strlen($email) == 0  ||
		   strlen($password) == 0) 
		{
			$validData = false;
		}	
		else{
			$check = mysqli_query($this->_connection, "select * from user WHERE id = $id");
			if($check->num_rows == 1){
				$query = mysqli_query($this->_connection,"UPDATE `user` SET `name`='$name',`email`='$email',`password`='$password' WHERE `id` = '$id'");
				$result = true;
			}
			else{
				$result = false;
			}
		}
		return $result;
	}
	public function updateThread($inputs){
		$id 		= $_GET['id'];
		$title 		= $inputs['title'];
		$content 	= $inputs['content'];
		$updated_at = time();
		$validData  = true;
		$result = false;
		if(strlen($title) == 0 ||
		   strlen($content) == 0) 
		{
			$validData = false;
		}	
		else{
			$check = mysqli_query($this->_connection, "select * from thread WHERE id = $id");
			if($check->num_rows == 1){
				$query = mysqli_query($this->_connection,"UPDATE `thread` SET `title`='$title',`content`='$content',`updated_at`='$updated_at' WHERE `id` = '$id'");
				$result = true;
			}
			else{
				$result = false;
			}
		}
		return $result;
	}
	/*
	* check ID then delete user_id
	*/
	public function deleteUser($id){
		$check = mysqli_query($this->_connection, "select * from user WHERE id = '$id'");
		if($check->num_rows == 1){
			$query = mysqli_query($this->_connection,"delete from user where id = '$id'");
			$result = true;
		} 
		else {
			$result = false;
		}
		return $result;
	}
	/*
	* check ID then delete message_id
	*/
	public function deleteMessage($message_id){
		$id  	  = $message_id;
		$check    = mysqli_query($this->_connection, "select * from message where id = $id");
		if($check->num_rows == 1){
			$query = mysqli_query($this->_connection,"delete from message where id = $id");
			$result = true;
		} 
		else {
			$result = false;
		}
		return $result;
	}
	public function deleteThread($id){
		$check = mysqli_query($this->_connection, "select * from thread WHERE id = $id");
		if($check->num_rows == 1){
			$query = mysqli_query($this->_connection,"delete from thread where id = $id");
			$result = true;
		} 
		else {
			$result = false;
		}
		return $result;
	}
	public function getUser($id){
		$rows = mysqli_query($this->_connection, "select * from user WHERE id = $id");
		return mysqli_fetch_array($rows);
		
	}
	public function getMessage($id){
		$rows = mysqli_query($this->_connection, "select *from message where id = $id");
		return mysqli_fetch_array($rows);	
	}
	/*
	* Return all users in table user
	*/
	public function getThread(){
		$threads = [];
		$query = mysqli_query($this->_connection, "select * from thread order by id desc");
		while ($row = mysqli_fetch_array($query)) {
			$threads[] = $this->loadThread($row);
		}
		return $threads;
	}
	public function getThreadByUserCreated($id){
		$threads = array();
		$query = mysqli_query($this->_connection, "select * from thread where created_by = $id order by id desc");
		while ($row = mysqli_fetch_array($query)) {
			$threads[] = $this->loadThread($row);
		}
		return $threads;	
	}
	public function getThreadById($id){
		$rows = mysqli_query($this->_connection, "select * from thread where id = $id");
		return mysqli_fetch_array($rows);
	}
	public function loadThread($row){
		$thread = new Thread();
		$thread->id = $row['id'];
		$thread->title = $row['title'];
		$thread->content = $row['content'];
		$thread->created_by = $row['created_by'];
		$thread->created_at = $row['created_at'];
		$thread->updated_at = $row['updated_at'];
		return $thread;
	}
	public function getUsers(){
		$users = array();
		$query = mysqli_query($this->_connection, "select * from user");
		while ($row = mysqli_fetch_array($query)) {
			$users[] = $this->loadUser($row);
		}
		return $users;
	}
	public function getUserById($id){
		$query = mysqli_query($this->_connection, "select * from user where id = $id");
		return mysqli_fetch_array($query);
	}
	public function getUserByOtherId($id){
		$query = mysqli_query($this->_connection, "select * from user where id = $id");
		return mysqli_fetch_array($query);
	}
	public function loadUser($row){
		$user = new User();
		$user->id = $row['id'];
		$user->name = $row['name'];
		$user->email = $row['email'];
		$user->password = $row['password'];
		return $user;
	}
	/*
	* Return all message in table message
	*/
	public function getMessages(){
		$query = mysqli_query($this->_connection, "select * from message");
		return $query;
	}
	public function getMessagesByReceiverId($id){
		$messages = array();
		$query = mysqli_query($this->_connection, "select * from message where receiver_id = $id order by id desc");
		while ($row = mysqli_fetch_array($query)) {
		$messages[] = $this->loadMessage($row);
		}
		return $messages;
	}
	public function getMessagesByCreatedBy($id){
		$query = mysqli_query($this->_connection, "select * from message where created_by = $id order by id desc");
		while ($row = mysqli_fetch_array($query)) {
		$messages[] = $this->loadMessage($row);
		}
		return $messages;
	}
	public function loadMessage($row){
		$message = new Message();
		$message->id = $row['id'];
		$message->message = $row['message'];
		$message->created_by = $row['created_by'];
		$message->receiver_id = $row['receiver_id'];
		return $message;
	}
	public function getNameById($id){
		$query = mysqli_query($this->_connection, "select * from user where id = $id");
		$row = mysqli_fetch_array($query);
		$user = new User();
		$user->name = $row['name'];
		return $user->name;
	}
	public function getAvatarById($id){
		$query = mysqli_query($this->_connection, "select * from user where id = $id");
		$row = mysqli_fetch_array($query);
		$user = new User();
		$user->avatar = $row['avatar'];
		return $user->avatar;
	}

	public function setUserAvatarPath($user_id,$path){
		$query = mysqli_query($this->_connection, "update user set `avatar` = '$path' where id = ".$user_id);
		if(!$query){
			echo("Error description: " . mysqli_error($this->_connection));
			exit();
		}
	}
}