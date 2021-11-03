<?php

function index() {
    unset($_SESSION['user_info']);
    $_SESSION['loggedin'] = -1;
    require("./views/home/home.php");
}