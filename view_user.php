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
</head>
<body>
	<?php include('menu.php') ?>
	<div class="content">
		<div class="container">
			<?php
				echo '<br><br>';
				echo '<h3>User name: '.$user['name'].'</h3>';
				echo '<a href="/reply_message.php?id='.$user['id'].'">message </a><a href="thread_user.php?id='.$user['id'].'"> thread</a><br>';
				echo 'Thread created: '.count($threadCount);				
				echo '<p>Email: '.$user['email'].'</p>';
			?>
		</div>
	</div>
</body>
</html>
