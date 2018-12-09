<?php

include_once "../../../include/db/session.php";
include_once "../../../include/db/client.php";
include_once "../../../include/get.php";
include_once "../../../include/error.php";

$url_inscription = getUrl("../../../index.php", array("action" => "inscription"));
$url_lister_commerce = getUrl("../../../index.php", array("action" => "listerCommerce"));

valeurValidePost("nom");
valeurValidePost("mdp");
valeurValidePost("email");

if ($nom_valid and $mdp_valid and $email_valid and $image_valid) {
	$client = ajouterClient($nom, $mdp, $email, $image);

	if($client) {
		connecterClient($client);
		valideAction();
		Header("Location: $url_lister_commerce");
	}
	else {
		// Connexion échouée, client déjà existant.
		erreurAction("Client déjà existant");
		Header("Location: $url_inscription");
	}
}
else {
	// Champs invalides.
	erreurAction("Champs invalides");
	Header("Location: $url_inscription");
}

?>
