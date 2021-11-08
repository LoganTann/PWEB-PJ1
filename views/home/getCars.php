<?php

if (empty($noNavbar)) {
    require './views/common/commonHead.php';
    if (empty($_SESSION['loggedin'])) {
        require("./views/common/navbarVisiteur.php");
    } else {
        require("./views/common/navbarSub.php");
    }
}


?>
<main class="container">
    <?php if (isset($Cars)) { ?>
        <h2>Liste des voitures : </h2>
        <div class="row">
            <?php foreach ($Cars as $car) : ?>
                <div class="col s12 m6 xl4">
                    <?php require("./views/home/card.php"); ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php } else { ?>
        Pas de voitures dispo
    <?php } ?>
</main>
<?php
require './views/common/commonFoot.php';
?>