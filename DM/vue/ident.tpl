<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>identification</title>
</head>

<body>

<h3> Formulaire d'authentification </h3> 
<form action="ident.php" method="post">

    <input 	name="nom" 	type="text" value= "<?php echo $nom;
											?>"
					>      Nom      <br/>
    <input  name="password"  type="text"  value= "<?php echo $password;
											?>"
					>  Matricule    <br/> 
					
	<input type= "submit"  value="soumettre">
	
</form>

	<div> <?php echo $msg; ?> </div>
</body></html>
