<?php

    include_once("../config/config.php");
    include_once("../config/pass.php");
    include_once("../lib/connection.php");
    include_once("../lib/database.php");

    session_start();
    if($_SESSION['privileges'])
    {  
        unset($_POST['submit']);
        $query = DBInsert($_GET['t'], $_POST);
        
        header("location: ../php/master.php");
    }
    else
    {
        header("location: ../php/home.php");
    }
?>