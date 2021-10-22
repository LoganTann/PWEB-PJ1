<?php


function index() {
    // Youcef
    // afficher les voitures en stock --> terminé
    // afficher les locations en cours (ce que les clients ont loué) --> terminé
    echo "Actions dans ce contrôleur : manageCar. Voir aussi : vehicle:getCars et vehicle:getRentalCars";
}


/**
 * Page de gestion des voitures. Permet d'ajouter une nouvelle voiture, ou de mettre une voiture en rupture de stocks
 */
function manageCar() {
    // données qui seront envoyées à la vue.
    $data = ["msgs" => [], "boxGreen"=>false];
    require("./model/cars.php");
    // On reçois l'évènement que l'admin veut ajouter une voiture dans la bdd.
    if (isset($_POST["event_carAdd"])) {
        $carType = $_POST["carType"];
        $carPrice = $_POST["carPrice"];
        $carCaract = json_encode([
            "typeEnergie" => $_POST["carCaract_typeEnergie"],
            "nbPlaces" => intval($_POST["carCaract_nombreDePlaces"]),
            "automatique" => !isset($_POST["carCaract_automatique"])
        ]);
        $carPhoto = $_POST["carPhoto"];
        $carEtatL = $_POST["carEtatL"];
        
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
 * Fonction utilitaire qui affiche une vue.
 */
function utils_getView($vueName, $data) {
    require("./views/common/commonHead.php");
    require("./views/admin/$vueName.php");
    require("./views/common/commonFoot.php");
}

function facture() {
    // calcul des factures pour les entreprises (mois courant
    // afficher la facture de la flotte de véhicules loués par une entreprise, avec une ligne de facturation par véhicule.
    // Considérer une tarification différente si la durée de la location est importante (à évaluer en nb de jours ou de mois, par exemple).
    // Il y aune réduction de 10% supplémentaire si le nombre de véhicules 
    // de la flotte est >10. Si la durée restante de la location dépasse le mois,
    // la facturation est mensualisée et à payer pour le mois courant.
}

function login() {

}


