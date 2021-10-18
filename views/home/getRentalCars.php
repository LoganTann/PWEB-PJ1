<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paris Descar-z</title>

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
            margin-left: 1em;
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
        <?php
        if($Cars != false){
            echo("<h2>Liste des voitures en cours de location : </h2>");
            echo("<ul>");
            foreach($Cars as $car){
                echo("<li>". $car['type'] ." Prix : " . $car['prix'] . "€ </li>");
            }
            echo("</ul>");
        }else echo ('pas de voitures en cours de location');

        ?>

    </main>
    <footer>

    </footer>
</body>
</html>