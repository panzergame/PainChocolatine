<?php

include_once "../../../include/db/session.php";
include_once "../../../include/url.php";
include_once "../../../include/error.php";

$url_connexion = getUrl("../../../index.php", array("action" => "connexion"));
$url_lister_commerce = getUrl("../../../index.php", array("action" => "listerCommerce"));

valeurValidePost("nom");
valeurValidePost("mdp");

if ($nom_valid and $mdp_valid) {
	$client = obtenirClientConnexion($nom, $mdp);

	if($client) {
		deconnecterCommerce();
		connecterClient($client);
		valideAction($url_lister_commerce);
	}
	else {
		// Connexion échouée.
		erreurAction("Mot de passe ou identifiant invalide", $url_connexion);
	}
}
else {
	// Champs invalides.
	erreurAction("Champs invalides", $url_connexion);
}

?>
