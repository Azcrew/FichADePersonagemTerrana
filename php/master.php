<?php
    
	include_once("../class/template.class");
	include_once("../config/config.php");
	include_once("../config/pass.php");
	include_once("../lib/connection.php");
    include_once("../lib/database.php");
    
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