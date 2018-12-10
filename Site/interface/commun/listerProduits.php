<?php

$commerce = commerceSelectionne();
// Toutes les produits du commerce précedement selectionné.
$produits = listerProduits($commerce);

echo "<h1>Liste de produits</h1>";

echo "<table>";

echo "<tr id=\"entete\">";
echo "<td></td><td>Nom</td><td>Description</td><td>Prix</td><td></td>";
echo "</tr>";

foreach ($produits as $produit) {
	$nom = $produit->nom;
	$description = $produit->description;
	$prix = $produit->prix;
	$id = $produit->id;
	$imagePath = imagePath($produit->image);

	echo "<tr>";
	echo "<td><img src=\"$imagePath\" alt=\"profile\" height=\"30\" width=\"30\"/></td>";
	echo "<td>$nom</td>";
	echo "<td>$description</td>";
	echo "<td>$prix</td>";
	echo "<td>";
	/* Formulaire pour lister les offres. Celui ci appelle action/produit.php
	 * qui se charge de selectionner le produit de la ligne
	 * actuelle, ensuite ce même fichier redirige vers index.php avec action=listerOffre.
	 */
	echo "<form action=\"interface/commun/action/produit.php\" method=\"post\">";
		echo "<button type=\"submit\" name=\"id\" value=\"$id\">Voir les offres</button>";
		echo "<input type=\"hidden\" name=\"action\" value=\"listerOffre\"/>";
	echo "</form>";
	echo "</td>";
	
	echo "</tr>";
}

echo "</table>";

?>
