<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start(); 

require('OOPDatabase.php');
$database = new OOPDatabase();
$created_by = $_SESSION['login_id'];
$users = $database->getUsers();
$error = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$result = $database->createMessage($_POST);
	if($result == true){
		header('location: sent.php');
	}
	else
	{
		$error = "Failed to sent message!";
	}
}
?>
<html lang="en">
<head>
	<title>create message</title>
	<?php include('header.php');?>
	<link type='text/css' rel='stylesheet' href='style.css'/>
</head>

<body>
	<?php include('menu.php') ?>
	<div class="content">
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
								<?php if(!empty($error)): ?>
									<div class="alert alert-warning fade in m-b-15">
										<strong>Error! </strong>
										<?php echo $error ?>
									</div>
								<?php endif ?>
								<button type="submit" class="btn btn-default">Send message</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include('script.php') ?>
</body>

</html>

