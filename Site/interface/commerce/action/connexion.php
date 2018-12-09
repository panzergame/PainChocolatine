<?php

include_once "../../../include/db/session.php";
include_once "../../../include/get.php";
include_once "../../../include/error.php";

$url_connexion = getUrl("../../../index.php", array("action" => "connexion"));
$url_lister_clients = getUrl("../../../index.php", array("action" => "listerClient"));

valeurValidePost("nom");
valeurValidePost("mdp");

if ($nom_valid and $mdp_valid) {
	$commerce = obtenirCommerceConnexion($nom, $mdp);

	if($commerce) {
		deconnecterClient();
		connecterCommerce($commerce);
		valideAction();
		Header("Location: $url_lister_clients");
	}
	else {
		// Connexion échouée.
		erreurAction("Mot de passe ou identifiant invalide");
		Header("Location: $url_connexion");
	}
}
else {
	// Champs invalides.
	erreurAction("Mot de passe ou identifiant invalide");
	Header("Location: $url_connexion");
}

?>
