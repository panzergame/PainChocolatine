<?php

include_once "../../../include/db/offre.php";
include_once "../../../include/db/commerce.php";
include_once "../../../include/db/produit.php";
include_once "../../../include/get.php";

session_start();

$commerce = $_SESSION["commerceConnecte"];

$url_connexion = getUrl("../../../index.php", array("action" => "inscriptionCommerce"));
$url_ajouter_offre = getUrl("../../../index.php", array("action" => "ajouterOffre"));
$url_lister_offre = getUrl("../../../index.php", array("action" => "listerOffre"));

if ($commerce == null) {
	// On renvoie vers la page de connexion
	Header("Location: $url_connexion");
}
else {
  // on vérifie si les champs sont valides et remplis.
  $id_valid = false;
  $qteMaxCumul_valid = false;
  $qteMaxClient_valid = false;
  $horaire_valid = false;

	if (isset($_POST["id"]) and !empty($_POST["id"])) {
      $id = strip_tags($_POST["id"]);
      $id_valid = true;
	}

  if (isset($_POST["qteMaxCumul"]) and !empty($_POST["qteMaxCumul"])) {
      $qteMaxCumul = $_POST["qteMaxCumul"];
      $qteMaxCumul_valid = true;
  }


  if (isset($_POST["qteMaxClient"]) and !empty($_POST["qteMaxClient"])) {
    $qteMaxClient = $_POST['qteMaxClient'];
    $qteMaxClient_valid = true;
  }


  if (isset($_POST["horaire"]) and !empty($_POST["horaire"])){
      $horaire = strip_tags($_POST["horaire"]);
      $horaire_valid = true;
     }
	
	echo $id;
	echo $qteMaxCumul;
	echo $qteMaxClient;
	echo $horaire;

	if ($id_valid and $qteMaxCumul_valid and $qteMaxClient_valid and $horaire_valid) {
		$produit = obtenirProduitId($id);
		//On ajoute le produit à la bd.
		$offre = ajouterOffre($commerce, $produit, $qteMaxCumul, $qteMaxClient, $horaire);

		if ($offre !== null) {
			// Offre ajouter.
			$_SESSION["commerce"] = $commerce;
			$_SESSION["produit"] = $produit;
			Header("Location: $url_lister_offre");
		}
		else {
			// Le produit existait déjà.
			Header("Location: $url_ajouter_offre");
		}
	}
	else{
// 		Header("Location: $$url_ajouter_offre");
	}
}
