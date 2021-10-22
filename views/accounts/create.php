<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>


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
    <nav class="yellow darken-3">
    </nav>

    <h1>Formulaire d'incription</h1><br>
    <div class="row">
        <form class="col s12" action="index.php?page=accounts&action=create" method="post" >
        <div class="row">
            <div class="input-field col s3">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom">
            </div>
            <div class="input-field col s3">
                <label for="pseudo">Pseudo :</label>
                <input type="text" id="pseudo" name="pseudo">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="mdp">Mot de passe :</label>
                <input type="password" id="mdp" name="mdp">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="email">E-mail :</label>
                <input type="email" id="email" name="email">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="nomE">Nom d'entreprise :</label>
                <input type="text" id="nomE" name="nomE">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="adresseE">Adresse d'entreprise :</label>
                <input type="text" id="adresseE" name="adresseE">
            </div>
        </div>

        <input type="submit" class="btn btn-large"></input>
        </form>
        <p><?php var_dump($errors); ?> </p>
    </div>

</body>
</html>