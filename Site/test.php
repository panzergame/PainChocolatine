<?php

include_once "include/db/main.php";

function afficherClass($inst)
{
	if ($inst === null) {
		echo "NULL";
	}
	else {
		echo "<ul>";
		foreach ($inst as $key => $value) {
			echo "<li>$key : $value</li>";
		}
		echo "</ul>";
	}
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

echo "<p>aouter un commerce : </p>";

$newcommerce = ajouterCommerce("Test", "root", "description vide", "boulangerie", "+33687986554", "croissant@fertile.com");
afficherClass($newcommerce);

echo "<p>clients : </p>";

$clients = listerClients();
afficherListe($clients);

echo "<p> connexion client (Michel, root): </p>";

$client = obtenirClientConnexion("Michel", "root");
afficherClass($client);

echo "<p>ajouter un client : </p>";

$newclient = ajouterClient("Test", "root", "marc@void.com");
afficherClass($newclient);

echo "<p>produits du premier commerce :</p>";

$produits = listerProduits($commerce);
afficherListe($produits);

$produit = $produits[0];

$newproduit = null;
if ($newcommerce !== null) {
	echo "<p>ajouter un produit :</p>";

	$newproduit = ajouterProduit($newcommerce, "Tarte", "", 5.0);
	afficherClass($newproduit);
}

echo "<p>offres pour le premier produit :</p>";

$offres = listerOffres($produit);
afficherListe($offres);

$offre = $offres[0];

if ($newproduit !== null) {
	echo "<p>ajouter une offre :</p>";

	$newoffre = ajouterOffre($newcommerce, $newproduit, 25, 3, "18:00");
	afficherClass($newoffre);
}

echo "<p>ajout d'une reservation :</p>";

// $reservation = ajouterReservation($client, $offre, 2);
// afficherClass($reservation);

echo "<p>reservation du client actuel : </p>";

$reservations = listerReservationsClient($client);
afficherListe($reservations);

echo "<p>reservation du commerce actuel : </p>";

$reservations = listerReservationsCommerce($commerce);
afficherListe($reservations);


echo "<p>Suppression d'un client</p>";

echo supprimerClient("Test", "root");

echo "<p>Suppression d'un commerce</p>";

echo supprimerCommerce("Test", "root");

?>
