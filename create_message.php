<?php
error_reporting(E_ALL);
//ini_set('display_errors', 'On');
session_start(); 

require('OOPDatabase.php');
$database = new OOPDatabase();
$created_by = $_SESSION['login_id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$result = $database->createMessage($_POST);
	if($result == true){
		header('location: sent.php');
	}
	else
	{
		$error = "Failed to sent message";
	}
}
$users = $database->getUsers();

?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>create message</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include('header.php');?>
</head>

<body>
	<?php include('menu.php') ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal" method="POST">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea name="message" class="form-control" rows="3"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Send to</label>
						<div class="col-sm-10">
							<select name="receiver_id" class="form-control">
								<?php foreach ($users as $user): ?>
									<?php if($created_by != $user->id): ?>
										<option value="<?php echo $user->id; ?>" ><?php echo $user->name; ?>
										</option>
									<?php endif;?>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Send message</button>
							<?php echo '<br><br>'.$error; ?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>

