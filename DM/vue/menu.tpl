	<h2> Services </h2>
	<hr/>
	<ul>
		<li>
			<a href='ident.php' title='connexion'>
				- Changer d'utilisateur
			</a>
		</li>

		<?php
		if (isset($idu)) {
			echo "<li><a href='contacts.php?idu=$idu'>Vos contacts</a></li>";
		}
		?>

		<li><a href='contacts.php?idu=1' title="contacts de l'utilisateur idU=1">
				- contacts de l'utilisateur idu=1</a> <i>todo</i>
		</li>
		<li><a href='contacts.php?idu=2' 
						title="contacts de l'utilisateur idU=2">
				- contacts de l'utilisateur idu=2</a> <i>todo</i>
		</li>	
	</ul>
	<hr/>