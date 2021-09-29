<?php

function liste_contacts ($idu = false) {
	if ($idu === false) {
		$idu = $_GET["idu"];
	}
	
	$Contact = read_contactsBD($idu);

	$username = uidToName(isset($idu) ? $idu : $_GET['idu']);
	//pour afficher le tableau $Contact en HTML
	require ("./vue/contact/liste_contacts.tpl"); 
}

function uidToName($uid) {
	$sql = "select nom from utilisateur u where u.id_nom = :uid";
	require("./modele/connect.php");
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':uid', $uid);
		
		$bool = $commande->execute();
		if ($bool) {
			$contact = $commande->fetchAll(PDO::FETCH_ASSOC); 
			if (count($contact) > 0) {
				return $contact[0]["nom"];
			} else {
				return "*uid invalide*";
			}
		}
	} catch (PDOException $e) {
		$msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die($msg);
	}
}

function read_contactsBD($idu) {

	require ("./modele/connect.php") ; 
		
	$sql="select nom, prenom, email, u.id_nom
				from contact c, utilisateur u 
				where c.id_nom = :idu
				and c.id_contact = u.id_nom
				limit 0,30";
	
	$resultat= array(); 
	
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':idu', $idu);
		
		$bool = $commande->execute();
		if ($bool) {
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
		}
	} catch (PDOException $e) {
		$msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die($msg); // On arrête tout.
	}
	
	return $resultat;

}
?>
