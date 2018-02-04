<?php
    define("_ROOT_", "/var/www/html");

    include(_ROOT_."/config/config.php");
    include(_ROOT_."/config/pass.php");
    include(_ROOT_."/lib/connection.php");
    include(_ROOT_."/lib/database.php");

    session_start();
    if($_SESSION['privileges'])
    {  
        unset($_POST['submit']);
        $query = DBInsert($_GET['t'], $_POST);
        
        header("location: /php/master.php");
    }
    else
    {
        header("location: /php/home.php");
    }
?>