<?php

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


?>