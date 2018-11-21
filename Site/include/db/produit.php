<?php

include_once "db.php";

class Produit
{
	public $id = null;
	public $idCommerce;
	public $nom = "";
	public $description = "";
	public $prix = 0.0;
}


/** Renvoi une liste de tous les produits d'un commerce
 * \param commerce Le commerce selectionné.
 * \return liste de Produit.
 */
function listerProduits($commerce)
{
	global $db;

	$idCommerce = $commerce->id;
	$c = "SELECT * FROM `produit` WHERE idCommerce = $idCommerce";
	$r = mysqli_query($db, $c);

	$produits = [];
	while ($row = mysqli_fetch_assoc($r)) {
		$produit = new Produit();
		extraireLigne($row, $produit);
		array_push($produits, $produit);
	}

	return $produits;
}

/** Renvoi le produit correspondant à l'id.
 * \param idProduit Id du produit.
 * \return Produit.
 */
function obtenirProduitId($idProduit)
{
	global $db;

	$c = "SELECT * FROM `produit` WHERE id = $idProduit";
	$r = mysqli_query($db, $c);
	$row = mysqli_fetch_assoc($r);

	$produit = new Produit();
	extraireLigne($row, $produit);

	return $produit;
}

/** Ajout d'un produit.
 * \param commerce Le commerce proposant ce produit.
 * \param nom Le nom du produit.
 * \param description La description du produit.
 * \param prix Le prix du produit.
 * \return Produit ou null.
 */
function ajouterProduit($commerce, $nom, $description, $prix)
{
	global $db;

	$idCommerce = $commerce->id;

	$c = "SELECT * FROM `produit` WHERE idCommerce = '$idCommerce' AND nom = '$nom'";
	$r = mysqli_query($db, $c);

	if (ligneExiste($r)) {
		// L'offre existe déjà.
		return null;
	}

	$produit = new Produit();
	$produit->idCommerce = $idCommerce;
	$produit->nom = $nom;
	$produit->description = $description;
	$produit->prix = $prix;

	if (!ecrireLigne("produit", $produit)) {
		return null;
	}

	return $produit;
}


/**Supprime Le produit selectionné
 * \param produit  Produit à supprimer, Le produit existe toujours.
 */
function supprimerProduit($produit)
{
    global $db;
    $id = $produit -> id;
    $c = "DELETE * FROM `produit` WHERE id='$id'";
    $r = mysqli_query($db,$c);
}
?>
