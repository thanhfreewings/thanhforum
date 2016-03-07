<?php
error_reporting(E_ALL); 
ini_set('display_errors', 'On');
session_start();

//check xem dat login chua
if(!$_SESSION['login_user'])
{
    header('location: login.php');
}            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link type='text/css' rel='stylesheet' href='style.css'/>     
</head>
<body>
    <?php include('menu.php') ?>
    <div class="jumbotron">
        <h1 class="heading">My Database</h1>
        <p class="subheading">
            Sign in to company, batabase for you.
            <br>
            <a href="/company/oop.php" data-ga-click="Home, go to pricing">Learn PHP.</a>
        </p>
    </div>
</body>
</html>
