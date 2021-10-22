<?php
function description($id) {
    require ("model/connectBD.php") ; 
    $sql="SELECT v.id, type, prix, caract, photo, etatL FROM vehicule v";
    try {
        $commande = $pdo->prepare($sql);
        $bool = $commande->execute();
        if (!$bool) {
            return "ERROR" ;
        }
        $descriptif = $commande->fetch();
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die();
    }
    return $descriptif;
}

function getCarsBD($etatL){
    require('model/connectBD.php');
    $sql="SELECT type, prix, photo, etatL, caract FROM vehicule WHERE etatL=:etatL";
    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':etatL', $etatL);
        $bool = $commande->execute();
        $Cars= array();
			if ($bool) {
				while ($c = $commande->fetch()) {
					$Cars[] = $c; //stockage dans $C des enregistrements sélectionnés
				}	
			}
		}
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); // On arrête tout.
    }
    return $Cars;
}

function getRentalCarsBD(){
    require('model/connectBD.php');
    $sql="SELECT type, prix, photo, etatL, caract FROM vehicule WHERE etatL REGEXP '^[0-9]+$'";
    try {
        $commande = $pdo->prepare($sql);
        $bool = $commande->execute();
        $Cars= array();
			if ($bool) {
				while ($c = $commande->fetch()) {
					$Cars[] = $c; //stockage dans $C des enregistrements sélectionnés
				}	
			}
		}
    catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        die(); // On arrête tout.
    }
    return $Cars;
}


function addCar($carType, $carPrice, $carCaract, $target_file, $carEtatL) {
    require('model/connectBD.php');
    $sql="INSERT INTO `vehicule` (`id`, `type`, `prix`, `caract`, `photo`, `etatL`) VALUES (NULL, :type, :price, :caract, :image, :etatl)";
    $req = $pdo->prepare($sql);
    $req->bindParam(':type', $carType);
    $req->bindParam(':price', $carPrice);
    $req->bindParam(':caract', $carCaract);
    $req->bindParam(':image', $target_file);
    $req->bindParam(':etatl', $carEtatL);
    return $req->execute();
}

?>