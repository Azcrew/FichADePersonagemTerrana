<?php
    define("_ROOT_", "/var/www/html");
    
	include(_ROOT_."/class/template.class");
	include(_ROOT_."/config/config.php");
	include(_ROOT_."/config/pass.php");
	include(_ROOT_."/lib/connection.php");
    include(_ROOT_."/lib/database.php");
    
    require_once "/var/www/html/lib/authCode.php";
    
    session_start();
    if($_SESSION['privileges'])
    {
        $template 	= new Template("/var/www/html/templates/master.html"); 

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
        header("location: /php/home.php");
    }
?>