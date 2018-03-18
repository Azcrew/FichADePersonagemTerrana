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

    require_once "../class/character.class.php";
    require_once "../config/config.php";
    require_once "../config/pass.php";
    require_once "../lib/connection.php";
    require_once "../lib/database.php";
    
    $character = new Character();
    session_start();
    $character->setPlayer($_SESSION['id'], $_POST['npc'] ? 1 : 0);

    $character->setName($_POST['name']);
    $character->setRace($_POST['race']);
    $character->setClass($_POST['class']);
    $character->setAdventure($_POST['adventure']);
    
    $character->setAspects(
        $_POST['armor'], 
        $_POST['focus'], 
        $_POST['strength'],        
        $_POST['ability'], 
        $_POST['resistance'], 
        $_POST['accuracy']
    );

    $character->setFocus(
        $_POST['water'],
        $_POST['air'],
        $_POST['fire'],
        $_POST['ligth'],
        $_POST['earth'],
        $_POST['darkness']
    );

    $character->setBenefit($_POST['benefit']);
    $character->setInjury($_POST['injury']);
    $character->setKnowledge($_POST['knowledge']);
    $character->setSkills($_POST['skill']);
    $character->setMagics($_POST['magic']);
    $character->setItens($_POST['item']);

    $character->setHistory($_POST['history']);

    $character->setLevel($_POST['level']);

    //echo $character->getCharacter();
    echo '<br><br>';
    print($character->save());

?>