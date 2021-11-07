<?php

function creerFacture($facture_info){
    require('model/connectBD.php');
    $sql = "INSERT INTO `facture` (`ide`, `idv`, `dateD`, `dateF`, `valeur`, `etatR`) VALUES (:ide, :idv, :dateD, :dateF, :valeur, :etatR)";
    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':ide', $facture_info["ide"]);
        $commande->bindParam(':idv', $facture_info["idv"]);
        $commande->bindParam(':dateD', $facture_info["dateD"]);
        $commande->bindParam(':dateF', $facture_info["dateF"]);
        $commande->bindParam(':valeur', $facture_info["valeur"]);
        $commande->bindParam(':etatR', $facture_info["etatR"]);
        if ($commande->execute()) {
            return $pdo->lastInsertId("id");
        }
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        die();
    }
    return -1;
}