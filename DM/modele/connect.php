<?php
$hostname = "localhost";	//ou localhost
$base= "contacts";
$loginBD= "root";	//ou "root"
$passBD="";
try {
	$pdo = new PDO ("mysql:server=$hostname; dbname=$base", "$loginBD", "$passBD");
}

catch (PDOException $e) {
	die  ("Echec de connexion : " . utf8_encode($e->getMessage()) . "\n");
}

// Model = logique
// VUe = vue (html)
// COntroller = stockage et représentation de l'information

?>