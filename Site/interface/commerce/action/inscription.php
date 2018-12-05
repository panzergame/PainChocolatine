<?php

include_once "../../../include/db/session.php";
include_once "../../../include/get.php";
include_once "../../../include/error.php";

$url_inscription = getUrl("../../../index.php", array("action" => "inscription"));
$url_lister_clients = getUrl("../../../index.php", array("action" => "listerClient"));

valeurValidePost("nom");
valeurValidePost("mdp");
valeurValidePost("email");
valeurValidePost("tel");
valeurValidePost("type");
valeurValidePost("description");

if ($nom_valid and $mdp_valid and $email_valid and $tel_valid and $type_valid and $description_valid and $image_valid) {
	$commerce = ajouterCommerce($nom, $mdp, $description, $type, $tel, $email, $image);

	if($commerce) {
		connecterCommerce($commerce);
		effacerValeurs();
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
