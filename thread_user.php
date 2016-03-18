<?php
error_reporting(E_ALL); 
ini_set('display_errors', 'On');
session_start();

//check xem dat login chua
if(!$_SESSION['login_user'])
{
    header('location: login.php');
}
$get_id = $_GET['id'];
require('OOPDatabase.php');
$database = new OOPDatabase();
$user = $database->getUserById($get_id);
$threads = $database->getThreadByUserCreated($get_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>thread user</title>
    <?php include('header.php');?>
    <link type='text/css' rel='stylesheet' href='style.css'/>
</head>
<body>
    <?php include('menu.php') ?>
    <div class="content">
        <div class="container">
            <div class="col-xs-12 col-sm-9">
                <h3>All threads of <?php echo $user->name ?></h3><hr>
                <?php
                if(!empty($threads)){
                    foreach($threads as $thread) {
                        echo '<h4><a href="/view_thread.php?id='.$thread->id.'">'.$thread->title.'</a></h4>';
                        echo '<p>Created at '.date('Y-m-d h:i:sa',$thread->created_at);
                        if(!empty($thread->updated_at)){
                            echo ' update at '.date('Y-m-d h:i:sa',$thread->updated_at).'</p>';
                            }
                        echo '<p>'.$thread->content.'</p><br>';
                    }
                }else{
                    echo 'do not have a thread...';
                }
                ?>
            </div>
        </div>
    </div>
    <?php include('script.php');?>
</body>
</html>
