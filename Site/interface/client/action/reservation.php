<?php
include_once "../../../include/db/session.php";
include_once "../../../include/db/reservation.php";
include_once "../../../include/db/offre.php";
include_once "../../../include/url.php";
include_once "../../../include/error.php";

$url_connexion = getUrlIndex("connexion");
$url_lister_reservation = getUrlIndex("listerReservation");
$url_reserver = getUrlIndex("ajouterReservation");

$client = clientConnecte();
$offre = offreSelectionne();

if($client === null) {
	erreurAction("", $url_connexion);
}
else {
	valeurValidePost("qte");

	if ($qte_valid) {
		if($qte > $offre->qteDispo or $qte > $offre->qteMaxClient) {
			// Impossible de reserver.
			erreurAction("Impossible de reserver, quantité trop importante", $url_reserver);
		}
		else {
			$reservation = ajouterReservation($client, $offre, $qte);
			consommerOffre($offre, $qte);
			valideAction($url_lister_reservation);
		}
	}
	erreurAction("Champs invalides");
}
?>
