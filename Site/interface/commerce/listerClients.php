<?php

$commerce = $_SESSION["commerceConnecte"];

if(isset($commerce)) {
	$reservations = listerReservationsCommerce($commerce);
	echo "<table>";
	echo "<tr>
		<th>Nom du produit</th>
		<th>Nom du client</th>
		<th>Horaire</th>
		<th>Quantité du produit</th>
		<th>Prix total</th>
	</tr>";
	
	foreach ($reservations as $reservation) {
		$client = obtenirClientId($reservation->idClient);
		$offre = obtenirOffreId($reservation->idOffre);
		$produit = obtenirProduitId($offre->idProduit);

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
		echo "</tr>";
	}
	echo "</table>";
}
else{
	echo "<p>Veuillez vous connecter</p>";
}

?>
