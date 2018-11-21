<?php

include_once "db.php";

class Offre
{
	public $id = null;
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


/** Ajoute une Offre Pour un commerce.
 * \param commerce Le commerce qui propose l'offre.
 * \param produit Le produit proposé dans l'offre.
 * \param qteMaxCumul Quantité de cette offre.
 * \param qteMaxClient Quantité maximum qu'un client peut reservé.
 * \param horaire Horaire à laquelle le client peut réserver l'offre.
 * \return L'offre si l'ajout est effectué, sinon null si l'offre existe déjà.
 */

function ajouterOffre($commerce, $produit, $qteMaxCumul, $qteMaxClient, $horaire)
{
	global $db;

	$idProduit = $produit->id;
	$idCommerce = $commerce->id;

	$c = "SELECT * FROM `offre` WHERE idCommerce = '$idCommerce' AND idProduit = '$idProduit' AND horaire = '$horaire'";
	$r = mysqli_query($db, $c);

	if (ligneExiste($r)) {
		// L'offre existe déjà.
		return null;
	}

	$offre = new Offre();
	$offre->idCommerce = $idCommerce;
	$offre->idProduit = $idProduit;
	$offre->qteDispo = $qteMaxCumul;
	$offre->qteMaxCumul = $qteMaxCumul;
	$offre->qteMaxClient = $qteMaxClient;
	$offre->horaire = $horaire;

	if (!ecrireLigne("offre", $offre)) {
		return null;
	}

	return $offre;
}


/** Supprime l'Offre , l'offre existe toujours.
 * \param nom  Nom du client
 * \param mdp  Mot de passe du client
 */
function supprimerOffre($offre)
{
	global $db;

    $id =  $offre -> id;
	$c = "DELET * FROM `client` WHERE id = '$id'";
	$r = mysqli_query($db, $c);

}

function supprimerOffreProduit($offre, $produit) 
{
    global $db;
    $idProduit = $produit -> id;
    $c = "DELET * FROM `offre` WHERE idProduit = '$idProduit'";
    $r = mysqli_query($db,$c);
        
}
?>
