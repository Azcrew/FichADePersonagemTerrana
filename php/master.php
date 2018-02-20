<?php
    
	require_once "../class/template.class.php";
	require_once "../config/config.php";
	require_once "../config/pass.php";
	require_once "../lib/connection.php";
    require_once "../lib/database.php";
    
    require_once "../lib/authCode.php";
    
    session_start();
    if($_SESSION['privileges'])
    {
        $template 	= new Template("../templates/master.html"); 

        $template->set("PageCharset", HTML_CHARSET);
	    $template->set("PageTitle", HTML_TITLE);
        $template->set("StyleSheetLink", MAIN_CSS);
        
        $user = ucfirst($_SESSION['user']);
        

        $template->set("UserName", $user);
        $template->set("UserPage", "n={$_SESSION['name']}");

        echo $template->output();
    }
    else
    {
        header("location: ../php/home.php");
    }
?>