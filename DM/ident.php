<?php
	// initialise les variables de sessions
	session_start();
	
	// stocke la variable post sinon une chaine vide
	$nom= isset($_POST['nom']) ? ($_POST['nom']) : '';
	$password= isset($_POST['password']) ? ($_POST['password']) : '';
	$msg='';

	if (isset($_GET["msg"])) {
		if ($_GET["msg"] == "inscrit") {
	 		$msg = "Inscription réussie, veuillez vous connecter.";
		} else if ($_GET["msg"] == "not_connected") {
			$msg = "Veuillez vous identifier pour accéder à l'espace";
		}
	}

	if (count($_POST) == 0) {
        require ("./vue/ident.tpl");
    } else {
	    if (verif_ident_bd($nom, $password, $resultat)) {
			// stocke les informations BD dans la variable session de l'utilisateur
			$_SESSION['profil'] = $resultat[0];
			// fais la redir
			$url = "accueil.php";
			header ("Location: $url") ;
		}
	    else {
	        $_SESSION['profil'] = array();
			$msg ="erreur de saisie";
	        require ("./vue/ident.tpl") ;
		}
    }	

function verif_ident_bd ($nom, $password, &$resultat=array()) {
	// 
	require ("./modele/connect.php");

	$sql="SELECT * FROM `utilisateur` where nom=:nom and num=:password"; 
	
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':nom', $nom);
		$commande->bindParam(':password', $password);
		$bool = $commande->execute();
		
		if ($bool) {
			$resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
		} else {
			die("Echec de l'execution");
		}
		return count($resultat) > 0;
	}
	
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

?>
