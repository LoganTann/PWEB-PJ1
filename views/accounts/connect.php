<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/css/materialize.min.css">

<script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<body>

    <nav class="yellow darken-3">
    </nav>

    <div class="login">
        <div class="form yellow darken-3">
            <form class="login-form" action="index.php?page=accounts&action=connect" method="post">
                <span class="material-icons">lock</span>
                <input class="white" style="border-radius: 5px;" type="text" placeholder="pseudo" name="pseudo" required />
                <input class="white" style="border-radius: 5px;" type="password" placeholder="mot de passe" name="mdp" required />
                <button class="waves-effect" type="submit">connexion</button>
            </form>
            <a href="?page=accounts&action=create" style="font-size: 14px">Vous n'avez pas encore de compte ?</a>
            <?php
            if(isset($_SESSION['successfulConnection']) && isset($_POST['pseudo'])  && isset($_POST['mdp']) && $_SESSION['successfulConnection'] == -1) {
                echo ("<p style='color: red'>Pseudo ou mot de passe incorrect</p>");
            }
            ?>
        </div>
    </div>

</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Comfortaa&display=swap');

    .login {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
        font-family: 'Comfortaa', cursive;
    }

    .form {
        position: relative;
        z-index: 1;
        border-radius: 10px;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
    }

    .form input {
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        border-radius: 5px;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
        font-family: 'Comfortaa', cursive;
    }

    .form button {
        font-family: 'Comfortaa', cursive;
        text-transform: uppercase;
        outline: 0;
        background: #4b6cb7;
        width: 100%;
        border: 0;
        border-radius: 5px;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }

    .form span {
        font-size: 75px;
        color: #4b6cb7;
    }

    nav {
        display: flex;
        justify-content: right;
    }

    nav>a {
        margin-top: 0.4em;
        margin-left: 1em;
    }
</style>