<?php
/**
 * @author Logan TANN
 * @version 2
 */

/**
 * Vérifie si le profil utilisateur contient des données valides.
 * @see new_user($profil)
 */
function validation_inscription($profil) {
	$errors = array();
	if (!preg_match("/^[\w\- ]+$/", $profil["nom"])) {
		$errors[] = "Votre nom de famille ne doit pas contenir de caractères spéciaux !";
	}
	if (!preg_match("/^[\w\- ]+$/", $profil["prenom"])) {
		$errors[] = "Votre prénom ne doit pas contenir de caractères spéciaux !";
	}
	if (strlen($profil["num"]) < 8) {
		$errors[] = "Entrez un mot de passe d'au moins 8 caractères !";
	}
	if (!filter_var($profil["email"], FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Entrez un email sous la forme user@host.domain !";
	}
	return $errors;
}

/**
 * Ajoute un nouvel utilisateur dans la BD.
 * Assume que validation_inscription($profil) a été appelé.
 * @see validation_inscription($profil)
 */
function new_user($profil) {
	require('modele/connectBD.php');
	$sql  = "INSERT INTO `utilisateur` (`nom`, `prenom`, `num`, `email`)";
	$sql .= "            VALUES (:nom, :prenom, :num, :email);";

	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':nom', 	$profil["nom"]);
		$commande->bindParam(':prenom',	$profil["prenom"]);
		$commande->bindParam(':num', 	$profil["num"]);
		$commande->bindParam(':email', 	$profil["email"]);
		if ($commande->execute()) {
			return $pdo->lastInsertId("id_nom");
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
	return -1;
}

function verif_bd($nom,$num,&$profil) {
	require('modele/connectBD.php'); //$pdo est défini dans ce fichier
	$sql="SELECT * FROM `utilisateur` WHERE nom=:nom AND num=:num";
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':nom', $nom);
		$commande->bindParam(':num', $num);
		$bool = $commande->execute();
		if ($bool) {
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
			// var_dump($resultat); die();
			/*while ($ligne = $commande->fetch()) { // ligne par ligne
				print_r($ligne);
			}*/
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
	if (count($resultat) == 0) {
		$profil=array(); // Pour qu'il y ait quand même quelque chose...
		return false; 
	}
	else {
		$profil = $resultat[0];
		//var_dump($profil);
		return true;
	}
}
?>