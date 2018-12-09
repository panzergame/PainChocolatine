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

    $c = "SELECT * FROM `statistique` WHERE idCommerce = $idCommerce"; 
    $r = mysqli_query($db, $c);

    $statistiques = [];
    while ($row = mysqli_fetch_assoc($r)){
        $statistique = new Statistique();
        extraireLigne($row,$statistique);
        array_push($statistiques,$statistique);
    }

    return $statistiques;
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

    $statistiques = [];
    while ($row = mysqli_fetch_assoc($r)){
        $statistique = new Statistique();
        extraireLigne($row,$statistique);
        array_push($statistiques,$statistique);
    }

    return $statistiques;
}

/** Ajouter une statistique
 * \param reservation La reservation à enregistrer
 * \return La statistique , La reservation existe toujours.
 */
function ajouterStatistique($reservation)
{
    $statistique = new Statistique();
	$statistique->jour = date("Y-m-d");

	// Copie des champs de la resrvation dans la statistique.
    foreach ($reservation as $key => $value) {
		$statistique->$key = $value;
	}

    if(!ecrireLigne("statistique", $statistique)) {
        return null;
    }

    return $statistique;
}

?>
