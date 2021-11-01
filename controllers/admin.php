<?php

/**
 * Page d'accueil d'administration.
 * Route : ?page=admin&action=index
 * @see /views/admin/index.php
 */
function index() {
    $data = [
        "connected" => false,
        "box-color" => "orange",
        "box-message" => "Pour accéder à l'espace administration, une identification est (logiquement) nécessaire !<br>
            Hint de mot de passe : c'est la pire prononciation de &laquo;jzon&raquo; !"
    ];
    // Traitement du mot de passe, si envoyé
    if (isset($_POST['password'])) {
        $password_hashed = '$2y$10$xLI4nqFTEzLvmlW9xS5jWeYVWZxVpORPqjUSVA.DBQ/3/1fMW65GG';
        if (password_verify($_POST['password'], $password_hashed)) {
            $_SESSION['adminConnected'] = true;
        } else {
            $data['box-color'] = "red";
            $data['box-message'] = 'Mot de passe incorrect. C\'était <span style="font-family: monospace">jizon</span>.';
        }
    }
    // Passage à la vue d'une variable indiquant si l'admin est connecté
    if (isset($_SESSION['adminConnected'])) {
        $data['connected'] = true;
    }
    // Passage à la vue d'une variable indiquant si l'admin vient tout juste de se déconnecter
    if (isset($_GET['customMsg'])) {
        if ($_GET['customMsg'] == 'logout_OK') {
            $data['box-color'] = "green";
            $data['box-message'] = 'Déconnection effectuée avec succès';
        }
    }
    // Appel de la vue avec un header & footer commun en plus
    utils_getView('dashboard', $data);
}

/**
 * Permet de se déconnecter
 * Route : ?page=admin&action=logout
 */
function logout() {
    unset($_SESSION['adminConnected']);
    header('Location: ?page=admin&action=index&customMsg=logout_OK');
}

/**
 * Page de gestion des voitures.
 * Permet d'ajouter une nouvelle voiture, ou de mettre une voiture en rupture de stock
 * Route: ?page=admin&action=manageCars
 */
function manageCar() {
    // données qui seront envoyées à la vue.
    $data = ["msgs" => [], "boxGreen"=>false];
    require("./model/cars.php");
    // On reçois l'évènement que l'admin veut ajouter une voiture dans la bdd.
    if (isset($_POST["event_carAdd"])) {
        // récupération des données du formulaire
        $carType = $_POST["carType"];
        $carPrice = $_POST["carPrice"];
        $carCaract = json_encode([
            "typeEnergie" => $_POST["carCaract_typeEnergie"],
            "nbPlaces" => intval($_POST["carCaract_nombreDePlaces"]),
            "automatique" => !isset($_POST["carCaract_automatique"])
        ]);
        $carPhoto = $_POST["carPhoto"];
        $carEtatL = $_POST["carEtatL"];
        
        // traitement d'upload de fichiers
        $target_file = "./writeable/$carPhoto";
        if (move_uploaded_file($_FILES["carPhoto__file"]["tmp_name"], $target_file)) {
            if (addCar($carType, $carPrice, $carCaract, $target_file, $carEtatL)) {
                $data["msgs"][] = "Requête exécutée avec succès";
                $data["boxGreen"] = true;
            } else {
                $data["msgs"][] = "Problème SQL !";
            }
        } else {
            $data["msgs"][] = "Echec... Avez-vous spécifié une image ?";
        }
    }
    if (isset($_POST["event_carRemove"])) {
        $carId = $_POST["carId"];
        deleteCar($carId);
        $data["msgs"][] = "Voiture ID='$carId' supprimée";
        $data["boxGreen"] = true;
    }

    utils_getView("manageCar", $data);
}


/**
 * Fonction __utilitaire__ qui affiche une vue.
 */
function utils_getView($vueName, $data) {
    require("./views/common/commonHead.php");
    require("./views/admin/$vueName.php");
    require("./views/common/commonFoot.php");
}

function facture() {
}

