<?php

// Tous les commerces.
$commerces = listerCommerces();

echo "<h1>Liste de commerces</h1>";

echo "<table>";

echo "<tr><td>Nom</td><td>Description</td><td>Type</td><td></td></tr>";

foreach ($commerces as $commerce) {
	$nom = $commerce->nom;
	$description = $commerce->description;
	$type = $commerce->type;
	$id = $commerce->id;

	echo "<tr>";
	echo "<td>$nom</td>";
	echo "<td>$description</td>";
	echo "<td>$type</td>";
	echo "<td>";
	/* Formulaire pour lister les produits. Celui ci appelle action/commerce.php
	 * qui se charge de placer dans _SESSION["commerce"] le commerce de la ligne
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
