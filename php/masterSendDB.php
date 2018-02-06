<?php

    include("../config/config.php");
    include("../config/pass.php");
    include("../lib/connection.php");
    include("../lib/database.php");

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