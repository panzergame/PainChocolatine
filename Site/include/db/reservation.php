<?php

include_once "db.php";

class Reservation
{
	public $id = null;
	public $idOffre;
	public $idClient;
	public $idCommerce;
	public $qte = 0;
}

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

function ajouterReservation($client, $offre, $qte)
{
	$reservation = new Reservation();
	$reservation->idOffre = $offre->id;
	$reservation->idClient = $client->id;
	$reservation->idCommerce = $offre->idCommerce;
	$reservation->qte = $qte;

	if (!ecrireLigne("reservation", $reservation)) {
		return null;
	}

	return $reservation;
}

?>
