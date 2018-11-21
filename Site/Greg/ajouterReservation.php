<?php
	$offre = $_SESSION["offre"];
	$produit = $_SESSION["produit"];
	if(isset($_SESSION["error"])){
		echo"<p>La quantite selectionne n'est pas valide</p>";
	}
	echo"<p>Reservation pour ".$produit["nom"]."</p>";
	echo"<p>Horaire de la reservation ".$offre["horaire"]."</p>";
	echo"<form action='action/reservatio.php' method='post'>";
	echo"<input type='number' name='qte'/>";
	echo"<input type='submit' name='action' value='Valider'/>";
	echo"</form>";
	
?>