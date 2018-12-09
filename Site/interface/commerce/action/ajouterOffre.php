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
	valeurValidePost("tempsMax");

	if ($id_valid and $qteMaxCumul_valid and $qteMaxClient_valid and $horaire_valid and $tempsMax_valid) {
		if ($qteMaxClient > $qteMaxCumul) {
			// WHAT THE HELL ! (quantité par client ne pouvant pas être supérieur à la quantité totale).
			Header("Location: $url_ajouter_offre");
		}
		else {
			$produit = obtenirProduitId($id);
			//On ajoute le produit à la bd.
			$offre = ajouterOffre($commerce, $produit, $qteMaxCumul, $qteMaxClient, $horaire, $tempsMax);

			if ($offre !== null) {
				// Offre ajouté.
				selectionnerCommerce($commerce);
				selectionnerProduit($produit);
				valideAction();
				Header("Location: $url_lister_offre");
			}
			else {
				// Le produit existait déjà.
				erreurAction("Offre déjà existante");
				Header("Location: $url_ajouter_offre");
			}
		}
	}
	else{
		erreurAction("Champs invalides");
		Header("Location: $$url_ajouter_offre");
	}
}
