<?php
    
    /**
     * Terrana.net
     * 
     * PHP version 7.2
     * 
     * @category  Games
     * @package   Terrana
     * @author    Bruno José Spolavori <bspol.323@gmail.com>
     * @copyright 2018 Bruno José Spolavori
     * @license   terrana.ddns.net/license Copyrigth
     * @link      terrana.ddns.net
     */

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