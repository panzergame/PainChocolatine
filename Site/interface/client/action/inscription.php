<?php

include_once "../../../include/db/session.php";
include_once "../../../include/db/client.php";
include_once "../../../include/url.php";
include_once "../../../include/error.php";

$url_inscription = getUrlIndex("inscription");
$url_lister_commerce = getUrlIndex("listerCommerce");

valeurValidePost("nom");
valeurValidePost("mdp");
valeurValidePost("email");

if ($nom_valid and $mdp_valid and $email_valid and $image_valid) {
	$client = ajouterClient($nom, $mdp, $email, $image);

	if($client) {
		connecterClient($client);
		valideAction($url_lister_commerce);
	}
	else {
		// Connexion échouée, client déjà existant.
		erreurAction("Client déjà existant", $url_inscription);
	}
}
else {
	// Champs invalides.
	erreurAction("Champs invalides", $url_inscription);
}

?>
