<?php
	//Exex command
	function DBExecute($query)
	{
		$link = DBConnect();
		
		$result = @mysqli_query($link, $query) or dir(mysqli_error());
		
		DBClose($link);
		return $result;
	}
	
	//Insert in database
	function DBInsert($table, array $data)
	{
		$table = DB_PREFIX.'_'.$table;
		$data  = DBEscape($data);
		
		$fields = implode(", ", array_keys($data));
		$values = "'".implode("', '", $data)."'"; 
		
		$query = "INSERT INTO {$table} ( {$fields} ) VALUES ( $values )";
		
		return DBExecute($query);
	}
	
	//Read database
	function DBRead($table, $params = null, $fields = '*')
	{
		if($params)
			$params = " ".$params;
			
		$table = DB_PREFIX.'_'.$table;
		$query = "SELECT {$fields} FROM {$table}{$params}";
		
		$result = DBExecute($query);
		
		if(!mysqli_num_rows($result))
		{
			return false;
		}
		else
		{
			while($res = mysqli_fetch_assoc($result))
			{
				$data[] = $res; 
			}
			return $data;
		}
	}
