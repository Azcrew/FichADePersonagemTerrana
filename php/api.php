<?php

	require_once "../config/config.php";
	require_once "../config/pass.php";
	require_once "../lib/connection.php";
	require_once "../lib/database.php";
	
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