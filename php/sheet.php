<?php

	require_once "../class/template.class.php";
	require_once "../config/config.php";
	require_once "../config/pass.php";
	require_once "../lib/connection.php";
	require_once "../lib/database.php";
    
    require_once "../lib/authCode.php";
	$personage = new Template("../templates/sheet.html");

	/************************************************************
	 *	HTML Definitions
	 */
	$personage->set("PageCharset", HTML_CHARSET);
    $personage->set("PageTitle", HTML_TITLE);
	$personage->set("StyleSheetLink", MAIN_CSS);

    /************************************************************
	 *  Playable Character or Master 
     */
	$personage->set("Action", "../php/createPersonage.php");
    if($_GET['type'] == "npc") 
    {
		$personage->set("Action", "../php/createNPC.php");   
	}
	/************************************************************
	 *  Allow Character as NPC
	 */
	session_start();
	$personage->set("IsNPC", $_SESSION['AllowAsNPC']);
	
	$personage->set("BoxSize", 5);
	echo $personage->output();
?>