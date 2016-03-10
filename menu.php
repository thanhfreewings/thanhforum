<?php
$user_name = $_SESSION['login_name'];
?>
<nav class="navbar navbar-default ">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="">Company</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="/home.php">Home</a></li>
				<li><a href="/user.php">User</a></li>
				<li><a href="/message.php">Inbox</a></li>
				<li><a href="/sent.php">Sent message</a></li>
				<li><a href="/create_message.php">create message</a></li>
				<li><a href="/create_thread.php">Compose</a></li>
				<li><a href="/logout.php">logout</a></li>
				<li><a>Hi, <?php echo $user_name; ?> </a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>