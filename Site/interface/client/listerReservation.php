<?php

$client = clientConnecte();

if($client !== null) {
	$reservations = listerReservationsClient($client);

	echo "<table>";
	echo "<tr>
			<td>Commerce</td>
			<td>Nom du produit</td>
			<td>Quantite résérvé</td>
			<td>Prix à payer</td>
		</tr>";

	foreach($reservations as $reservation) {
		$commerce = obtenirCommerceId($reservation->idCommerce);
		$offre = obtenirOffreId($reservation->idOffre);
		$produit = obtenirProduitId($offre->idProduit);
		$qte = $reservation->qte;
		$prix = $produit->prix * $qte;
		$nom_commerce = $commerce->nom;
		$nom_produit = $produit->nom;

		echo "<tr>";
		echo "<td>$nom_commerce</td>";
		echo "<td>$nom_produit</td>";
		echo "<td>$qte</td>";
		echo "<td>$prix</td>";
		echo "</tr>";
	}
	echo "</table>";
}
else{
	echo "<p>Veuillez vous connecter</p>"; // TODO
}

?>
