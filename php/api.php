<?php

	include("../config/config.php");
	include("../config/pass.php");
	include("../lib/connection.php");
	include("../lib/database.php");
	
	$table = $_GET['table'];
	$id = $_GET['id'];
	$field = $_GET['field'];
	
	$data = DBRead($table, "WHERE id={$id}", $field);
	foreach($data as $d)
	{
        if($d[$field])
		    echo $d[$field];
	}
?>