<?php

include_once "../../../include/db/offre.php";
include_once "../../../include/db/commerce.php";
include_once "../../../include/db/produit.php";
include_once "../../../include/get.php";
include_once "../../../include/error.php";

session_start();

$commerce = $_SESSION["commerceConnecte"];

$url_connexion = getUrl("../../../index.php", array("action" => "inscriptionCommerce"));
$url_ajouter_offre = getUrl("../../../index.php", array("action" => "ajouterOffre"));
$url_lister_offre = getUrl("../../../index.php", array("action" => "listerOffre"));

if ($commerce == null) {
	// On renvoie vers la page de connexion
	Header("Location: $url_connexion");
}
else {
	valeurValidePost("id");
	valeurValidePost("qteMaxCumul");
	valeurValidePost("qteMaxClient");
	valeurValidePost("horaire");

	if ($id_valid and $qteMaxCumul_valid and $qteMaxClient_valid and $horaire_valid) {
		$produit = obtenirProduitId($id);
		//On ajoute le produit à la bd.
		$offre = ajouterOffre($commerce, $produit, $qteMaxCumul, $qteMaxClient, $horaire);

		if ($offre !== null) {
			// Offre ajouter.
			$_SESSION["commerce"] = $commerce;
			$_SESSION["produit"] = $produit;
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
