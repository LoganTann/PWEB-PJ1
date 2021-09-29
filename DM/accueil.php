<?php
session_start();
// contient des variables propre à l'utilisateur
// et pour reconnaitre l'utilisateur il utilise un cookie identifiant
// que l'user va stocker
if (!isset($_SESSION['profil'])) {
	redirect("ident.php?msg=not_connected");
}

$nom = $_SESSION['profil']['nom'];
$role = $_SESSION['profil']['role'];
$idu = $_SESSION['profil']['id_nom'];

require ("./vue/accueil.tpl");

function redirect($url) {
	header ("Location: $url");
}


?>
