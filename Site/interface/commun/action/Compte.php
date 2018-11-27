<?php
$client_connecte = (clientConnecte() !==  null);
$commerce_connecte = (commerceConnecte() !== null);


if (isset($_POST["send"])) {
  if ($POST["send"] == "supprimer") {
    valeurValidePost("mdp");

    if($client_connecte){
      $supprimer = supprimerClient($client_connecte->nom ,$mdp);
      if(!$supprimer){
        //TODO renvoie sur une page d'erreur
      }
    }

    elseif($commerce_connecte){
      $supprimer = supprimerCommerce($commerce_connecte->nom ,$mdp);
      if(!$supprimer){
        //TODO renvoie sur une page d'erreur
      }
   }
    else{
      //TODO page d'erreur
    }
  }
}

 ?>
