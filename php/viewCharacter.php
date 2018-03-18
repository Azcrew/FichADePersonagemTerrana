<?php

	require_once "../class/template.class.php";
	require_once "../config/config.php";
	//require_once "../config/pass.php";
	//require_once "../lib/connection.php";
	//require_once "../lib/database.php";
    
    //require_once "../lib/authCode.php";
	
    $page = new Template("../templates/viewCharacter.html");
    
    $page->set("PageCharset", HTML_CHARSET);
    $page->set("PageTitle", HTML_TITLE);
    $page->set("StyleSheetLink", MAIN_CSS);
    $page->set('Title', 'Personagem');


    echo $page->output();