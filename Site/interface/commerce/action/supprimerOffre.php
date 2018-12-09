<?php

include_once "../../../include/db/session.php";
include_once "../../../include/url.php";
include_once "../../../include/error.php";

$commerce = commerceConnecte();

$url_connexion = getUrl("../../../index.php", array("action" => "connexion"));
$url_lister_offre = getUrl("../../../index.php", array("action" => "listerOffre"));

if ($commerce == null) {
	// On renvoie vers la page de connexion
	erreurAction("", $url_connexion);
}
else {
	valeurValideNumericPost("id");

	if ($id_valid) {
		$offre = obtenirOffreId($id);
		supprimerOffre($offre);
		valideAction($url_lister_offre);
	}
	else {
		erreurAction("Champs invalides", $url_lister_offre);
	}
}
