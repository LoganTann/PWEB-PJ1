<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paris Descar-z</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>
</head>
<body>
<style>
    nav {
        display: flex;
        justify-content: right;
    }

    nav>a {
        margin-top: 0.4em;
        margin-left: 1em;
    }
</style>
<?php
if($_SESSION['loggedin'] == -1) {
    header("Location : index.php");
}
else {
    require("./views/common/navbarSub.php");
}

?>
<header class="container">
    <h1>Votre panier</h1>
    <h3>Référence de l'API : </h3>
    <p style="font-family: monospace;">/index.php<b>?page=</b>nomDuControlleur<b>&action=</b>nomDeFonction</p>
</header>
<main>
    <?php if (isset($car)) { ?>
<div class="row">
    <form name="dates" action="" method="post">

    <div class="col s12 m6">
        <ul class="collection">
            <li class="collection-item avatar">
                <?php echo '<img src='.$car['photo'].' alt="" class="circle">';
                echo '<span class="title"><b>'.$car['type'].'</b></span>'; ?>
                <p><?php echo 'Tarif journalier : '. $car['prix'].'€';?> <br>
                    Dates selectionnées : du <input name="<?php echo('DateD');?>" type="input-field inline" class="datepicker">
                    au <input name="<?php echo('DateF');?>" type="input-field inline" class="datepicker">
                </p>
            </li>
        </ul>
    </div>
    <div class="col m12">
        <input type="submit" value="Suivant" class="waves-effect waves-light btn-large" />
    </div>
        <?php echo $error ?>
    </form>
</div>
    <?php } else { ?>
        Panier vide :)
    <?php } ?>
</main>
<footer>
    <p>© 2021 - pweb</p>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, {
            // specify options here
        });
    });
</script>
</body>
</html>