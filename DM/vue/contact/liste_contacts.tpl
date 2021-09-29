<!-- Template d'affichage de la liste des contacts.
Définir $Contact avant l'inclusion de ce fichier.
--> 

<!doctype html>
<html><head>
  <meta charset="utf-8">
  <title>service liste_contacts</title>
  <link rel="stylesheet" href="../styleCSS/style.css"/>
</head>

<body>

	<nav> 	
		<?php  require ("./vue/menu.tpl"); ?>
	</nav> <!-- fin du menu nav -->

	<div id ="main"> 
		<h2> Contacts </h2>
		<?php echo ("<br/>  IHM de la liste des contacts."); ?> 

		<?php 
		
		/* $Contact est supposé être la liste des contacts*/		
		if (isset ($Contact) && count($Contact) > 0) {
			echo ("<h2 style='color:blue'> Voici les contacts de $username :</h2>");
			echo ('<table>');
			echo ('<tr><th> NOM </th> <th> PRENOM </th> <th> EMAIL </th> <th>Contact</th></tr>'); 	
			foreach ($Contact as $c) {
				echo "<tr class='contact'>";
				echo ("<td>" . utf8_encode($c['nom']) . "</td>"); 
				echo ("<td>" . utf8_encode($c['prenom']) . "</td>"); 
				echo ("<td>" . utf8_encode($c['email']) . "</td>"); 
				//echo ("<td>" . utf8_encode($c['role']) . "</td>"); 
				echo ("<td><a href='./contacts.php?idu=".$c['id_nom']."'>ses contacts</a></td>"); 
				echo "</tr>\n";
			}
			echo ('</table>');
		}
		else 
			echo ('pas de contact');
			
		?>
		
	</div>

</body></html>
