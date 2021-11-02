<?php

function index() {
    $_SESSION['loggedin'] = -1;
    require("./views/home/home.php");
}