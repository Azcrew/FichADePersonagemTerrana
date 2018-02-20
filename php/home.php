<?php

	include_once("../class/template.class");
	include_once("../config/config.php");
	include_once("../config/pass.php");
	include_once("../lib/connection.php");
    include_once("../lib/database.php");
    
    require_once "../lib/authCode.php";
    session_start();

    $home = new Template("../templates/home.html");


    $home->set("PageCharset", HTML_CHARSET);
	$home->set("PageTitle", HTML_TITLE);
    $home->set("StyleSheetLink", MAIN_CSS);
    $home->set("UserName", ucfirst($_SESSION['user']));
    if($_SESSION['privileges'])
    {
        $home->set("MasterPage", 'Pagina do Mestre');
    }
    else
    {
        $home->set("MasterPage", '');
    }

    echo $home->output();
?>