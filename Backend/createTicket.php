<?php

include 'DBManager.php';

//Daten aus HTTP request entnehmen
$autor = $_POST['autor'];
$thema = $_POST['thema'];
$beschreibung = $_POST['beschreibung'];

//DBManager function ausführen
$connection = connect();

//Legt Daten in Datenbank Tabelle
$connection ->query("INSERT INTO simple_ticket(id, autor, thema, beschreibung) VALUES (0, '$autor', '$thema', '$beschreibung');"); 
				
return http_response_code(200); 
                              
?>