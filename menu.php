<?php
require ('models/CurrentUser.php');
$user_name = $_SESSION['login_name'];
$user_id = $_SESSION['login_id'];
?>
<div id="header" class="header navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="home.php" class="navbar-brand">
				<span class="navbar-logo"></span>
				<span class="brand-text">
					Thanh Forum
				</span>
			</a>
		</div>
		<div class="collapse navbar-collapse" id="header-navbar">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<form class="navbar-form" method="POST" action="/result_search.php">
						<div class="form-group">
							<input type="text" name="name" class="form-control" placeholder="Enter Name..." />
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</li>
				<li><a href="/message.php">Inbox</a></li>
				<li><a href="/sent.php">Sent</a></li>
				<li><a href="/create_message.php">Message</a></li>
				<li><a href="/create_thread.php">Compose</a></li>
				<li><a href="/logout.php">Logout</a></li>
				<li><a href="/user.php"><?php echo '<p class="text-capitalize">Hi, '.CurrentUser::getUser()->name.'</p>'; ?><div class="avatar_menu"><img src="<?php echo CurrentUser::getUser()->avatar ?>" class="img-circle" alt="avatar" height="30" width="30"></div> </a></li>
			</ul>
		</div>
	</div>
</div>
