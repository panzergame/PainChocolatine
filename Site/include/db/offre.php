<?php

include_once "db.php";

class Offre
{
	public $id;
	public $idProduit;
	public $idCommerce;
	public $qteDispo = 0;
	public $qteMaxCumul = 0;
	public $qteMaxClient = 0;
	public $horaire = "";
}

/** Renvoi une liste de toutes les offres d'un produit
 * \param produit Le produit selectionné.
 * \return liste de Offre.
 */
function listerOffres($produit)
{
	global $db;

	$idProduit = $produit->id;
	$c = "SELECT * FROM `offre` WHERE idProduit = $idProduit";
	$r = mysqli_query($db, $c);

	$offres = [];
	while ($row = mysqli_fetch_assoc($r)) {
		$offre = new Offre();
		extraireLigne($row, $offre);
		array_push($offres, $offre);
	}

	return $offres;
}

/** Renvoi l'offre correspondante à l'id.
 * \param idCommerce Id de l'offre.
 * \return Offre.
 */
function obtenirOffreId($idOffre)
{
	global $db;

	$c = "SELECT * FROM `offre` WHERE id = $idOffre";
	$r = mysqli_query($db, $c);
	$row = mysqli_fetch_assoc($r);

	$offre = new Offre();
	extraireLigne($row, $offre);

	return $offre;
}

function ajouterOffre($commerce, $offre)
{
	
}

?>
