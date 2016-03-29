<?php

	function connect() {
	 
		//Variablen werden definiert zum Aufbau der Verbindung zur Datenbank
		define('MYSQL_HOST',      'localhost' );
		define('MYSQL_BENUTZER',  'root' );
		define('MYSQL_KENNWORT',  '' );
		define('MYSQL_DATENBANK', 'test' );

		//Verbindung aufbauen
		$connection = new mysqli(MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);

		//Prüft die Verbindung
		if ($connection->connect_error) {
			http_response_code(400);
		}

		//Prüft ob Tabelle existiert
		if (!$connection ->query("SELECT * FROM simple_ticket")) {
			$connection ->query("CREATE TABLE simple_ticket(id INT, autor VARCHAR(255), thema VARCHAR(255), beschreibung VARCHAR(255));");
		}
		
		// Gibt Connection zurück
		return $connection;
	}


?>