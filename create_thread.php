<?php
error_reporting(E_ALL);
//ini_set('display_errors', 'On');
session_start(); 

require('OOPDatabase.php');
$database = new OOPDatabase();
$created_by = $_SESSION['login_id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$result = $database->createThread($_POST);
	if($result == true){
		header('location: home.php');
	}
	else
	{
		$error = "Failed to create thread";
	}
}

?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>create thread</title>
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
					<label >Title</label>
						<input name="title" type="text" class="form-control">
					</div>
					<div class="form-group">
					<label >Content</label>
						<textarea name="content" class="form-control" rows="3"></textarea>
					</div>
					
					<button type="submit" class="btn btn-default">Create Thread</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>

