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

	$result = $database->updateUser($_POST);
	if($result == true){
		header('location: user.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thanhforum</title>
	<?php include('header.php') ?>
</head>
<body>
	<?php include('menu.php') ?>

	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Update user</h4>
						</div>
						<div class="panel-body">
							<form method="POST">
								<fieldset>
									<legend>Enter information to update</legend>
									<div class="form-group">
										<label for="exampleInputEmail1">Name</label>
										<input value="<?php echo $user['name'] ?>" name="name" class="form-control" type="text">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Email address</label>
										<input value="<?php echo $user['email'] ?>" name="email" class="form-control" type="text">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Password</label>
										<input value="<?php echo $user['password'] ?>" name="password" class="form-control" type="password">
									</div>
									<button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button>
									<a type="submit" class="btn btn-sm btn-default" href="user.php">Cancel</a>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'script.php'; ?>
</body>

</html>