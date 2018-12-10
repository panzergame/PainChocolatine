<?php

$commerce = commerceConnecte();

if($commerce !== null) {
	$reservations = listerReservationsCommerce($commerce);
	echo "<table>";
	echo "<tr id=\"entete\">
		<td>Nom du produit</td>
		<td>Nom du client</td>
		<td>Horaire</td>
		<td>Quantité du produit</td>
		<td>Prix total</td>
	</tr>";
	
	foreach ($reservations as $reservation) {
		$client = obtenirClientId($reservation->idClient);
		$offre = obtenirOffreId($reservation->idOffre);
		$produit = obtenirProduitId($offre->idProduit);

		$id = $reservation->id;
		$nom_client = $client->nom;
		$nom_produit = $produit->nom;
		$horaire = $offre->horaire;
		$qte = $reservation->qte;
		$prix_total = $produit->prix * $qte;

		echo "<tr>";
		echo "<td>$nom_produit</td>";
		echo "<td>$nom_client</td>";
		echo "<td>$horaire</td>";
		echo "<td>$qte</td>";
		echo "<td>$prix_total</td>";
		echo "<td>";
		echo "<form action=\"interface/commerce/action/validerReservation.php\" method=\"post\">";
		echo "<button type=\"submit\" name=\"id\" value=\"$id\">Valider</button>";
		echo "</form>";
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
else{
	echo "<p>Veuillez vous connecter</p>"; // TODO
}

?>
