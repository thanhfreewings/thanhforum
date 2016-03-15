<?php
error_reporting(E_ALL);
//ini_set('display_errors', 'On');
session_start(); 

require('OOPDatabase.php');
$database = new OOPDatabase();
$created_by = $_SESSION['login_id'];
$receiver_id = $_GET['id'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$result = $database->replyMessage($_POST);
	if($result == true){
		header('location: sent.php');
	}
	else
	{
		$error = "Failed to sent message";
	}
}
?>
<html lang="en">
<head>
	<title>message</title>
	<?php include('header.php');?>
	<link type='text/css' rel='stylesheet' href='style.css'/>
</head>

<body>
	<?php include('menu.php') ?>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-9" >
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
								<select disabled name="receiver_id" class="form-control">
									<option value="<?php echo $receiver_id; ?>" ><?php echo $database->getNameById($receiver_id); ?>
									</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Send message</button>
								<?php echo '<br><br>'.$error; ?>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include('script.php');?>
</body>

</html>

