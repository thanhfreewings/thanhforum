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
	    <meta charset="utf-8">
	    <title>Sign up</title>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<link type='text/css' rel='stylesheet' href='style.css'/>
	</head>

	<body>
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

    </div> <!-- /container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>	    	
  	</body>

</html>

