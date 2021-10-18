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
            echo("<h2>Liste des voitures : </h2>");
            echo("<ul>");
            foreach($Cars as $car){
                echo("<li>". $car['type'] ." Prix : " . $car['prix'] . "€ </li>");
            }
            echo("</ul>");

            echo('<div class=card>');
            echo('<div class=card-image>');
            echo('<img src="https://www.turbo.fr/sites/default/files/2021-03/Peugeot%20208.png">');
            echo('<span class="card-title">Card2Title</span>');
            echo('<a class="btn-floating halfway-fab waves-effect waves-light "><i class="material-icons">add</i></a>');
            echo('</div>');
            echo('<div class="card-content">');
            echo('<p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>');
            echo('</div></div>');



        }else echo ('pas de voitures dispo');

        ?>


  <div class="row">
    <div class="col s12 m6">


      <div class="card">
        <div class="card-image">
          <img src="https://www.turbo.fr/sites/default/files/2021-03/Peugeot%20208.png">
          <span class="card-title">Card Title</span>
          <a class="btn-floating halfway-fab waves-effect waves-light "><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>


    </div>
  </div>
              

    </main>
    <footer>

    </footer>
</body>
</html>