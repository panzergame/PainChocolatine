<?php

include_once "../../../include/db/commerce.php";
include_once "../../../include/get.php";
include_once "../../../include/error.php";

session_start();

$url_connexion = getUrl("../../../index.php", array("action" => "connexion"));
$url_lister_clients = getUrl("../../../index.php", array("action" => "listerClient"));

valeurValidePost("nom");
valeurValidePost("mdp");

if ($nom_valid and $mdp_valid) {
	$commerce = obtenirCommerceConnexion($nom, $mdp);

	if($commerce) {
		$_SESSION["commerceConnecte"] = $commerce;
		Header("Location: $url_lister_clients");
	}
	else {
		// Connexion échouée.
		Header("Location: $url_connexion");
	}
}
else {
	// Champs invalides.
	Header("Location: $url_connexion");
}

?>
