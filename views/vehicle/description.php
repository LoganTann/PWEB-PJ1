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
    <?php
    if ($_SESSION['loggedin'] == -1) {
        require("./views/home/navbarVisiteur.php");
    } else {
        require("./views/home/navbarSub.php");
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
    <footer>

    </footer>
</body>

</html>