<?php

function index() {
    require ("model/cars.php");
    $Cars = getCarsBD();
    require("./views/home/home.php");
}