<?php
	include("./class/template.class");
	include("./config/config.php");
	include("./config/pass.php");
	include("./lib/connection.php");
    include("./lib/database.php");
    
    require_once "./lib/authCode.php";
    
    $login 	= new Template("./templates/index.html");


    $login->set("PageCharset", HTML_CHARSET);
	$login->set("PageTitle", HTML_TITLE);
    $login->set("StyleSheetLink", MAIN_CSS);
    

    echo $login->output();
?>