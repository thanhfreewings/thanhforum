<?php
error_reporting(E_ALL); 
//ini_set('display_errors', 'On');
session_start();

//check xem dat login chua
if(!$_SESSION['login_user'])
{
    header('location: login.php');
}
$user_Id = $_SESSION['login_id'];
require('OOPDatabase.php');
$database = new OOPDatabase();
$threads = $database->getThreadByUserCreated($user_Id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>your thread</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('header.php');?>
    <link type='text/css' rel='stylesheet' href='style.css'/>     
</head>
<body>
    <?php include('menu.php') ?>
    <div class="container">
        <div class="col-xs-12 col-sm-9">
        <div class="jumbotron">
            <h2>All thread you created.</h2>
            <p>you can creat new thread, update, delete or share for all member.</p>
        </div>
            <?php
                if($threads != NULL){
                    foreach($threads as $thread) {
                        echo '<h4><a href="">'.$thread->title.'</a></h4>';
                        echo '<small><a href="/update_thread.php?id='.$thread->id.'">update  </a> <a href="/delete_thread.php?id='.$thread->id.'">  delete</a></small><br>';
                        echo '<small>Created at '.$thread->created_at.' new update '.$thread->updated_at.'</small>';
                        echo '<p>'.$thread->content.'</p><br>';
                    }
                }else{
                    echo "you don't have a thread...";
                    }
            ?>
    </div>
        <div class="col-xs-6 col-sm-3 col-lg-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
                <a href="" class="list-group-item">Your thread created</a>
                <a href="" class="list-group-item">User</a>
                <a href="" class="list-group-item">Message</a>
            </div>
        </div>
    </div>
</body>
</html>
