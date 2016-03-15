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
$user_id = $_SESSION['login_id'];
require('OOPDatabase.php');
$database = new OOPDatabase();
$user = $database->getUserById($user_id);


?>

<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<?php include('header.php');?>
	<link type='text/css' rel='stylesheet' href='style.css'/>
</head>
<body>
	<?php include('menu.php') ?>
	<div class="content">
		<div class="container">
			<a href="/upload_image.php"><img src="<?php echo $user['avatar']; ?>" alt="upload avatar" height="100" width="100"></a>
			<div class="edit_user">
				<h3><?php echo $user['name'] ?></h3>
				<p>Email: <?php echo $user['email'] ?></p><br>
				<p>Phone number:</p><hr>
				<p><a href="/thread.php">thread</a></p><hr>
				<p><a href="/update_user.php?id=<?php echo $user['id'] ?>">edit </a></p><hr>
				<p><a href="/delete_user.php?id=<?php echo $user['id'] ?>">delete user!</a></p><hr>
			</div>
		</div>
	</div>
	<?php include('script.php');?>
</body>
</html>
