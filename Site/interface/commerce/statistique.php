<?php

$commerce = commerceConnecte();

if($commerce !== null) {
	$statistiques = listerStatistiqueCommerce($commerce);
	echo "<table>";
	echo "<tr>
        <th>Nom du client</th>
		<th>Nom du produit</th>
		<th>Horaire</th>
		<th>Quantité du produit</th>
		<th>Prix total</th>
        <th>Jour</th>
	</tr>";
	
	foreach ($statistiques as $statistique) {
		$client = obtenirClientId($statistique->idClient);
		$offre = obtenirOffreId($statistique->idOffre);
		$produit = obtenirProduitId($offre->idProduit);
        

		$nom_client = $client->nom;
		$nom_produit = $produit->nom;
		$horaire = $offre->horaire;
		$qte = $reservation->qte;
		$prix_total = $produit->prix * $qte;
        $date = $statistique->jour;

		echo "<tr>";
		echo "<td>$nom_client</td>";
        echo "<td>$nom_produit</td>";		
		echo "<td>$horaire</td>";
		echo "<td>$qte</td>";
		echo "<td>$prix_total</td>";
        echo "<td>$date</td>";

		echo "</tr>";
	}
	echo "</table>";
}
else{
	echo "<p>Veuillez vous connecter</p>"; // TODO
}

?>
