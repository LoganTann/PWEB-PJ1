<?php

    function getCars(){
        require ("model/cars.php");
		$etatL = (isset($_GET['etat']))?$_GET['etat']:'disponible';
		$Cars = getCarsBD($etatL);
		require ("views/home/getCars.php");
    }

    function getRentalCars(){
        require ("model/cars.php");
        $Cars = getRentalCarsBD();
        require ("views/home/getRentalCars.php");
    }

?>