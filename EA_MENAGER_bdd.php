
<?php 
	
	function connect()
	{
		return new mysqli ('localhost', 'root', 'root', 'ROUTES');
	}


	function query_database($connection, $SQLCmd)
	{
		return $connection->query($SQLCmd);
	}


	function insert_client($connection, $mail,$pw)
	{

		$SQLCmd = "INSERT INTO Clients VALUES(NULL,'$mail', '$pw')";
		if (query_database($connection, $SQLCmd))
		print(" ");

	}

	function check_data($connection, $column,$table,$variable,$value)
	{
		$sql = query_database($connection, "SELECT $column FROM $table WHERE $variable = '$value' ");
		if (mysqli_num_rows($sql) >=1) return $sql;
		else return false;
	}


?>
