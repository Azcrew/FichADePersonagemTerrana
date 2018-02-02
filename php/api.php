<?php
    define('_ROOT_', '/var/www/html');
    
	include(_ROOT_."/config/config.php");
	include(_ROOT_."/config/pass.php");
	include(_ROOT_."/lib/connection.php");
	include(_ROOT_."/lib/database.php");
	
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