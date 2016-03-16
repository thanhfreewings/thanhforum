<?php
error_reporting(E_ALL); 
ini_set('display_errors', 'On');
session_start();

//check xem da login chua
if(!$_SESSION['login_user'])
{
	header('location: login.php');
}
$user_id = $_SESSION['login_id'];
require('OOPDatabase.php');
$database = new OOPDatabase();
$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$target_file =  'uploads/'. time() .'_'.$_FILES["avatar"]['name'];
	if($target_file != 'uploads/'. time() .'_'){
		$result = move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

		$database->setUserAvatarPath($user_id,$target_file);
		header('location: user.php');
	}else{
		$error = 'Failed to upload avatar!';
	}
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
			<form method="POST" enctype="multipart/form-data" class="form-horizontal">
			    Select image to upload:
			    <input type="file" name="avatar" id="fileToUpload"><br>
			    <?php if(!empty($error)): ?>
					<?php echo $error ?>
				<?php endif ?>
			    <button type="submit" class="btn btn-default">Upload</button>
			</form>
			<br><hr style="border-width: 2px;">
		</div>
	</div>
	<?php include('script.php');?>
</body>
</html>
