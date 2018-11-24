<?php

include_once "../../../include/db/session.php";
include_once "../../../include/get.php";
include_once "../../../include/error.php";

$commerce = commerceConnecte();

$url_connexion = getUrl("../../../index.php", array("action" => "connexion"));
$url_ajouter_offre = getUrl("../../../index.php", array("action" => "ajouterOffre"));
$url_lister_offre = getUrl("../../../index.php", array("action" => "listerOffre"));

if ($commerce == null) {
	// On renvoie vers la page de connexion
	Header("Location: $url_connexion");
}
else {
	valeurValideNumericPost("id");
	valeurValideNumericPost("qteMaxCumul");
	valeurValideNumericPost("qteMaxClient");
	valeurValidePost("horaire");

	if ($id_valid and $qteMaxCumul_valid and $qteMaxClient_valid and $horaire_valid) {
		$produit = obtenirProduitId($id);
		//On ajoute le produit à la bd.
		$offre = ajouterOffre($commerce, $produit, $qteMaxCumul, $qteMaxClient, $horaire);

		if ($offre !== null) {
			// Offre ajouter.
			selectionnerCommerce($commerce);
			selectionnerProduit($produit);
			Header("Location: $url_lister_offre");
		}
		else {
			// Le produit existait déjà.
			Header("Location: $url_ajouter_offre");
		}
	}
	else{
		Header("Location: $$url_ajouter_offre");
	}
}
