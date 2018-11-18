<?php
include_once "include/db.php";
session_start();

$commerce = $_SESSION["commerceConnecte"];

if ($commerce == null) {
  // On renvoie vers la page de connexion?
}
else{

  // On vérifie si les champs sont valides ou remplis .
    $nom_valid = False;
    $description_valid = False;
    $prix_valid = False;

    if (isset($_POST["nom"]) or !empty($POST["nom"])){
      $nom = strip_tags($_POST["nom"]);
      $nom_valid = true;
    }

    if (isset($_POST["description"]) or !empty($POST["description"])){
        $description = strip_tags($_POST["description"]);
        $description_valid = true;
    }


    if (isset($_POST["prix"]) or !empty($POST["prix"])){
        $prix = $_POST["prix"];
        $prix_valid = true;
    }

    $prix = $_POST['prix'];



    //On ajoute le produit à la bd.
    if ( $prix_valid and $description_valid and $nom_valid ){
    $produit= ajouterProduit($commerce, $nom, $description, $prix);


    if ($produit = null) {
      // Le produit existait déjà.
      // On renvoie la page ?
    }
    else {
      // On renvoit sur la page d'ajout du produit.
    }
  }
  else {
    // On laisse les champs prérempli?
  }
}
