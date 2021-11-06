<?php

function addToCart(){
    $error = "";

    require("./model/cars.php");
    if(isset($_GET['id'])){
        $_SESSION['cart'] = $_GET['id'];
    }
    $Cars = getCarsBD('disponible');
    $car = getCarBD($_SESSION['cart']);
    //echo "ici";
    require('./views/customer/cart.php');
    if(count($_POST) > 0){
        $dates = array(
            "Debut" => $_POST['DateD'],
            "Fin" => $_POST['DateF']
        );
        $_SESSION['dates'] = $dates;
        if(!checkDates($dates)){
            $error = 'Les dates ne sont pas valides, veuillez ressayer';
        } else {
            $nexturl = "index.php?page=customer&action=recap";
            header ("Location:" . $nexturl);
        }
    }
}

function recap(){
    require("./model/cars.php");
    $car = getCarBD($_SESSION['cart']);
    require('./views/customer/recap.php');
}

function checkDates($dates){
    return strtotime($dates['Debut']) >= time() && (strtotime($dates['Debut']) <= strtotime($dates['Fin']) && strtotime($dates['Debut']) >= time());

}