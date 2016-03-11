<?php
$user_name = $_SESSION['login_name'];
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
					<form class="navbar-form">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Enter Keywords..." />
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</li>
				<li><a href="/user.php">User</a></li>
				<li><a href="/message.php">Inbox</a></li>
				<li><a href="/sent.php">Sent</a></li>
				<li><a href="/create_message.php">Message</a></li>
				<li><a href="/thread.php">Threads</a></li>
				<li><a href="/create_thread.php">Compose</a></li>
				<li><a href="/logout.php">Logout</a></li>
				<li><a>Hi, <?php echo $user_name; ?> </a></li>
			</ul>
		</div>
	</div>
</div>
