<?php

/** \brief Créer une session avec un commerce par son "id".
 * Redirige sur index.php avec "action" en argument _GET.
 */

include_once "../../../include/db/session.php";
include_once "../../../include/db/commerce.php";
include_once "../../../include/get.php";

$id = $_POST["id"];

if (isset($id) && is_numeric($id)) {
	$commerce = obtenirCommerceId($id);
	if ($commerce != null) {
		selectionnerCommerce($commerce);
	}

	$action = $_POST["action"];
	$url = getUrl("../../../index.php", array("action" => $action));
	Header("Location: $url");
}

?>
