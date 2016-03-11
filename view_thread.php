<?php
error_reporting(E_ALL); 
ini_set('display_errors', 'On');
session_start();

//check xem dat login chua
if(!$_SESSION['login_user'])
{
	header('location: login.php');
}
$user_id = $_SESSION['login_id'];
$thread_id = $_GET['id'];
require('OOPDatabase.php');
$database = new OOPDatabase();
$thread = $database->getThreadById($thread_id);
$comments = $database->getCommentByThreadId($thread_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>view thread</title>
	<?php include('header.php');?>
	<link type='text/css' rel='stylesheet' href='style.css'/>     
</head>
<body>
	<?php include('menu.php') ?>
	<div class="content">
		<div class="container">
			<div class="col-md-9">
				<h4><a href=""><?php echo $thread['title']?></a></h4>
				<?php

				echo '<p>Created at '.date('Y-m-d h:i:s',$thread['created_at']).' update at '.date('Y-m-d h:i:s',$thread['updated_at']).'</p>';
				echo '<p>'.$thread['content'].'</p><br>';
				?>
				<form method="POST" action="add_comment.php">
					<input type="hidden" name="thread_id" value="<?php echo $thread['id']?>">
					<div class="form-group">
						<label>Comment...</label>
						<textarea name="content" class="form-control" rows="3"></textarea>
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</br></br></br>
			</form>

			<ul class="list-group" style="list-style-type:none">
				<?php foreach ($comments as $key => $comment) : ?>
					<li class="list-group">
						<img src="/image/user.png" alt="User" height="25" width="25">
						<div class="userName">
							<p><a href=""><?php echo $database->getNameById($comment->created_by); ?></a></p>
						</div>
						<small>at <?php echo date('Y-m-d h:i:s',$comment->created_at); ?></small>
						<p><?php echo $comment->content ?></p>
					</li>
				</br>	
			<?php endforeach ?>
		</ul>

	</div>
</div>
</div>
</body>
</html>
