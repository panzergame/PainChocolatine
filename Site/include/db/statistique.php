<?php 
include_once "db.php";
include_once "reservation.php";

class Statistique extends Reservation 
{
    public $jour = "";
}


/** Renvoi une liste de toutes les statistiques ( Reservations par jour ).
 * \return liste des statistiques.
 */ 
function listerStatistique()
{
    global $db;

    $c = "SELECT * FROM `statistique`"; 
    $r = mysqli_query($db, $c);

    $statistique = []; 
    while ($row = mysqli_fetch_assoc($r)) {
        $statistique = new Statistique();
        extraireLigne($row, $statistique);
        array_push($statistique, $statistique);
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
