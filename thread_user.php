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
$getThreadById = $_GET['id'];
require('OOPDatabase.php');
$database = new OOPDatabase();
$threads = $database->getThreadByUserCreated($getThreadById);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>thread of <?php echo $database->getNameById($getThreadById); ?></title>
    <?php include('header.php');?>
</head>
<body>
    <?php include('menu.php') ?>
    <div class="content">
        <div class="container">
            <div class="col-xs-12 col-sm-9">
                <?php
                if(!empty($threads)){
                    foreach($threads as $thread) {
                        echo '<h4><a href="/view_thread.php?id='.$thread->id.'">'.$thread->title.'</a></h4>';
                        echo '<p>Created at '.date('Y-m-d h:i:s',$thread->created_at);
                        if(!empty($thread->updated_at)){
                            echo ' update at '.date('Y-m-d h:i:s',$thread->updated_at).'</p>';
                            }
                        echo '<p>'.$thread->content.'</p><br>';
                    }
                }else{
                    echo $database->getNameById($user_Id).' do not have a thread...';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
