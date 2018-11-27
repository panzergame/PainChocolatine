<?php

include_once "db.php";

class Reservation
{
	public $id = null;
	public $idOffre;
	public $idProduit;
	public $idClient;
	public $idCommerce;
	public $qte = 0;
}

/** Renvoie une liste de toutes les reservations pour un commerce.
 * \param commerce Le commerce dont on veut afficher les réservations.
 * \return reservations Les réservations du commerces.
*/
function listerReservationsCommerce($commerce)
{
	global $db;

	$idCommerce = $commerce->id;
	$c = "SELECT * FROM `reservation` WHERE idCommerce = $idCommerce";
	$r = mysqli_query($db, $c);

	$reservations = [];
	while ($row = mysqli_fetch_assoc($r)) {
		$reservation = new Reservation();
		extraireLigne($row, $reservation);
		array_push($reservations, $reservation);
	}

	return $reservations;
}


/** Renvoi une liste de toutes les réservations d'un client.
 * \param client Le client dont les réservations seront listées.
 * \return les reservations du client.
 */
function listerReservationsClient($client)
{
	global $db;

	$idClient = $client->id;
	$c = "SELECT * FROM `reservation` WHERE idClient = $idClient";
	$r = mysqli_query($db, $c);

	$reservations = [];
	while ($row = mysqli_fetch_assoc($r)) {
		$reservation = new Reservation();
		extraireLigne($row, $reservation);
		array_push($reservations, $reservation);
	}

	return $reservations;
}

/** Renvoi une liste des reservations pour une Offre.
 * \param offre Une offre proposé par un commerce.
 * \return liste des reservations pour l'offre.
 */
function listerReservationsOffre($offre)
{
	global $db;

	$idOffre = $offre->id;
	$c = "SELECT * FROM `reservation` WHERE idOffre = $idOffre";
	$r = mysqli_query($db, $c);

	$reservations = [];
	while ($row = mysqli_fetch_assoc($r)) {
		$reservation = new Reservation();
		extraireLigne($row, $reservation);
		array_push($reservations, $reservation);
	}

	return $reservations;
}


/** Ajoute une reservation pour une offre.
 * \param client Le client qui réserve.
 * \param offre L'offre que le client a réservé.
 * \param qte Quantité de l'offre que le client a réservé.
 * \return La réservation.
 */
function ajouterReservation($client, $offre, $qte)
{
	$reservation = new Reservation();
	$reservation->idOffre = $offre->id;
	$reservation->idProduit = $offre->idProduit;
	$reservation->idClient = $client->id;
	$reservation->idCommerce = $offre->idCommerce;
	$reservation->qte = $qte;

	if (!ecrireLigne("reservation", $reservation)) {
		return null;
	}

	return $reservation;
}

/**Supprime la reservation selectionnée
 * \param reservation La reservation à supprimer, La reservation existe toujours.
 */
function supprimerReservation($reservation)
{
    global $db;
    $id = $reservation -> id;
    $c = "DELETE * FROM `reservation` WHERE id= '$id'";
    $r = mysqli_query($db,$c);
}

/** Supprime les Reservations correspondant à une offre.
 *\param offre  Offre dont on veut supprimer les réservations. L'offre existe toujours.
 */
function supprimerReservationsOffre($offre)
{
    global $db;
    $idOffre = $offre -> id;
    $c = "DELETE FROM `reservation` WHERE idOffre = '$idOffre'";
    $r = mysqli_query($db,$c);
}

function supprimerReservationsProduit($produit)
{
    global $db;
    $idProduit = $produit -> id;
    $c = "DELETE FROM `reservation` WHERE idProduit = '$idProduit'";
    $r = mysqli_query($db,$c);
}


function supprimerReservationsCommerce($commerce)
{
    global $db;
    $idCommerce = $commerce -> id;
    $c = "DELETE FROM `reservation` WHERE idCommerce = '$idCommerce'";
    $r = mysqli_query($db,$c);
}

?>
