<?php
	include("./config/config.php");
	include("./config/pass.php");
	include("./lib/connection.php");
    include("./lib/database.php");
    

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $query = dbRead("user", "WHERE user = '{$user}' and password = '{$pass}'");

    //var_dump($query);

    if($query != null)
    {
        session_start();
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;

        header("location: ./");
    }
    else
    {
        header("location: ./login.php");
    }

    
