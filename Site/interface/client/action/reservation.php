<?php
include_once "../../../include/db/session.php";
include_once "../../../include/db/reservation.php";
include_once "../../../include/get.php";
include_once "../../../include/error.php";

$url_connexion = getUrl("../../../index.php", array("action" => "connexion"));
$url_lister_reservation = getUrl("../../../index.php", array("action" => "listerReservation"));

$client = clientConnecte();
$offre = offreSelectionne();

if($client === null) {
	Header("Location: $url_connexion");
}
else {
	valeurValidePost("qte");

	if ($qte_valid) {
		if($offre->qteDispo < $qte or $offre->qteMaxClient < $qte) {
			// Impossible de reserver.
		}
		else {
			$reservation = ajouterReservation($client, $offre, $qte);

			Header("Location: $url_lister_reservation");
		}
	}
}
?>
