<?php
    define("_ROOT_", "/var/www/html");

    session_start();
    if(!isset($_SESSION['user']) || !isset($_SESSION['pass']))    
    {
        header("location: /php/login.php");
        exit;
    }
