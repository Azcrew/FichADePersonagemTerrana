<?php

    include_once("../class/template.class");
	include_once("../config/config.php");
	include_once("../config/pass.php");
	include_once("../lib/connection.php");
    include_once("../lib/database.php");
    
    $login 	= new Template("../templates/login.html");

    $login->set("Error", $_GET['error'] ? $_GET['error'] : "");

    $login->set("PageCharset", HTML_CHARSET);
	$login->set("PageTitle", HTML_TITLE);
    $login->set("StyleSheetLink", MAIN_CSS);

    echo $login->output();
?>