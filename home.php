<?php
error_reporting(E_ALL); 
ini_set('display_errors', 'On');
session_start();

//check xem dat login chua
if(!$_SESSION['login_user'])
{
	header('location: login.php');
}
$userId = $_SESSION['login_id'];
require('OOPDatabase.php');
$database = new OOPDatabase();
$threads = $database->getThread();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<?php include('header.php');?>
	
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
							<div class="media">
	                            <img src="<?php echo $thread->getUser()->avatar ?>">
	                            <a href="/view_user.php?id=<?php $thread->getUser()->id ?>"><h5><?php echo $thread->getUser()->name ?></h5></a>
	                        </div>
							<div class="info-container">
							
								<div class="info">
									<h4 class="title"><a href="/view_thread.php?id=<?php echo $thread->id ?>"><?php echo $thread->title ?></a></h4>
									<p class="desc">
										<?php if(!empty($thread->updated_at)): ?>
										<p class="desc">(updated at <?php echo date('Y-m-d h:i:s',$thread->updated_at).')'; ?></p>
										<?php endif ?>
										<?php
											echo substr($thread->content, 0,500);
											if(strlen($thread->content) > 500){ echo '...'; }
											echo '<br>';
										?>
									</p>
								</div>
								<div class="total-count">
									<td class="text-center"><div><i class="fa fa-2x fa-comments-o"></i></div><div class="hidden-xs">
										<?php echo count($database->getCommentByThreadId($thread->id)) ?>
									</div></td>
								</div>
								<div class="latest-post">
									<p class="time">created at <?php echo date('Y-m-d h:i:s',$thread->created_at) ?></p></br>
									<ul class="list-inline">
										<?php foreach ($thread->getRecentUserReplies() as $key => $user): ?>
											<li>
												<div class="media recent-reply">
													<img src="<?php echo $user->avatar?>">
												</div>
											</li>
										<?php endforeach; ?>
									</ul>

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
