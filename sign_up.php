<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start(); 

require('OOPDatabase.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$database = new OOPDatabase();
	$result = $database->createUser($_POST);
	if($result == true){
		header('location: login.php');
	}
	else
	{
		echo "Failed to signup";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SignUp|Thanhforum</title>
	<?php include('header.php') ?>
</head>
<body>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div style="" class="panel">
						<div class="panel-body">
							<form method="POST">
								<fieldset>
									<legend>Sign Up</legend>
									<div class="form-group">
										<label for="exampleInputEmail1">Name</label>
										<input name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email" type="text">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Email address</label>
										<input name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" type="text">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Password</label>
										<input name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
									</div>
									<button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button></br>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include('script.php') ?>
</body>
</html>


