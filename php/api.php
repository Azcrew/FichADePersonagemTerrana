<?php

	include_once("../config/config.php");
	include_once("../config/pass.php");
	include_once("../lib/connection.php");
	include_once("../lib/database.php");
	
	$table = $_GET['table'];
	$id = $_GET['id'];
	$field = $_GET['field'];
	
	if(isset($id))
	{
		$data = DBRead($table, "WHERE id={$id}");
	}
	else
	{
		$data = DBRead($table);
	}
	
	foreach($data as $d)
	{
		print(json_encode($d, JSON_PRETTY_PRINT));
		echo "<br>";
	}
?>