<?php

include_once "../../../include/db/session.php";
include_once "../../../include/get.php";
include_once "../../../include/error.php";

$commerce = commerceConnecte();

$url_connexion = getUrl("../../../index.php", array("action" => "connexion"));
$url_lister_produit = getUrl("../../../index.php", array("action" => "listerProduit"));

if ($commerce == null) {
	// On renvoie vers la page de connexion
	Header("Location: $url_connexion");
}
else {
	valeurValideNumericPost("id");

	if ($id_valid) {
		$produit = obtenirProduitId($id);
		supprimerProduit($produit);
		effacerValeurs();
	}
	else {
		leverErreur("Champs invalides");
	}

	Header("Location: $url_lister_produit");
}
