<?php

include 'DBManager.php';

//HTTP Header
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');  


//DBManager function ausführen
$connection = connect();

//Legt Daten in Datenbank Tabelle
$tickets = $connection ->query("SELECT * FROM simple_ticket"); 


$ticketArray = array();
$id = 0;

if ($tickets->num_rows > 0) {
    while($row = $tickets->fetch_assoc()) {
		$id++;
		$ticket = array('autor'=>$row['autor'], 'thema'=>$row['thema'], 'beschreibung'=>$row['beschreibung']);
        array_push($ticketArray, $ticket);
    }
}

echo json_encode($ticketArray);

?>