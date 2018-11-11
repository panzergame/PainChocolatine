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

echo "<p> connexion commerce (Tocroustine, chocolatine): </p>";

$commerce = obtenirCommerceConnexion("Tocroustine", "chocolatine");

afficherClass($commerce);

echo "<p>clients : </p>";

$clients = listerClients();
afficherListe($clients);

echo "<p> connexion client (Michel, root): </p>";

$client = obtenirClientConnexion("Michel", "root");
afficherClass($client);

echo "<p>produits du premier commerce :</p>";

$produits = listerProduits($commerce);
afficherListe($produits);

$produit = $produits[0];

echo "<p>offres pour le premier produit :</p>";

$offres = listerOffres($produit);
afficherListe($offres);



?>
