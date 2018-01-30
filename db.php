<?php
	include("./config/config.php");
	include("./config/pass.php");
	include("./lib/connection.php");
	include("./lib/database.php");
	
	$table = $_GET['t'];
	$id = $_GET['i'];
	$field = $_GET['f'];
	
	$data = DBRead($table, "WHERE id={$id}", $field);
	foreach($data as $d)
	{
        if($d[$field])
		    echo $d[$field];
	}
?>