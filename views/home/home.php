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
        <h3>Référence de l'API : </h3>
        <p style="font-family: monospace;">/index.php<b>?page=</b>nomDuControlleur<b>&action=</b>nomDeFonction</p>
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
                <a href="?page=vehicle&action=afficher_description&id=1">
                    <img src="https://www.publicdomainpictures.net/pictures/100000/nahled/classic-car-1404217966lQK.jpg">
                </a>
            </div>
            <div class="col s4">
                <a href="?page=vehicle&action=afficher_description&id=2">
                    <img src="https://www.publicdomainpictures.net/pictures/100000/nahled/classic-car-1404217966lQK.jpg">
                </a>
            </div>
            <div class="col s4">
                <a href="?page=vehicle&action=afficher_description&id=3">
                    <img src="https://www.publicdomainpictures.net/pictures/100000/nahled/classic-car-1404217966lQK.jpg">
                </a>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>