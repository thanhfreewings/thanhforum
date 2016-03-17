<?php
error_reporting(E_ALL); 
ini_set('display_errors', 'On');
session_start();
	//check xem dat login chua
if(!$_SESSION['login_user']){
	header('location: login.php');
}
require('OOPDatabase.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>delete complete</title>
	<?php include('header.php');?>
	<link type='text/css' rel='stylesheet' href='style.css'/>
</head>
<body>
	<?php include('menu.php') ?>
	<div class="content">
		<div class="container">
			<p class="text-center text-success">Delete message complete!</p>
		</div>
	</div>
</div>
<?php include('script.php');?>
</body>
</html>
