<?php
	session_start();
	$client = $_SESSION["clientConnecte"];
	if(isset($client)){
		$reservations = listerReservationClient($client);
		echo"<table>";
		echo"<tr>
				<td>Commerce</td>
				<td>Nom du produit</td>
				<td>Quantite reserve</td>
				<td>Prixa payer</td>
			</tr>";
		foreach($reservations as $reservation){
			echo"<tr>";
			$commerce = obtenirCommerceId($reservation["idCommerce"]);
			$offre = obtenirOffreId($reservation["idOffre"]);
			$produit = obtenirProduitId($offre["idProduit"]);
			$qte = $reservation["qte"];
			$prix = $produit["prix"] * $qte;
			echo"<td>".$commerce["nom"]."</td>";
			echo"<td>".$produit["nom"]."</td>";
			echo"<td>".$qte."</td>";
			echo"<td>".$prix."</td>";
			echo"</tr>";
		}
		echo"</table>";
	else{
		echo"<p>Veuillez vous connecter</p>";
	}
	}
?>