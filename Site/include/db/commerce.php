<?php

include_once "db.php";
include_once "utilisateur.php";

class Commerce extends Utilisateur
{
	public $description = "";
	public $type = "";
	public $tel = "";
}

/** Renvoi une liste de tous les commerces.
 * \return liste de Commerce.
 */
function listerCommerces()
{
	global $db;

	$c = "SELECT * FROM `commerce`";
	$r = mysqli_query($db, $c);

	$commerces = [];
	while ($row = mysqli_fetch_assoc($r)) {
		$commerce = new Commerce();
		extraireLigne($row, $commerce);
		array_push($commerces, $commerce);
	}

	return $commerces;
}

/** Renvoi un commerce ou null selon les informations de connexion.
 * \param nom Nome du commerce.
 * \param mdp Mot de passe du commerçant.
 * \return Commerce ou null.
 */
function obtenirCommerceConnexion($nom, $mdp)
{
	global $db;

	$c = "SELECT * FROM `commerce` WHERE nom = '$nom' AND mdp = '$mdp'";
	$r = mysqli_query($db, $c);

	if ($r != false && mysqli_num_rows($r)) {
		$row = mysqli_fetch_assoc($r);
		$commerce = new Commerce();
		extraireLigne($row, $commerce);
		return $commerce;
	}

	return null;
}

/** Renvoi le commerce correspondant à l'id.
 * \param idCommerce Id du commerce.
 * \return Commerce.
 */
function obtenirCommerceId($idCommerce)
{
	global $db;

	$c = "SELECT * FROM `commerce` WHERE id = $idCommerce";
	$r = mysqli_query($db, $c);
	$row = mysqli_fetch_assoc($r);

	$commerce = new Commerce();
	extraireLigne($row, $commerce);

	return $commerce;
}

/** Ajouter un commerce.
 * \param commerce Commerce à ajouter.
 * \return true si l'ajout est effectué, sinon false.
 */
function ajouterCommerce($commerce)
{
	
}

?>
