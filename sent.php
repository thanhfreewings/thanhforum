<?php
error_reporting(E_ALL); 
//ini_set('display_errors', 'On');
session_start();
$error = '';
	//check xem dat login chua
if(!$_SESSION['login_user']){
	header('location: login.php');
}

$createdBy = $_SESSION['login_id'];
	//var_dump($receiver_id);
require('OOPDatabase.php');
$database = new OOPDatabase();

$messages = $database->getMessagesByCreatedBy($createdBy);
?>

<!DOCTYPE html>
<html>
<head>
	<title>sent.php</title>
	<?php include('header.php');?>
	<link type='text/css' rel='stylesheet' href='style.css'/>
</head>
<body>
	<?php include('menu.php') ?>
	<div class="content">
		<div class="container">
			<table class="table table-email">
				<thead>
					<tr>
						<th class="email-select"><a href="#" data-click="email-select-all"><i class="fa fa-square-o fa-fw"></i></a></th>
						<th colspan="2">
							<a href="" class="email-header-link" >Sent </a>
						</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php if(!empty($messages)): ?>
						<?php foreach($messages as $message): ?>
							<tr>
							<td><a href="/view_user.php?id=<?php echo $message->receiver_id ?>"><img src="<?php echo $message->getReceiver()->avatar ?>" class="img-circle" height="25" width="25"></a></td>
								<td class="email-sender"><a href="/view_user.php?id=<?php echo $message->created_by ?>"><?php echo $message->getReceiver()->name ?></a></td>
								<td><?php echo $message->message ?></td>	
								<td class="email-subject"><a href="/delete_message.php?id=<?php echo $message->id ?>" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a></td>
							</tr>
						<?php endforeach ?>
					<?php endif ?>
				</tbody>
			</table>
			<?php if(empty($messages)){ echo "You do'nt have any messages."; } ?>
		</div>
	</div>
	<?php include('script.php');?>
</body>
</html>
