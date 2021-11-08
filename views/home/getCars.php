<?php
    require './views/common/commonHead.php';
    if($_SESSION['loggedin'] == -1) {
        require("./views/common/navbarVisiteur.php");
    }
    else {
        require("./views/common/navbarSub.php");
    }
?>
    <main>
        <?php if (isset($Cars)) { ?>
            <h2>Liste des voitures : </h2>
            <div class="row">
            <?php foreach ($Cars as $car): ?>
                <div class="col s12 m3">
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