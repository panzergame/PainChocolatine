
<?php

$produit = produitSelectionne();
$nom = $produit->nom;

echo "<h2>Reservation de $nom</h2>";

?>

<form method='post' action='interface/client/action/reservation.php'>

	<p>
		<label for='qte'>Quantité</label>
		<input type="number" name="qte" min="1" />
	</p>

	<p>
		<label for='action'></label>
		<input type="submit" name="action" value="OK"/>
	</p>

</form>
