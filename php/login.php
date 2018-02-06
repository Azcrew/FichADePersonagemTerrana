<?php

    include("../class/template.class");
	include("../config/config.php");
	include("../config/pass.php");
	include("../lib/connection.php");
    include("../lib/database.php");
    
    $login 	= new Template("../templates/login.html");

    $login->set("Error", $_GET['error'] ? $_GET['error'] : "");

    $login->set("PageCharset", HTML_CHARSET);
	$login->set("PageTitle", HTML_TITLE);
    $login->set("StyleSheetLink", MAIN_CSS);

    echo $login->output();
?>