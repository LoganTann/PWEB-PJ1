<?php

session_start();

$page = "home";
$action = "index";

if (isset($_GET["page"])) {
    $page = $_GET["page"];
}
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}


require("./controllers/$page.php");
$action();


