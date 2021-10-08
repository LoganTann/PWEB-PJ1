
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>TP1 contacts - mvc - formulaire d'identification</title>
		<link rel="stylesheet" href="vue/styleCSS/utilisateur.css"/>
		<!-- <script src="script.js"></script> -->
	</head>
	<body>
	<main>
		<h1>Inscription</h1>
		<?php
			if (isset($errors) && is_array($errors)) {
				echo '<ul class=\'errors\'>';
				foreach ($errors as $error) {
					echo "<li>$error</li>";
				}
				echo '</ul>';
			}
		?>
		<form action="index.php?controle=utilisateur&action=inscription" method="post">
			<label for="nom">nom :</label>
			<input type="text" name="nom" class="nom" value="<?php echo $profil["nom"] ?>" /> 

			<br><label for="prenom">prénom :</label>
			<input type="text" name="prenom" class="prenom" value="<?php echo $profil["prenom"] ?>" />

			<br><label for="num">mot de passe :</label>
			<input type="password" name="num" class="num" value="<?php echo $profil["num"] ?>" />

			<br><label for="email">e-mail :</label>
			<input type="email" name="email" class="email" value="<?php echo $profil["email"] ?>" />
			<br>
			<input type= "submit" value= "ok" /> 	 
		</form>
		
		<p>Pas envie de s'inscrire ? Alors <a href="index.php?controle=utilisateur&action=ident">identifiez-vous</a> !</p>
	</main>
	</body>
</html>
