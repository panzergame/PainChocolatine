<?php

include_once "../../../include/db/session.php";
include_once "../../../include/url.php";
include_once "../../../include/error.php";

$url_connexion = getUrlIndex("connexion");
$url_lister_clients = getUrlIndex("listerClient");

valeurValidePost("nom");
valeurValidePost("mdp");

if ($nom_valid and $mdp_valid) {
	$commerce = obtenirCommerceConnexion($nom, $mdp);

	if($commerce) {
		deconnecterClient();
		connecterCommerce($commerce);
		valideAction($url_lister_clients);
	}
	else {
		// Connexion échouée.
		erreurAction("Mot de passe ou identifiant invalide", $url_connexion);
	}
}
else {
	// Champs invalides.
	erreurAction("Mot de passe ou identifiant invalide", $url_connexion);
}

?>
