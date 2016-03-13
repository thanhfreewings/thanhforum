<?php
error_reporting(E_ALL); 
//ini_set('display_errors', 'On');
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
if($user_id == 1){
	$users = $database->getUsers();
}else{
	$users = $database->getUserById($user_id);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<?php include('header.php');?>
</head>
<body>
	<?php include('menu.php') ?>
	<div class="content">
		<div class="container">
			<table class="table table-striped">
				<tr>
					<td><b>Name    </b></td>
					<td><b>Email   </b></td>
					<td><b> 		 </b></td>
					<td><b> 		 </b></td>
					<td><b> 		 </b></td>
				</tr>
				<?php if(!empty($users)): ?>
					<?php foreach ($users as $user): ?>
						<tr>
							<td><a href="/view_user.php?id=<?php echo $user->id ?>"><?php echo $user->name ?></a></td>
							<td><a><?php echo $user->email ?></a></td>
							<td><a href="/reply_message.php?id=<?php echo $user->id ?>">message</a></td>
							<td><a href="/update_user.php?id=<?php echo $user->id ?>">update</a></td>
							<?php if($user->id == 1): ?>
								<td></td>
							<?php endif ?>
							<?php if($user->id != 1): ?>
								<td><a href="/delete_user.php?id='.$user->id.'">delete</a></td>
							<?php endif ?>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
			</table>
		</div>
	</div>
	<?php include('script.php');?>
</body>
</html>
