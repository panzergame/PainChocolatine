<?php

include_once "include/db/main.php";

function afficherClass($inst)
{
	echo "<ul>";
	foreach ($inst as $key => $value) {
		echo "<li>$key : $value</li>";
	}
	echo "</ul>";
}

function afficherListe($liste)
{
	foreach ($liste as $elem) {
		afficherClass($elem);
		echo "</br>";
	}
}

echo "<p>commerces : </p>";

$commerces = listerCommerces();
afficherListe($commerces);

$commerce = $commerces[0];

echo "<p>produits du premier commerce :</p>";

$produits = listerProduits($commerce);
afficherListe($produits);

$produit = $produits[0];

echo "<p>offres pour le premier produit :</p>";

$offres = listerOffres($produit);
afficherListe($offres);


?>
