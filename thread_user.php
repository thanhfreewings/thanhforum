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
    <meta charset="utf-8">
    <title>thread of <?php echo $database->getNameById($getThreadById); ?></title>
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
            <h2>All thread of <?php echo $database->getNameById($getThreadById); ?>.</h2>
        </div>
            <?php
                if($threads != NULL){
                    foreach($threads as $thread) {
                        echo '<h4><a href="/view_thread.php?id='.$thread->id.'">'.$thread->title.'</a></h4>';
                        echo '<p>Created at '.date('Y-m-d h:i:s',$thread->created_at).' update at '.date('Y-m-d h:i:s',$thread->updated_at).'</p>';
                        echo '<p>'.$thread->content.'</p><br>';
                    }
                }else{
                    echo $database->getNameById($user_Id).' do not have a thread...';
                    }
            ?>
        </div>
    </div>
</body>
</html>
