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
			<div class="edit_user">
				<div class="note note-info">
				<ul>
					<a href="/upload_image.php"><img src="<?php echo $user->avatar; ?>" alt="upload avatar" height="100" width="100"></a>
					<h3><?php echo $user->name ?></h3><hr>
					<li>Email: <?php echo $user->email ?></li><br>
					<li>Phone number:</li><br>
					<li><a href="/thread.php">thread</a></li><br>
					<li><a href="/update_user.php?id=<?php echo $user->id ?>">edit profile</a></li><br>
					<li><a href="/delete_user.php?id=<?php echo $user->id ?>">delete user!</a></li><br>
				</ul>
				</div>
			</div>
		</div>
	</div>
	<?php include('script.php');?>
</body>
</html>
