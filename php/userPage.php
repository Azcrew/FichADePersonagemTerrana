<?php

	require_once "../class/template.class.php";
	require_once "../config/config.php";
	//require_once "../config/pass.php";
	//require_once "../lib/connection.php";
	//require_once "../lib/database.php";
    
    //require_once "../lib/authCode.php";
	
    $page = new Template("../templates/userPage.html");
    
    session_start();

    $user = ucfirst($_GET['m'] ? $_GET['m'] : $_GET['p']);

    $page->set("PageCharset", HTML_CHARSET);
	$page->set("PageTitle", HTML_TITLE);
    $page->set("StyleSheetLink", MAIN_CSS);
    $page->set('Title', 'Informações Pessoais');
    
    if(isset($_GET['m'])){
        $page->set('User', 'Mestre '.$user);
        $page->set('Master', '');
    }
    else{
        $page->set('User', $user);
        $page->set('Master', '');
    }

    echo $page->output();