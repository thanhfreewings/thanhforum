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
$userId = $_GET['id'];
require('OOPDatabase.php');
$database = new OOPDatabase();
$user = $database->getUserByOtherId($userId);
$threadCount = $database->getThreadByUserCreated($userId);

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
			<img src="/image/user.png" alt="User" height="85" width="85">
			<div class="viewUser">
			<?php
				echo '<br><br>';
				echo '<h3>User name: '.$user['name'].'</h3>';
				echo '<a href="/reply_message.php?id='.$user['id'].'">message </a><a href="thread_user.php?id='.$user['id'].'"> thread</a><br>';
				echo 'Thread created: '.count($threadCount);				
				echo '<p>Email: '.$user['email'].'</p>';
			?>
			</div>
			<hr style="border-width: 2px;">
		</div>
	</div>
</body>
</html>
