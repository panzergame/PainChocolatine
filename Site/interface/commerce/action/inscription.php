<?php

include_once "../../../include/db/commerce.php";
include_once "../../../include/get.php";
include_once "../../../include/error.php";

session_start();

$url_inscription = getUrl("../../../index.php", array("action" => "inscription"));
$url_lister_clients = getUrl("../../../index.php", array("action" => "listerClient"));

valeurValidePost("nom");
valeurValidePost("mdp");
valeurValidePost("email");
valeurValidePost("tel");
valeurValidePost("type");
valeurValidePost("description");

if ($nom_valid and $mdp_valid and $email_valid and $tel_valid and $type_valid and $description_valid) {
	$commerce = ajouterCommerce($nom, $mdp, $description, $type, $tel, $email);

	if($commerce) {
		$_SESSION["commerceConnecte"] = $commerce;
		Header("Location: $url_lister_clients");
	}
	else {
		// Connexion échouée, commerce déjà existant.
		Header("Location: $url_inscription");
	}
}
else {
	// Champs invalides.
	Header("Location: $url_inscription");
}

?>
