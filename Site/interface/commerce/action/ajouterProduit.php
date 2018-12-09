<?php

include_once "../../../include/db/session.php";
include_once "../../../include/db/image.php";
include_once "../../../include/get.php";
include_once "../../../include/error.php";

$commerce = commerceConnecte();

$url_ajout_produit = getUrl("../../../index.php", array("action" => "ajouterProduit"));
$url_connexion = getUrl("../../../index.php", array("action" => "connexion"));
$url_ajouter_offre = getUrl("../../../index.php", array("action" => "ajouterOffre"));

if ($commerce === null) {
	// On renvoie vers la page de connexion
	Header("Location: $url_connexion");
}
else {
	// On vérifie si les champs sont valides ou remplis .
	valeurValidePost("nom");
	valeurValidePost("description");
	valeurValideNumericPost("prix");
	valeurValideFiles("image");

	if ($image_valid) {
		$image_valid = enregisterImage($imageTmp, $image);
	}

    //On ajoute le produit à la bd.
    if ($prix_valid and $description_valid and $nom_valid and $image_valid){
		$produit = ajouterProduit($commerce, $nom, $description, $image, $prix);
		if ($produit !== null) {
			selectionnerProduit($produit);
			valideAction();
			Header("Location: $url_ajouter_offre");
		}
		else {
			// Produit déjà existant.
			erreurAction("Produit déjà existant");
			Header("Location: $url_ajout_produit");
		}
	}
	else {
		// champs invalides
		erreurAction("Champs invalides");
		Header("Location: $url_ajout_produit");
	}
}
