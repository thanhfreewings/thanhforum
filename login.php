<?php
	error_reporting(E_ALL); 
	ini_set('display_errors', 'On');
	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		require('OOPDatabase.php');
		$database = new OOPDatabase();
		$login = $database->login($_POST);
		if($login == true){
			header('location: home.php');
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<?php include('header.php'); ?>
		<link type='text/css' rel='stylesheet' href='style.css'/>
	</head>
	<body>

		 <div class="container">
			<form class="form-signin" method="POST">
				<h2 class="form-signin-heading">Please sign in</h2>

				<?php if( isset($login) && $login == false): ?>
				 <p>Failed to login, please try again</p>
				<?php endif;?>

				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="text" id="inputEmail" class="form-control" placeholder="Email address" name="email">
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Please enter your password">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="remember-me"> Remember me
					</label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				<br>
				<a href = "/sign_up.php">Create an account.</a>
			</form>

		</div>
	</body>
</html>
