<?php

include_once "db.php";

class Produit
{
	public $id;
	public $idCommerce;
	public $nom = "";
	public $description = "";
	public $prix = 0.0;
}

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

function ajouterProduit($commerce, $produit)
{
	
}

function obtenirProduit($idProduit)
{
	global $db;

	$c = "SELECT * FROM `produit` WHERE id = $idProduit";
	$r = mysqli_query($db, $c);
	$row = mysqli_fetch_assoc($r);

	$produit = new Produit();
	extraireLigne($row, $produit);

	return $produit;
}

?>
