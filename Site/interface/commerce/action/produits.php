<?php

include_once "../../../include/db/commerce.php";
include_once "../../../include/db/produit.php";
include_once "../../../include/get.php";

session_start();

$commerce = $_SESSION["commerceConnecte"];

$url_ajout_produit = getUrl("../../../index.php", array("action" => "ajouterProduit"));
$url_connexion = getUrl("../../../index.php", array("action" => "inscriptionCommerce"));
$url_ajouter_offre = getUrl("../../../index.php", array("action" => "ajouterOffre"));

if ($commerce === null) {
	// On renvoie vers la page de connexion
	Header("Location: $url_connexion");
}
else {
  // On vérifie si les champs sont valides ou remplis .
    $nom_valid = false;
    $description_valid = false;
    $prix_valid = false;

    if (isset($_POST["nom"]) and !empty($_POST["nom"])){
      $nom = strip_tags($_POST["nom"]);
      $nom_valid = true;
    }

    if (isset($_POST["description"]) and !empty($_POST["description"])){
        $description = strip_tags($_POST["description"]);
        $description_valid = true;
    }

    if (isset($_POST["prix"]) and !empty($_POST["prix"])){
        $prix = $_POST["prix"];
        $prix_valid = true;
    }

    //On ajoute le produit à la bd.
    if ($prix_valid and $description_valid and $nom_valid){
		$produit = ajouterProduit($commerce, $nom, $description, $prix);
		if ($produit !== null) {
			$_SESSION["produit"] = $produit;
			Header("Location: $url_ajouter_offre");
		}
		else {
			// Produit déjà existant.
			Header("Location: $url_ajout_produit");
		}
	}
	else {
		// champs invalides
		Header("Location: $url_ajout_produit");
	}
}
