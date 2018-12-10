<?php

echo "<h1>Liste des reservations efféctuées </h1>";

$commerce = commerceConnecte();

if($commerce !== null) {
	$statistiques = listerStatistiqueCommerce($commerce);
	echo "<table>";
	echo "<tr id=\"entete\">
        <td>Nom du client</td>
		<td>Nom du produit</td>
		<td>Horaire</td>
		<td>Quantité du produit</td>
		<td>Prix total</td>
        <td>Jour</td>
	</tr>";
	
	foreach ($statistiques as $statistique) {
		$client = obtenirClientId($statistique->idClient);
		$offre = obtenirOffreId($statistique->idOffre);
		$produit = obtenirProduitId($offre->idProduit);
        

		$nom_client = $client->nom;
		$nom_produit = $produit->nom;
		$horaire = $offre->horaire;
		$qte = $statistique->qte;
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
