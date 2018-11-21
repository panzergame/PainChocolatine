<?php
	include_once "include/db.php";
	session_start();
	$commerce = $_SESSION["commerceConnecte"];
	if(isset($commerce)){
		$reservations = listerReservationCommerce($commerce);
		echo "<table>";
		echo"<tr>
					<th>Réservations</th>
					<th>Nom du client</th>
			</tr>";
		foreach ($reservations as $reservation) {
			echo"<tr>";
			$client = obtenirClientId($reservation->idClient);
			$offre = obtenirOffreId($reservation->idOffre):
			$produit = obtenirProduitId($offre->idProduit);

			$nom_client = $client->nom;
			$nom_produit = $produit->nom;
			$horaire = $offre->horaire;
			$qte = $reservation->qte;
			$prix_total = $produit->prix * $qte;

			echo "<tr>";
			echo"<td>$nom_produit</td>";
			echo"<td>$nom_client</td>";
			echo"<td>$horaire</td>";
			echo"<td>$qte</td>";
			echo"<td>$prix_total</td>";
			echo"</tr>";
		}
		echo "</table>";
	}
	else{
		echo "<p>Veuillez vous connecter</p>"
	}
?>