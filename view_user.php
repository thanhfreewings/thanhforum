<?php
error_reporting(E_ALL); 
ini_set('display_errors', 'On');
session_start();
	//$error = '';

	//check xem da login chua
if(!$_SESSION['login_user'])
{
	header('location: login.php');
}
$user_id = $_GET['id'];
require('OOPDatabase.php');
$database = new OOPDatabase();
$user = $database->getUserById($user_id);
$threadCount = $database->getThreadByUserCreated($user_id);
$threads = $database->getThreadByUserCreated($user_id);
?>

<!DOCTYPE html>
<html>
<head>
	<title>view user</title>
	<?php include('header.php'); ?>
	<link type='text/css' rel='stylesheet' href='style.css'/>
</head>
<body>
	<?php include('menu.php') ?>
	<div class="content">
		<div class="container">
			<img src="<?php echo $user->avatar ?>" class="img-circle" alt="avatar" height="85" width="85">
			<div class="viewUser">
				<br><br>
				<h3>User name: <?php echo $user->name ?></h3>
				<a href="/reply_message.php?id=<?php echo $user->id ?>">message </a><a href="thread_user.php?id=<?php echo $user->id ?>"> thread</a>
				<p>Thread created: <?php echo count($threadCount) ?></p>
				<p>Email: <?php echo $user->email ?></p>
			</div>
			<hr style="border-width: 2px;">
			<div class="col-xs-12 col-sm-9">
				<?php
				if(!empty($threads)){
					foreach($threads as $thread) {
						echo '<h4><a href="/view_thread.php?id='.$thread->id.'">'.$thread->title.'</a></h4>';
						echo '<p>Created at '.date('Y-m-d h:i:s',$thread->created_at);
						if(!empty($thread->updated_at)){
							echo ' update at '.date('Y-m-d h:i:s',$thread->updated_at).'</p>';
						}
						echo '<p>'.$thread->content.'</p><br>';
					}
				}else{
					echo 'do not have a thread...';
				}
				?>
			</div>
		</div>
	</div>
	<?php include('script.php') ?>
</body>
</html>
