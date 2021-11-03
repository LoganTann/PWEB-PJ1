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
    .card-image{
        height: 400px; /* Your height here */
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
<nav class="yellow darken-3">
    <a href="?page=accounts&action=create" class="btn btn-large">S'inscrire</a>
    <a href="?page=accounts&action=connect" class="btn btn-large">Se connecter</a>
</nav>
<header class="container">
    <h1>Bienvenue !</h1>


    <h3>Référence de l'API : </h3>
    <p style="font-family: monospace;">/index.php<b>?page=</b>nomDuControlleur<b>&action=</b>nomDeFonction</p>
</header>
<main>
    <main>
        <?php
        if (isset($Cars)) {
            echo ('<h2>Liste des voitures disponibles : </h2><div class="row">');
            foreach ($Cars as $car) {
                ?>
                <div class="col m3">
                    <?php require("./views/home/card.php"); ?>
                </div>
                <?php
            }
            echo("</div>");
        } else
            echo ('pas de voitures dispo');

        ?>
    </main>
</main>
<footer>

</footer>
</body>
</html>