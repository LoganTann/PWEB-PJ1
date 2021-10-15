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
		<h1>Identification</h1>

		<form action="index.php?controle=utilisateur&action=ident" method="post">
			<label for="nom">nom :</label>
			<input type="text" name="nom" class="nom" value="<?php echo $nom ?>" /> 

			<br><label for="num">identifiant :</label>
			<input type="password" name="num" class="num" value="<?php echo $num ?>" />

			<br><input type= "submit" value= "ok" /> 	 
		</form>

		<div id ="m"> <?php echo $msg; ?> </div>
		
		<p>Pas envie de se connecter ? Alors <a href="index.php?controle=utilisateur&action=inscription">inscrivez-vous</a> !</p>
	</main>
	</body>
</html>
