<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start(); 

require('OOPDatabase.php');
$database = new OOPDatabase();
$created_by = $_SESSION['login_id'];
$threadId = $_GET['id'];
$thread = $database->getThreadById($threadId);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$result = $database->updateThread($_POST);
	if($result == true){
		header('location: thread.php');
	}
	else
	{
		$error = "Failed to update thread";
	}
}

?>
<html lang="en">
<head>
	<title>update thread</title>
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
							<label >Title</label>
							<input value="<?php echo $thread['title']; ?>" name="title" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label >Content</label>
							<textarea name="content" class="form-control" rows="3"><?php echo $thread['content']; ?></textarea>
						</div>

						<button type="submit" class="btn btn-default">Update Thread</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include('script.php');?>
</body>

</html>