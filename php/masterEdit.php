<?php

	require_once "../class/template.class.php";
	require_once "../config/config.php";
	require_once "../config/pass.php";
	require_once "../lib/connection.php";
    require_once "../lib/database.php";
    
    require_once "../lib/authCode.php";

    if($_SESSION['privileges'])
    {
        $template = new Template("../templates/masterEdit.html");

        $template->set("PageCharset", HTML_CHARSET);
    	$template->set("PageTitle", HTML_TITLE);
        $template->set("StyleSheetLink", MAIN_CSS);

        $templateInput = "../templates/input.html";

        $name = new Template($templateInput);
        $name->set("Name", "name");
        $name->set("Type", "text");
        $name->set("Value", "");
        $name->set("Title", "");
        $name->set("PlaceHolder", "Nome");
        $template->add("Content", $name->output());

        $description = new Template($templateInput);
        $description->set("Name", "description");
        $description->set("Type", "text");
        $description->set("Value", "");
        $description->set("PlaceHolder", "Descrição");

        $submit = new Template($templateInput);
        $submit->set("Type", "submit");
        $submit->set("Value", "Criar");
        $submit->set("Name", "submit");

        $input = new Template($templateInput);

        switch($_GET['n'])
        {
            case 'adventure';
                $template->set("Title", "Aventuras");
                $table = "adventure";

                $adventureLevel = new Template($templateInput);
                $adventureLevel->set("Name", "level");
                $adventureLevel->set("Type", "number");
                $adventureLevel->set("PlaceHolder", "Nivel Inicial");
                $template->add("Content", $adventureLevel->output());

                $adventurePoints = new Template($templateInput);
                $adventurePoints->set("Name", "dificult");
                $adventurePoints->set("Type", "number");
                $adventurePoints->set("PlaceHolder", "Dificldade");
                $template->add("Content", $adventurePoints->output());

                break;
            case 'race';
                $template->set("Title", "Raças");
                $table = "race";

                $raceCost = new Template($templateInput);
                $raceCost->set("Name","cost");
                $raceCost->set("Type","number");
                $raceCost->set("PlaceHolder","Custo");
                $template->add("Content", $raceCost->output());

                $raceHP = new Template($templateInput);
                $raceHP->set("Name", "modHP");
                $raceHP->set("Type", "number");
                $raceHP->set("PlaceHolder", "Modif. PV");
                $template->add("Content", $raceHP->output());

                $raceMP = new Template($templateInput);
                $raceMP->set("Name", "modMP");
                $raceMP->set("Type", "number");
                $raceMP->set("PlaceHolder", "Modif. PM");
                $template->add("Content", $raceMP->output());
                
                $raceSP = new Template($templateInput);
                $raceSP->set("Name", "modSP");
                $raceSP->set("Type", "number");
                $raceSP->set("PlaceHolder", "Modif. PS");
                $template->add("Content", $raceSP->output());

                break;
            case 'class';
                $template->set("Title", "Classes");
                $table = "class";
                
                $class = new Template($templateInput);

                $class->set("Name", "cost");
                $class->set("Type", "number");
                $class->set("PlaceHolder", "Custo");
                $template->add("Content", $class->output());

                $class->set("Name", "modKnow");
                $class->set("Type", "number");
                $class->set("PlaceHolder", "Modif. Perícia");
                $template->add("Content", $class->output());

                /*$ = new Template($templateInput); //<select> modificadores
                $->set("", "");
                $->set("", "");
                $->set("", "");
                $template->add("Content", $->output());*/

                break;
            case 'benefit';
                $template->set("Title", "Vantagens");
                $table = "benefit";

                $benefit = new Template($templateInput);

                $benefit->set("Name", "cost");
                $benefit->set("Type", "number");
                $benefit->set("PlaceHolder", "Custo");
                $template->add("Content", $benefit->output());

                break;
            case 'injury';
                $template->set("Title", "Desvantagens");
                $table = "injury";

                $injury = new Template($templateInput);

                $injury->set("Name", "cost");
                $injury->set("Type", "number");
                $injury->set("PlaceHolder", "Custo");
                $template->add("Content", $injury->output());

                break;
            case 'knowledge';
                $template->set("Title", "Perícias");
                $table = "knowledge";

                $knowledge = new Template($templateInput);

                $knowledge->set("Name", "dificult");
                $knowledge->set("Type", "number");
                $knowledge->set("PlaceHolder", "Dificuldade");
                $template->add("Content", $knowledge->output());

                break;
            case 'item';
                $template->set("Title", "Itens");
                $table = "item";

                $input->set("Name", "rarity");
                $input->set("Type", "number");
                $input->set("PlaceHolder", "Raridade");
                $template->add("Content", $input->output());

                $input->set("Name", "class");
                $input->set("Type", "number");
                $input->set("PlaceHolder", "Classe");
                $template->add("Content", $input->output());

                $input->set("Name", "effect");
                $input->set("Type", "number");
                $input->set("PlaceHolder", "Efeito");
                $template->add("Content", $input->output());

                break;
            case 'magic';
                $template->set("Title", "Magias");
                $table = "magic";
                
                $input->set("Name", "cost");
                $input->set("Type", "number");
                $input->set("PlaceHolder", "Custo");
                $template->add("Content", $input->output());

                $input->set("Name", "class");
                $input->set("Type", "number");
                $input->set("PlaceHolder", "Classe");
                $template->add("Content", $input->output());

                $input->set("Name", "effect");
                $input->set("Type", "number");
                $input->set("PlaceHolder", "Efeito");
                $template->add("Content", $input->output());

                break;
            case 'skill';
                $template->set("Title", "Habilidades");
                $table = "skill";
                
                $input->set("Name", "cost");
                $input->set("Type", "number");
                $input->set("PlaceHolder", "Custo");
                $template->add("Content", $input->output());

                $input->set("Name", "class");
                $input->set("Type", "number");
                $input->set("PlaceHolder", "Classe");
                $template->add("Content", $input->output());

                $input->set("Name", "effect");
                $input->set("Type", "number");
                $input->set("PlaceHolder", "Efeito");
                $template->add("Content", $input->output());

                break;
        }

        $template->add("Content", $description->output());
        $template->add("Content", $submit->output());
        $template->set("DBTable", $table);

        echo $template->output();
    }
    else
    {
        header("location: ../php/home.php");
    }
?>
    