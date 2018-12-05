<?php

$client = clientConnecte();

if($client !== null) {
	$statistiques = listerStatistiqueClient($client);
	echo "<table>";
	echo "<tr>
        <th>Nom du commerce</th>
		<th>Nom du produit</th>
		<th>Horaire</th>
		<th>Quantité du produit</th>
		<th>Prix total</th>
        <th>Jour<th>
	</tr>";
	
	foreach ($statistiques as $statistique) {
		$commerce = obtenirCommerceId($statistique->idCommerce);
		$offre = obtenirOffreId($statistique->idOffre);
		$produit = obtenirProduitId($offre->idProduit);
        

		$nom_commerce = $commerce->nom;
		$nom_produit = $produit->nom;
		$horaire = $offre->horaire;
		$qte = $reservation->qte;
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
