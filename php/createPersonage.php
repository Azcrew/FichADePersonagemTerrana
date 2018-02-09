<?php
	include("../class/character.class");
    include("../config/config.php");
	include("../config/pass.php");
	include("../lib/connection.php");
    include("../lib/database.php");
    
    //var_dump($_POST);

    $character = new Character();

    $character->setName($_POST['name']);
    $character->setRace($_POST['race']);
    $character->setClass($_POST['class']);
    $character->setAdventure($_POST['adventure']);

    $character->setAspects($_POST['armor'],$_POST['focus'],$_POST['strength'],$_POST['ability'],$_POST['resistance'],$_POST['accuracy']);
    $character->setFocus($_POST['water'],$_POST['air'],$_POST['fire'],$_POST['ligth'],$_POST['earth'],$_POST['darkness']);

    $character->setBenefit($_POST['benefit']);
    $character->setInjury($_POST['injury']);
    $character->setKnowledge($_POST['knowledge']);

    $character->setHistory($_POST['history']);

    $db = DBInsert('character', $character->getCharacter());
    //echo json_encode($character->getCharacter());
    var_dump($character->getCharacter(), $db);

?>