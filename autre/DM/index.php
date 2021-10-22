<?php 
/**
 * @author Logan TANN, Groupe 205
 * @version 2
*/
session_start ();



function main() {
	if ((count($_GET)!=0) && !(isset($_GET['controle']) && isset ($_GET['action']))) {
		require ('./vue/erreur404.tpl'); //cas d'un appel à index.php avec des paramètres incorrects
		return;
	}

	// action par défaut si rien n'est spécifié
	$controle = "utilisateur";
	$action = "ident";
	if (isset($_GET['controle']) && isset($_GET['action'])) {
		if (isset($_SESSION['profil'])) {
			$controle = $_GET['controle'];
		}
		if (isset($_SESSION['profil']) || $_GET['action'] === "inscription") {
			$action = $_GET['action'];
		}
	}

	// IMPORTANT : configurer l'allowlist des routes dans ce fichier
	require ('./controle/security.php');
	
	require ('./controle/' . $controle . '.php');
	$action(); // On exécute la fonction dont le nom est dans la variable $action
}


main();

?>