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
$user_Id = $_SESSION['login_id'];
require('OOPDatabase.php');
$database = new OOPDatabase();
if($user_Id == 1){
	$users = $database->getUsers();
}else{
	$users = $database->getUserByOtherId($user_Id);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>users.php</title>
	<link type='text/css' rel='stylesheet' href='style.css'/>
	<link type='text/css' rel='stylesheet' href='style.css'/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">		
</head>
<body>
	<?php include('menu.php') ?>
	<div class="container">
		<?php
		echo '<table class="table table-striped">';
		echo '<tr>';
		echo '<td><b>ID 	 </b></td>';
		echo '<td><b>Name    </b></td>';
		echo '<td><b>Email   </b></td>';
		echo '<td><b>Password</b></td>';
		echo '<td><b> 		 </b></td>';
		echo '<td><b> 		 </b></td>';
		echo '<td><b> 		 </b></td>';
		echo '</tr>';
		foreach ($users as $user) {
			echo '<tr>';
			echo '<td>'.$user->id.'</td>';
			echo '<td>'.$user->name.'</td>';
			echo '<td>'.$user->email.'</td>';
			echo '<td>'.$user->password.'</td>';
			echo '<td><a href="/create_message.php?id='.$user->id.'">message</a></td>';
			echo '<td><a href="/update_user.php?id='.$user->id.'">update</a></td>';
			if($user->id == 1){
				echo '<td></td>';
			}else{
				echo '<td><a href="/delete_user.php?id='.$user->id.'">delete</a></td>';
			}
			echo '</tr>';


		}
		echo '</table>';
		?>
	</div>
</body>
</html>
