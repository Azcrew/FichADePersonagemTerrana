<?php

require_once "../class/template.class.php";
require_once "../config/config.php";
require_once "../config/pass.php";
require_once "../lib/connection.php";
require_once "../lib/database.php";
$login = new Template("../templates/login.html");

$login->set("Error", $_GET['error'] ? $_GET['error'] : "");

$login->set("PageCharset", HTML_CHARSET);
$login->set("PageTitle", HTML_TITLE);
$login->set("StyleSheetLink", MAIN_CSS);

echo $login->output();
?>