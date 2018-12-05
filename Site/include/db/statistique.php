<?php 
include_once "db.php";
include_once "reservation.php";

class Statistique extends Reservation 
{
    public $jour = "";
}



/** Renvoi une liste de toutes les statistiques pour un commerce.
 * \param commerce : Le commerce dont on veut lister les statistiques.
 * \return liste des statistiques pour un commerce.
 */

function listerStatistiqueCommerce($commerce)
{
   global $db;

    $idCommerce =  $commerce->id;  

    $c = "SELECT * FROM `statistique`  WHERE idCommerce = '$idCommerce'"; 
    $r = mysqli_query($db, $c);

    $statistique = [];
    while ($rox = mysqli_fetch_assoc($r)){
        $statistique = new Statistique();
        extraireLigne($row,$statistique);
        array_push($statistique,$statistique);
    }

    return $statistique;

}


/** Renvoi une liste de toutes les statistiques pour un client.
 * \param client : Le client dont on veut lister les statistiques.
 * \return liste des statistiques pour un client.
 */

function listerStatistiqueClient($client)
{
   global $db;

    $idClient =  $client->id;  

    $c = "SELECT * FROM `statistique`  WHERE idClient = '$idClient'"; 
    $r = mysqli_query($db, $c);

    $statistique = [];
    while ($rox = mysqli_fetch_assoc($r)){
        $statistique = new Statistique();
        extraireLigne($row,$statistique);
        array_push($statistique,$statistique);
    }

    return $statistique;

}


/** Ajouter une statistique
 * \param reservation La reservation à enregistrer
 * \return Le statistique , La reservation existe toujours.
 */
function ajouterStatistique($reservation)
{
    $statistique = new Statistique();
    $statistique->idReservation = $reservation->id;
    $statistique->idOffre = $reservation->idOffre;
    $statistique->idProduit = $reservation->idProduit;   
    $statistique->idClient = $reservation->idClient;
    $statistique->idCommerce = $reservation->idCommerce;
    $statistique->jour = date("Y-m-d");

    if(!ecrireLigne("statistique", $statistique)) {
        return null
    }
    
    return $statistique;
}

?>
