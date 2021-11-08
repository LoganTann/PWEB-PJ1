<?php
require './views/common/commonHead.php';
if (empty($_SESSION['loggedin'])) {
    require("./views/common/navbarVisiteur.php");
} else {
    require("./views/common/navbarSub.php");
}
?>
    <header class="container grey">
        <h1><?php echo ($Descriptif[1]) ?></h1>
    </header>
    <main>
        <div class="row">
            <style>
                img {
                    display: flex;
                    justify-content: space-around;
                    width: 615px;
                    height: 407px;
                }
            </style>
            <div class="col s4">
                <?php echo ('<img src=' . $Descriptif[4] . '></img>') ?>
            </div>
            <a href="?page=home" class="btn btn-large">Retour</a>
        </div>
    </main>
<?php
require './views/common/commonFoot.php';
?>

<style>
    .img-format{
        margin-left: 10px;
        width: 160px;
    }
</style>