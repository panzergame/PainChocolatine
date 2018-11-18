<?php

/** \brief Créer une session avec une offre par son "id".
 * Redirige sur index.php avec "action" en argument _GET.
 */

include_once "../../../include/db/offre.php";
include_once "../../../include/get.php";

session_start();

$id = $_POST["id"];

if (isset($id) && is_numeric($id)) {
	$offre = obtenirOffreId($id);
	if ($offre != null) {
		$_SESSION["offre"] = $offre;
	}

	$action = $_POST["action"];
	$url = getUrl("../../../index.php", array("action" => $action));
	Header("Location: $url");
}

?>
