<?php

// Tous les commerces.
$commerces = listerCommerces();

echo "<h1>Liste de commerces</h1>";

echo "<table>";

echo "<tr id=\"entete\"><td></td><td>Nom</td><td>Description</td><td>Type</td><td>Adresse</td><td></td></tr>";

foreach ($commerces as $commerce) {
	$nom = $commerce->nom;
	$description = $commerce->description;
	$adresse = $commerce->adresse;
	$type = $commerce->type;
	$id = $commerce->id;
	$imagePath = imagePath($commerce->image);

	echo "<tr>";
	echo "<td><img src=\"$imagePath\" alt=\"profile\" height=\"30\" width=\"30\"/></td>";
	echo "<td>$nom</td>";
	echo "<td>$description</td>";
	echo "<td>$type</td>";
	echo "<td>$adresse</td>";
	echo "<td>";
	/* Formulaire pour lister les produits. Celui ci appelle action/commerce.php
	 * qui se charge de selectionner le commerce de la ligne
	 * actuelle, ensuite ce même fichier redirige vers index.php avec action=listerProduit.
	 */
	echo "<form action=\"interface/commun/action/commerce.php\" method=\"post\">";
		echo "<button type=\"submit\" name=\"id\" value=\"$id\">Voir les produits</button>";
		echo "<input type=\"hidden\" name=\"action\" value=\"listerProduit\"/>";
	echo "</form>";
	echo "</td>";
	
	echo "</tr>";
}

echo "</table>";

?>
