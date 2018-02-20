<?php
	//Execute command
	function DBExecute($query)
	{
		$link = DBConnect();
		
		$result = @mysqli_query($link, $query) or dir(mysqli_error());
		
		DBClose($link);
		return $result;
	}
	
	//Insert a register in database
	function DBInsert($table, array $data)
	{
		$table = DB_PREFIX.'_'.$table;
		$data  = DBEscape($data);
		
		$fields = implode(", ", array_keys($data));
		$values = "'".implode("', '", $data)."'"; 
		
		$query = "INSERT INTO {$table} ( {$fields} ) VALUES ( $values )";

		return DBExecute($query);
	}
	
	//Read database register
	function DBRead($table, $params = null, $fields = '*')
	{
		$params = ($params) ? " {$params}" : null;
					
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
	
	//Alter database register
	function DBUpdate($table, array $data, $where = null)
	{
		$table = DB_PREFIX.'_'.$table;
		
		foreach ($data as $key => $value) {
			$fields[] = "{$key} = '{$value}'"; 
		}
		$fields = implode(', ', $fields);		
		
		$where = ($where) ? " WHERE {$where}" : null;
		
		$query = "UPDATE {$table} SET {$fields}{$where}";
		
		return DBExecute($query);
	}
	
	function DBDelete($table, $where)
	{
		$table = DB_PREFIX.'_'.$table;
		
		$where = ($where) ? " WHERE {$where}" : null;
		
		$query = "DELETE FROM {$table}{$where}";
		return DBExecute($query);
	}
	
	function DBSearch($table, $where)
	{
		$table = DB_PREFIX.'_'.$table;

		$where = ($where) ? " WHERE {$where}" : null;

		$query = "SELECT * FROM {$table}{$params}";
        
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
?>