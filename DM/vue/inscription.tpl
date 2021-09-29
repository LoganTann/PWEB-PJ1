<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>identification</title>
</head>

<body>

    <h3> Formulaire d'authentification </h3>
    <form action="?" method="post">

        <input name="nom" type="text" value="<?php echo $nom;?>">
        Nom <br />

        <input name="prenom" type="text" value="<?php echo $prenom;?>">
        Prénom <br />

        <input name="password" type="password" value="<?php echo $password;?>">
        Mot de passe <br />
        
        <input name="email" type="text" value="<?php echo $email;?>">
        email <br />

        <input type="submit" value="soumettre">

    </form>

    <div>
        <?php echo $msg; ?>
    </div>
</body>

</html>