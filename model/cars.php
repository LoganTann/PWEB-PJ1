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
?>