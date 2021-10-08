<?php
/**
 * Ce module checke la requête et refuse s'il y a un potentiel pb de sécurité.
 * Il contient également des fonctions utilitaires
 * Il est nécessaire de configurer l'allowlist d'actions autorisées.
 * @author Logan TANN, Groupe 205
 * @version 2
*/

function checkParams(&$controle, &$action) {
    $ALLOWLIST_ACTIONS = ["ident", "inscription", "accueil", "bye", "liste_contacts"];
    $errormsg = "ok";

	if (! (isset($controle) && isset($action))) {
        $errormsg = "Le paramètre contrôle ET le paramètre action doivent être spécifiés.";
    }
	if (! in_array($action, $ALLOWLIST_ACTIONS)) {
        $errormsg = "L'action spécifiée en paramètres est interdite !";
    }
	if (str_contains($controle, '/')) {
        $errormsg = "Interdit au LFI !";
	}

    if ($errormsg !== "ok") {
        require("./vue/erreur400.tpl");
        die();
    }
    return true;
}

checkParams($controle, $action);
