<?php
include_once "include/db.php";
session_start();

$commerce = $_SESSION["commerceConnecte"];

if ($commerce == null) {
  // On renvoie vers la page de connexion?
}
else{

  // on vérifie si les champs sont valides et remplis.
  $id_valid = false;
  $qteMaxCumul_valid = false;
  $qteMaxClient_valid = false;
  $horaire_valid = false;

  if (isset($_POST["id"]) or !empty($POST["id"]))
    {
      $id = strip_tags($_POST["id"]);
      $produit = obtenirProduitId($id);
      $id_valid = true;
    }

  if (isset($_POST["qteMaxCumul"]) or !empty($POST["qteMaxCumul"])){
      $qteMaxCumul = $_POST["qteMaxCumul"];
      $qteMaxCumul_valid = true;
  }


  if (isset($_POST["qteMaxClient"]) or !empty($POST["qteMaxClient"])){
    $qteMaxClient = $_POST['qteMaxClient'];
    $qteMaxClient_valid = true;
  }


  if (isset($_POST["horaire"]) or !empty($POST["horaire"])){
      $horaire = strip_tags($_POST["horaire"]);
      $horaire_valid = true;
     }




  if ($id_valid and $qteMaxCumul_valid and $qteMaxClient_valid and $horaire_valid) {

    //On ajoute le produit à la bd.
    $offre= ajouterOffre($commerce, $produit, $qteMaxCumul, $qteMaxClient, $horaire);


    if ($offre = null) {
      // Le produit existait déjà.
      // renvoit sur la page d'ajout?
    }
    else {
      // On renvoit sur la page d'ajout du produit?
    }

  else{
    // On laisse les champs ou pas ?
  }
  }
}
