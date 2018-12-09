<?php

include_once "../../../include/db/session.php";
include_once "../../../include/db/statistique.php";
include_once "../../../include/url.php";
include_once "../../../include/error.php";

$commerce = commerceConnecte();

$url_connexion = getUrlIndex("connexion");
$url_lister_client = getUrlIndex("listerClient");

if ($commerce == null) {
	// On renvoie vers la page de connexion
	erreurAction("", $url_connexion);
}
else {
	valeurValideNumericPost("id");

	if ($id_valid) {
		$reservation = obtenirReservationId($id);
		ajouterStatistique($reservation);
		// TODO supprimerReservation.
		// supprimerReservation($reservation);
		valideAction($url_lister_client);
	}
	else {
		erreurAction("Champs invalides", $url_lister_client);
	}
}
