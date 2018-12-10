<?php

$client = clientConnecte();

echo "<h1>Liste des reservations efféctuées </h1>";

if($client !== null) {
	$statistiques = listerStatistiqueClient($client);
	echo "<table>";
	echo "<tr id=\"entete\">
        <td>Nom du commerce</td>
		<td>Nom du produit</td>
		<td>Horaire</td>
		<td>Quantité du produit</td>
		<td>Prix total</td>
        <td>Jour<td>
	</tr>";
	
	foreach ($statistiques as $statistique) {
		$commerce = obtenirCommerceId($statistique->idCommerce);
		$offre = obtenirOffreId($statistique->idOffre);
		$produit = obtenirProduitId($offre->idProduit);

		$nom_commerce = $commerce->nom;
		$nom_produit = $produit->nom;
		$horaire = $offre->horaire;
		$qte = $statistique->qte;
		$prix_total = $produit->prix * $qte;
        $date = $statistique->jour;


		echo "<tr>";
		echo "<td>$nom_commerce</td>";
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
