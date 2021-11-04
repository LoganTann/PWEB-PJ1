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
        .card-image {
            height: 400px;
            /* Your height here */
            display: flex;
            align-items: center;
        }

        nav {
            display: flex;
            justify-content: right;
        }

        nav>a {
            margin-top: 0.4em;
            margin-left: 1em;
        }

        .icones {
            width: 7%;
            height: 7%;
            margin-right: 2%;
        }

        .info-container {
            display: flex;
            align-items: center;
        }
    </style>
    <?php
    if($_SESSION['loggedin'] == -1) {
        require("./views/home/navbarVisiteur.php");
    }
    else {
        require("./views/home/navbarSub.php");
    }

    ?>
    <header class="container">
        <h1>Gestion de la flotte</h1>


        <h3>Référence de l'API : </h3>
        <p style="font-family: monospace;">/index.php<b>?page=</b>nomDuControlleur<b>&action=</b>nomDeFonction</p>
    </header>
    <main>
        <?php if (isset($Cars)) { ?>
            <h2>Liste des voitures en cours de location : </h2>
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
    <footer>
        <p>© 2021 - pweb</p>
    </footer>
</body>

</html>