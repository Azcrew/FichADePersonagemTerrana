<?php
    define("_ROOT_", "/var/www/html");

	include(_ROOT_."/class/template.class");
	include(_ROOT_."/config/config.php");
	include(_ROOT_."/config/pass.php");
	include(_ROOT_."/lib/connection.php");
    include(_ROOT_."/lib/database.php");
    
    $login 	= new Template(_ROOT_."/templates/login.html");


    $login->set("PageCharset", HTML_CHARSET);
	$login->set("PageTitle", HTML_TITLE);
    $login->set("StyleSheetLink", MAIN_CSS);
    

    echo $login->output();
?>