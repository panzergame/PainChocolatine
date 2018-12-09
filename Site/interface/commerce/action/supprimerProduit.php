<?php

include_once "../../../include/db/session.php";
include_once "../../../include/url.php";
include_once "../../../include/error.php";

$commerce = commerceConnecte();

$url_connexion = getUrl("../../../index.php", array("action" => "connexion"));
$url_lister_produit = getUrl("../../../index.php", array("action" => "listerProduit"));

if ($commerce == null) {
	// On renvoie vers la page de connexion
	erreurAction("", $url_connexion);
}
else {
	valeurValideNumericPost("id");

	if ($id_valid) {
		$produit = obtenirProduitId($id);
		supprimerProduit($produit);
		valideAction($url_lister_produit);
	}
	else {
		erreurAction("Champs invalides", $url_lister_produit);
	}
}
