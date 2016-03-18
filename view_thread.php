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

				<ul class="forum-list forum-detail-list">
					<li>
						<div class="media">
							<img src="<?php echo $thread->getUser()->avatar ?>" >
							<span class="label label-inverse">POSTER</span>
						</div>
						<div class="info-container">
							<div class="post-user"><a href="/view_user.php?id=<?php echo $thread->created_by ?>"><?php echo $thread->getUser()->name ?></a><small><?php echo $thread->title ?></small></div>
							<div class="post-content">
								<?php echo $thread->content ?>
							</div>
							<div class="post-time">
								at <?php echo date('Y-m-d h:i:sa',$thread->created_at); ?>
								<?php if(!empty($thread->updated_at)){ echo 'update at '.date('Y-m-d h:i:sa',$thread->updated_at); } ?>
								</div>
							</div>
						</li>
					</ul>
					<ul class="forum-list forum-detail-list">
						<li>
							<div class="info-container">
								<div class="panel panel-forum">
									<div class="panel-heading">
										<h4 class="panel-title">Comment</h4>
									</div>
									<div class="panel-body">
										<form action="add_comment.php" name="wysihtml5" method="POST">
											<input type="hidden" name="thread_id" value="<?php echo $thread->id ?>">
											<textarea class="textarea form-control" name="content" placeholder="Enter text ..." rows="10"></textarea>
											<div class="m-t-10">
												<button type="submit" class="btn btn-theme">Post Comment <i class="fa fa-paper-plane"></i></button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</li>
					</ul>
					<ul class="forum-list forum-detail-list">
						<?php foreach ($comments as $key => $comment) : ?>
							<li>
								<div class="media">
									<img src="<?php echo $comment->getUser()->avatar ?>" >
									<span class="label label-inverse">USER</span>
								</div>
								<div class="info-container">
									<div class="post-user"><a href="/view_user.php?id=<?php echo $comment->created_by ?>"><?php echo $comment->getUser()->name ?></a><small>SAYS</small></div>
									<div class="post-content">
										<?php echo $comment->content ?>
									</div>
									<div class="post-time">at <?php echo date('Y-m-d h:i:sa',$comment->created_at); ?></div>
								</div>
							</li>
						<?php endforeach ?>                        
					</ul>
				</div>
			</div>
		</div>
		<?php include('script.php');?>
	</body>
	</html>
