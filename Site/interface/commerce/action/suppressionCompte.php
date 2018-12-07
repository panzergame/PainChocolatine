<?php
include_once "../../../include/db/session.php";
include_once "../../../include/db/client.php";
include_once "../../../include/get.php";
include_once "../../../include/error.php";

$url_lister_commerce = getUrl("../../../index.php", array("action" => "listerCommerce"));

$commerce = commerceConnecte();

if ($commerce !== null) {
	valeurValidePost("mdp");

	if ($mdp_valid) {
		supprimerCommerce($commerce->nom ,$mdp);
		deconnecterCommerce();
		effacerValeurs();
	}
	else {
		leverErreur("Mot de passe invalide");
	}

	Header("Location: $url_lister_commerce");
}

?>
