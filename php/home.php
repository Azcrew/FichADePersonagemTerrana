<?php
    define("_ROOT_", "/var/www/html");
    
	include(_ROOT_."/class/template.class");
	include(_ROOT_."/config/config.php");
	include(_ROOT_."/config/pass.php");
	include(_ROOT_."/lib/connection.php");
    include(_ROOT_."/lib/database.php");
    
    require_once "/var/www/html/lib/authCode.php";
    session_start();

    $home = new Template("/var/www/html/templates/home.html");


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