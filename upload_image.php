<?php
error_reporting(E_ALL); 
ini_set('display_errors', 'On');
session_start();
//$error = '';

//check xem da login chua
if(!$_SESSION['login_user'])
{
	header('location: login.php');
}
$user_id = $_SESSION['login_id'];
require('OOPDatabase.php');
$database = new OOPDatabase();


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$target_file =  'uploads/'. time() .'_'.$_FILES["avatar"]['name'];
	$result = move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

	$database->setUserAvatarPath($user_id,$target_file);
	header('location: user.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload image</title>
	<?php include('header.php');?>
	<link type='text/css' rel='stylesheet' href='style.css'/>
</head>
<body>
	<?php include('menu.php') ?>
	<div class="content">
		<div class="container">
			<br>
			<form method="POST" enctype="multipart/form-data">
			    Select image to upload:
			    <input type="file" name="avatar" id="fileToUpload">
			    <input type="submit" value="Upload Image" name="submit">
			</form>
			<br><hr style="border-width: 2px;">
		</div>
	</div>
	<?php include('script.php');?>
</body>
</html>
