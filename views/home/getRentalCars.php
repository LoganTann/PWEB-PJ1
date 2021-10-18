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
                echo('<div class="row">');
                echo(' <div class="col s12 m3">');
                echo('<div class=card>');
                echo('<div class=card-image>');
                echo('<img src='.$car['photo'].'>');
                echo('<a class="btn-floating halfway-fab waves-effect waves-light "><i class="material-icons">add</i></a>');
                echo('</div>');
                echo('<div class="card-content">');
                echo('<span class="card-title">'.$car['type'].' '.$car['prix'].'€/heure'.'</span>');

                echo json_decode($car['caract'])->typeEnergie;
                echo "Nombre de places : ".json_decode($car['caract'])->nbPlaces ;

                echo('</div></div></div></div>');
            }
            echo("</ul>");
        }else echo ('pas de voitures en cours de location');

        ?>

    </main>
    <footer>

    </footer>
</body>
</html>