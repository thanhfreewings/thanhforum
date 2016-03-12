<?php
error_reporting(E_ALL); 
ini_set('display_errors', 'On');
session_start();

//check xem dat login chua
if(!$_SESSION['login_user'])
{
	header('location: login.php');
}
$user_Id = $_SESSION['login_id'];
require('OOPDatabase.php');
$database = new OOPDatabase();
$threads = $database->getThread();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<?php include('header.php');?>
	<link type='text/css' rel='stylesheet' href='style.css'/> 
</head>
<body>
	<?php include('menu.php'); ?>
	<div class="content">
		<div class="container">
			
			<div class="panel panel-forum">
				<div class="panel-heading">
					<h4 class="panel-title">All thread</h4>
				</div>
				<ul class="forum-list">
					<?php foreach ($threads as $key => $thread): ?>
						
						<li>
							<div class="info-container">
								<div class="info">
									<h4 class="title"><a href="/view_thread.php?id=<?php echo $thread->id ?>"><?php echo $thread->title ?></a></h4>
									<p class="desc">
										<?php
											echo substr($thread->content, 0,500);
											if(strlen($thread->content) > 500){ echo '...'; }
											echo '<br>'; ?>
										<?php if(!empty($thread->updated_at)): ?>
										<p class="desc">(updated at <?php echo date('Y-m-d h:i:s',$thread->updated_at).')'; ?>
										<?php endif ?>
										</p>
									</p>
								</div>
								<div class="total-count">
									<span class="total-post">1,293</span> <span class="divider">/</span> <span class="total-comment">9,291</span>
								</div>
								<div class="latest-post">
									<p class="time">created at <?php echo date('Y-m-d h:i:s',$thread->created_at) ?> <a href="view_user.php?id=<?php echo $thread->created_by ?>" class="user"><?php echo $database->getNameById($thread->created_by) ?></a></p></br>
								</div>
							</div>
						</li>
					<?php endforeach ?>

				</ul>
			</div>
		</div>
	</div>
	<?php include('script.php') ?>
</body>
</html>
