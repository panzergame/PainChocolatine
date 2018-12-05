<?php

$produit = produitSelectionne();
$nom = $produit->nom;

echo "<h2>Reservation de $nom</h2>";

?>

<form method='post' action='interface/client/action/reservation.php'>

<?php

	entreeNumeric("qte", "Quantité", 1, 1);
	buttonEnvoyer("OK");

?>

</form>
