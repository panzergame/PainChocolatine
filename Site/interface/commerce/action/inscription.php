<?php

include_once "../../../include/db/session.php";
include_once "../../../include/url.php";
include_once "../../../include/error.php";

$url_inscription = getUrlIndex("inscription");
$url_lister_clients = getUrlIndex("listerClient");

valeurValidePost("nom");
valeurValidePost("mdp");
valeurValidePost("email");
valeurValidePost("tel");
valeurValidePost("type");
valeurValidePost("description");
valeurValidePost("adresse");

if ($nom_valid and $mdp_valid and $email_valid and $tel_valid and $type_valid and $description_valid and $image_valid and $adresse_valid) {
	$commerce = ajouterCommerce($nom, $mdp, $description, $type, $tel, $adresse, $email, $image);

	if($commerce) {
		connecterCommerce($commerce);
		valideAction($url_lister_clients);
	}
	else {
		// Connexion échouée, commerce déjà existant.
		erreurAction("Compte déjà existant", $url_inscription);
	}
}
else {
	// Champs invalides.
	erreurAction("Champs invalides", $url_inscription);
}

?>
