<?php
error_reporting(E_ALL); 
ini_set('display_errors', 'On');
session_start();
	//check xem da login chua
if(!$_SESSION['login_user'])
{
	header('location: login.php');
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$users = array();
	require('OOPDatabase.php');
	$database = new OOPDatabase();
	$users = $database->search($_POST);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<?php include('header.php'); ?>
	<link type='text/css' rel='stylesheet' href='style.css'/>
</head>
<body>
	<?php include('menu.php') ?>
	<div class="content">
		<div class="container">
			<?php if(!empty($users)): ?>
				<?php foreach ($users as $key => $user): ?>
					<a href="/view_user.php?id=<?php echo $user->id ?>"><img src="<?php echo $user->getUser()->avatar ?>" class="img-circle" height="40" width="40"><div class="avatar_search"><h5><?php echo $user->name ?></h5></div></a><br><hr>
				<?php endforeach ?>
			<?php endif ?>
			<?php if(empty($users)): ?>
				<p>Don't have result search...</p>
			<?php endif ?>
		</div>
	</div>
	<?php include('script.php') ?>
</body>
</html>
