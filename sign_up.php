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
<html lang="en">
<head>
	<title>Sign up</title>
	<?php include('header.php'); ?>
	<link type='text/css' rel='stylesheet' href='style.css'/>
</head>

<body>
	<div class="content">
		<div class="container">
			<form class="form-signin" method="POST">
				<h2 class="form-signin-heading">Create your personal account</h2>

				<label for="inputEmail" class="sr-only">Name</label>
				<input type="text" id="inputEmail" class="form-control" placeholder="Name" name="name">
				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="text" id="inputEmail" class="form-control" placeholder="Email address" name="email">
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Please enter your password">
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
			</form>
		</div>
	</div>
</body>

</html>

