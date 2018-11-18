<?php

include_once "include/db/main.php";
include_once "include/get.php";

session_start();

$action = $_GET["action"];

// Par défaut lister les commerces.
if (!isset($action)) {
	$action = "listerCommerce";
}

switch ($action) {
	case "listerCommerce":
		include_once "commun/listerCommerces.php";
		break;
	case "listerProduit":
		include_once "commun/listerProduits.php";
		break;
	case "listerOffre":
		include_once "commun/listerOffres.php";
		break;
}

?>
