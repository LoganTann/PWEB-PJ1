<?php
	// initialise les variables de sessions
	session_start();
	
	// stocke la variable post sinon une chaine vide
	$nom= isset($_POST['nom']) ? ($_POST['nom']) : '';
    $prenom = isset($_POST['prenom']) ? ($_POST['prenom']) : '';
	$password= isset($_POST['password']) ? ($_POST['password']) : '';
	$email= isset($_POST['email']) ? ($_POST['email']) : '';
	$msg='';

	if (count($_POST) == 0) {
        require ("./vue/inscription.tpl");
    } else {
	    if (ajouterBD($nom, $password, $prenom, $email)) {
			$url = "ident.php?msg=inscrit";
			header ("Location: $url") ;
		}
	    else {
	        $_SESSION['profil'] = array();
			$msg ="erreur de saisie";
	        require ("./vue/inscription.tpl") ;
		}
    }	

function ajouterBD ($nom, $password, $prenom, $email) {
	// 
	require ("./modele/connect.php");

    $sql = "INSERT INTO `utilisateur` (`id_nom`, `nom`, `prenom`, `num`, `email`) VALUES (NULL, :nom, :prenom, :password, :email)";
	
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':nom', $nom);
		$commande->bindParam(':password', $password);
        $commande->bindParam(':prenom', $prenom);
        $commande->bindParam(':email', $email);
		$bool = $commande->execute();
		if ($bool) {
            return true;
		} else {
			die("Echec de l'inscription'");
		}
	}
	
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

?>
