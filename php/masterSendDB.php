<?php

    require_once "../config/config.php";
    require_once "../config/pass.php";
    require_once "../lib/connection.php";
    require_once "../lib/database.php";

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