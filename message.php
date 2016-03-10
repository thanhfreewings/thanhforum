<?php
error_reporting(E_ALL); 
//ini_set('display_errors', 'On');
session_start();
$error = '';
	//check xem dat login chua
if(!$_SESSION['login_user']){
	header('location: login.php');
}

$receiver_id = $_SESSION['login_id'];
	//var_dump($receiver_id);
require('OOPDatabase.php');
$database = new OOPDatabase();
$messages = $database->getMessagesByReceiverId($receiver_id);
?>

<!DOCTYPE html>
<html>
<head>
	<title>message.php</title>
	<link type='text/css' rel='stylesheet' href='style.css'/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<?php include('menu.php') ?>

	<div class="container">
		<?php
		echo '<table class="table">';
				echo '<tr class="active">';
				echo 	'<td>ID 	</td>';
				echo 	'<td>Message</td>';
				echo 	'<td>Sender </td>';
				echo 	'<td> 		</td>';
				echo 	'<td> 		</td>';
				echo '</tr>';
		if($messages != NULL){
			foreach($messages as $message)
			{
				echo '<tr>';
				echo 	'<td>'.$message->id.'</td>';
				echo 	'<td>'.$message->message.'</td>';
				echo 	'<td>'.$database->getNameById($message->created_by).'</td>';
				echo 	'<td><a href="/reply_message.php?id='.$message->created_by.'">Reply</a></td>';
				echo 	'<td><a href="/delete_message.php?id='.$message->id.'">Delete</a></td>';
				echo '</tr>';
			}	
		}else{
			echo '<tr><td>your inbox is empty...</td></tr>';
		}
		echo '</table>';
		?>
	</div>
</body>
</html>
