<?php

include_once "../../../include/db/session.php";
include_once "../../../include/url.php";
include_once "../../../include/error.php";

$commerce = commerceConnecte();

$url_connexion = getUrlIndex("connexion");
$url_ajouter_offre = getUrlIndex("ajouterOffre");
$url_lister_offre = getUrlIndex("listerOffre");

if ($commerce == null) {
	// On renvoie vers la page de connexion
	erreurAction("", $url_connexion);
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
			erreurAction("Quantité par client ne pouvant pas être supérieur à la quantité totale", $url_ajouter_offre)
		}
		else {
			$produit = obtenirProduitId($id);
			//On ajoute le produit à la bd.
			$offre = ajouterOffre($commerce, $produit, $qteMaxCumul, $qteMaxClient, $horaire, $tempsMax);

			if ($offre !== null) {
				// Offre ajouté.
				selectionnerCommerce($commerce);
				selectionnerProduit($produit);
				valideAction($url_lister_offre);
			}
			else {
				// Le produit existait déjà.
				erreurAction("Offre déjà existante", $url_ajouter_offre);
			}
		}
	}
	else{
		erreurAction("Champs invalides", $$url_ajouter_offre);
	}
}
