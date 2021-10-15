<?php 
	/*controleur contact.php :
		fonctions-action de gestion des contacts
	*/
	
	function afficher_description() {
		require ("model/cars.php");
		$id = (isset($_GET['id']))?$_GET['id']:-1;
		$Descriptif = description($id);
		require ("views/vehicle/description.php");
	}