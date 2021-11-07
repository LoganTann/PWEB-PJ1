<?php

function index() {
    require ("model/cars.php");
    $Cars = getCarsBD();
    unset($_SESSION['user_info']);
    $_SESSION['cart'] = array();
    $_SESSION['loggedin'] = -1;
    require("./views/home/home.php");
}