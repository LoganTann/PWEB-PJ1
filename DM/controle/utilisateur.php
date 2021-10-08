<?php 
// fonction utilitaire
function post($var) {
	if (empty($_POST[$var])) {
		return "";
	}
	return $_POST[$var];
}

function ident () {
	$nom=isset($_POST['nom'])?trim($_POST['nom']):''; // trim pour enlever les espaces avant et apres
	$num=isset($_POST['num'])?trim($_POST['num']):'';
	$msg="";

	if (count($_POST)==0) require("vue/utilisateur/ident.tpl");
	else {
		
		require ("./modele/utilisateurBD.php");
		
		if (verif_bd($nom, $num, $profil)) {
			$_SESSION['profil'] = $profil;
			$nexturl = "index.php?controle=utilisateur&action=accueil";
			header ("Location:" . $nexturl);
		}
		else {
			$msg = "Utilisateur inconnu !";
			require("vue/utilisateur/ident.tpl");
		}
	}
}

function inscription() {
	$errors = false;
	$profil = array(
		"nom" => post("nom"),
		"prenom" => post("prenom"),
		"num" => post("num"),
		"email" => post("email"),
	);
	if (count($_POST) > 0) {
		require ("./modele/utilisateurBD.php");
		$errors = validation_inscription($profil);
		if (count($errors) <= 0 && ($id_user = new_user($profil)) >= 0) {
			$_SESSION['profil'] = $profil;
			$_SESSION['profil']['id_nom'] = $id_user;
			$nexturl = "index.php?controle=utilisateur&action=accueil";
			header ("Location:" . $nexturl);
			return;
		}
		$errors[] = "Echec de l'inscription. Si aucune autre erreur n'est affichée, c'est probablement une erreur de la base de données.";
	}
	require("vue/utilisateur/inscription.tpl");
}

function accueil() {
	require ("modele/contactBD.php");
	$idn = $_SESSION['profil']['id_nom'];
	$Contact = contacts($idn);
	require ("vue/utilisateur/accueil.tpl");
}

function bye() {
	$nom = "inconnu";
	if (!empty($_SESSION['profil']['nom'])) {
		$nom = $_SESSION['profil']['nom'];
	}
	session_destroy();
	require("./vue/contact/disconnected.tpl");
}