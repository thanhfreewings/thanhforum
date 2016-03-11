<?php
error_reporting(E_ALL); 
ini_set('display_errors', 'On');
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require('OOPDatabase.php');
    $database = new OOPDatabase();
    $login = $database->login($_POST);
    if($login == true){
        header('location: home.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login|Thanhforum</title>
    <?php include('header.php') ?>
</head>
<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div style="" class="panel">
                        
                        <div class="panel-body">
                            <form method="POST">
                                <fieldset>
                                    <legend>Login</legend>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Check me out
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary m-r-5">Submit</button></br>
                                    <a href = "/sign_up.php">Create an account.</a>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('script.php') ?>
</body>
</html>
