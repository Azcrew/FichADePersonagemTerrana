<?php

	include("../class/template.class");
	include("../config/config.php");
	include("../config/pass.php");
	include("../lib/connection.php");
    include("../lib/database.php");
    
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