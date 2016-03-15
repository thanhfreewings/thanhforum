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
    <title>your thread</title>
    <?php include('header.php');?>
    <link type='text/css' rel='stylesheet' href='style.css'/>
</head>
<body>
    <?php include('menu.php') ?>
    <div class="content">
        <div class="container">
            <div class="col-xs-12 col-sm-9">
            <h3>Thread you created:</h3><br><hr>
                <?php
                if(!empty($threads)){
                    foreach($threads as $thread) {
                        echo '<h4><a href="/view_thread.php?id='.$thread->id.'">'.$thread->title.'</a></h4>';
                        echo '<p><a href="/update_thread.php?id='.$thread->id.'">update  </a> <a href="/delete_thread.php?id='.$thread->id.'">  delete</a></p>';
                        echo '<p>Created at '.date('Y-m-d h:i:s',$thread->created_at);
                        if(!empty($thread->updated_at)){
                            echo ' update at '.date('Y-m-d h:i:s',$thread->updated_at).'</p>';
                        }
                        echo '<p>'.$thread->content.'</p><br>';
                    }
                }else{
                    echo "you don't have any thread...";
                }
                ?>
            </div>
        </div>
    </div>
    <?php include('script.php');?>
</body>
</html>
