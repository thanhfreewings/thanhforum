<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	session_start();
	//check xem dat login chua
	if(!$_SESSION['login_user'])
	{
		header('location: login.php');
	}
	require('OOPDatabase.php');
	$database = new OOPDatabase();

	$user_id = $_GET['id'];
	$user = $database->getUser($user_id);
	//var_dump($user['id']);
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$updateuser = $database->updateUser();
		if($updateuser == true){
			header('location: user.php');
		}else {
			die("Failed to update user");
		}
	}
?>
<html lang="en">
<head>
	<title>update_user.php</title>
	<meta charset="utf-8">
	<?php include('header.php');?>
	<link type='text/css' rel='stylesheet' href='style.css'/>
</head>
<body>
	<?php include('menu.php') ?>
	<div class="container">
		<form class="form-signin" method="POST">
			<h2 class="form-signin-heading">Update user</h2>
			<?php if( isset($updateuser) && $updateuser == false): ?>
				<p>Failed to update user, please try again</p>
			<?php endif;?>
			<label for="inputEmail" class="sr-only">Update Name</label>
			<input value="<?php echo $user['name']; ?>" type="text" id="inputEmail" class="form-control" placeholder="Update Name" name="name">
			<label for="inputEmail" class="sr-only">Update Email address</label>
			<input value="<?php echo $user['email']; ?>" type="text" id="inputEmail" class="form-control" placeholder="Update Email address" name="email">
			<label for="inputPassword" class="sr-only">Update Password</label>
			<input type="password" id="inputPassword" class="form-control" placeholder="Update Password" name="password">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Update User</button>
		</form>
	</div>
</body>
</html>

