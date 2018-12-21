<?php

require("EA_MENAGER_modele.php");


	function query_database($SQLCmd)
	{
		$mysqli = new mysqli('localhost', 'root', 'root', 'ROUTES');

		if ($mysqli->connect_errno)
		{
			die("Error connecting to the database.");

		}

		$results_id = $mysqli->query($SQLCmd);
		$mysqli->close();

		return $results_id;
	}


	function populate ($sql) {
		$c = new DBConnection();
		$c->Connect();
		$prep = $c->Prepare($sql);
 		$prep->execute();
		$prep->closeCursor();
		$prep = null;
		$c = null; 
	}

	function retrieve_entreprise()
	{
		$SQLCmd = 'SELECT * FROM entreprise';
		return query_database($SQLCmd);
	}

	function retrieve_troncon()
	{
		$SQLCmd = 'SELECT * FROM troncon';
		return query_database($SQLCmd);
	}

	function retrieve_ville()
	{
		$SQLCmd = 'SELECT * FROM ville';
		return query_database($SQLCmd);
	}

	function retrieve_peage()
	{
		$SQLCmd = 'SELECT * FROM peage';
		return query_database($SQLCmd);
	}

	function retrieve_sortie()
	{
		$SQLCmd = 'SELECT * FROM sortie';
		return query_database($SQLCmd);
	}

	function retrieve_registre()
	{
		$SQLCmd = 'SELECT * FROM registre';
		return query_database($SQLCmd);
	}


?>