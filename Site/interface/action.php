<?php

include_once "include/url.php";
include_once "include/form.php";

$action = "listerCommerce";

// Par défaut lister les commerces.
if (isset($_GET["action"])) {
	$action = $_GET["action"];
}

switch ($action) {
	case "listerCommerce":
		include_once "commun/listerCommerces.php";
		break;
	case "listerProduit":
		include_once "commun/listerProduits.php";
		break;
	case "listerSesProduit":
		include_once "commerce/listerProduits.php";
		break;
	case "listerOffre":
		include_once "commun/listerOffres.php";
		break;
	case "ajouterProduit":
		include_once "commerce/ajouterProduit.php";
		break;
	case "ajouterOffre":
		include_once "commerce/ajouterOffre.php";
		break;
	case "ajouterReservation":
		include_once "client/ajouterReservation.php";
		break;
	case "listerReservation":
		include_once "client/listerReservation.php";
		break;
	case "listerClient":
		include_once "commerce/listerClients.php";
		break;
	case "connexion":
		include_once "commun/connexion.php";
		break;
	case "deconnexion":
		include_once "commun/deconnexion.php";
		break;
	case "inscription":
		include_once "commun/inscription.php";
		break;
	case "gestionCompte":
		include_once "commun/gestionCompte.php";
		break;
    case "listerStatistiqueClient":
        include_once "client/listerStatistique.php";
        break;
    case "listerStatistiqueCommerce":
        include_once "commerce/listerStatistique.php";
        break;
}

?>
