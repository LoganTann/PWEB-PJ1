<?php
function create() {
    $errors = false;
	if (count($_POST) > 0) {
        $user_info = array(
            "nom" => $_POST["nom"],
            "pseudo" => $_POST["pseudo"],
            "mdp" => $_POST["mdp"],
            "email" => $_POST["email"],
            "nomE" => $_POST["nomE"],
            "adresseE" => $_POST["adresseE"]
        );
		require ("./model/clientBD.php");
		$errors = valid_registration($user_info);
		if (count($errors) <= 0 && ($id_user = new_user($user_info)) >= 0) {
			$_SESSION['user_info'] = $user_info;
			$_SESSION['user_info']['id'] = $id_user;
			$nexturl = "index.php?controle=accounts&action=accueil";
			header ("Location:" . $nexturl);
			return;
		}
		$errors[] = "Echec de l'inscription. Si aucune autre erreur n'est affichée, c'est probablement une erreur de la base de données.";
	}
    require("./views/accounts/create.php");
}

function accueil() {
	require ("modele/contactBD.php");
	$idn = $_SESSION['profil']['id_nom'];
	$Contact = contacts($idn);
	require ("vue/utilisateur/accueil.tpl");
}

function connect() {
    echo "créer";
}

?>