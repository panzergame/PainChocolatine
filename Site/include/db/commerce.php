<?php

include_once "db.php";
include_once "utilisateur.php";

class Commerce extends Utilisateur
{
	public $description = "";
	public $adresse = "";
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

	if (ligneExiste($r)) {
		// Creér une instance de client et la renvoyer.
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
 * \param nom Mom du commerce.
 * \param mdp Mot de passe du commerçant.
 * \param description Description du commerce.
 * \param type Type de commerce.
 * \param tel Numéro de téléphone du commerce.
 * \param adresse L'adresse du commerce.
 * \param email Email du commerce.
 * \param image Image du commerce.
 * \return Le commerce si l'ajout est effectué, sinon null si le commerce existe déjà.
 */
function ajouterCommerce($nom, $mdp, $description, $type, $tel, $adresse, $email, $image)
{
	global $db;

	$c = "SELECT * FROM `commerce` WHERE nom = '$nom'";
	$r = mysqli_query($db, $c);

	if (ligneExiste($r)) {
		// Le commerce existe déjà.
		return null;
	}

	$commerce = new Commerce();
	$commerce->nom = $nom;
	$commerce->mdp = $mdp;
	$commerce->description = $description;
	$commerce->adresse = $adresse;
	$commerce->type = $type;
	$commerce->tel = $tel;
	$commerce->email = $email;
	$commerce->image = $image;

	if (!ecrireLigne("commerce", $commerce)) {
		return null;
	}

	return $commerce;
}


/** Supprime le commerce si les bons identifiants sont entrés.
 * \param nom  Nom du commerce
 * \param mdp  Mot de passe du commerce
 * \return vrai si le commerce à été supprimer, faux sinon.
 */
function supprimerCommerce($nom, $mdp)
{
	global $db;

	$commerce = obtenirCommerceConnexion($nom , $mdp);
	if ($commerce !== null) {
		// Suppression de tous les produits, offres et reservations associés à ce commerce.
		supprimerProduitsCommerce($commerce);
		supprimerOffresCommerce($commerce);
		supprimerReservationsCommerce($commerce);

	    $c = "DELETE FROM `commerce` WHERE nom = '$nom'";
	    $r = mysqli_query($db, $c);

        return true;
    }
    else {
		return false;
	}

}

?>
